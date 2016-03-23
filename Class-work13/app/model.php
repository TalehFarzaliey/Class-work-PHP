<?php
class Database {
    public $host;
    public $username;
    public $password;
    public $db;

    public $error=0;
    public $connection;

    public function __construct($a,$b,$c,$d)
    {
        $this->host=$a;
        $this->username=$b;
        $this->password=$c;
        $this->db=$d;

        $this->connection=mysqli_connect($this->host,$this->username,$this->password,$this->db);

        if(!$this->connection){
            $this->error=-1;
        }
    }
}

class News {
    public $newsTitle;
    public $newsDesc;
    public $newsImg;
    public $newsThumbImg;
    public $newsDate;
    public $newsStatus;
    public $newsText;

    public function __construct($newsTitle, $newsDesc, $newsImg, $newsThumbImg, $newsDate, $newsStatus, $newsText)
    {
        $this->newsTitle = $newsTitle;
        $this->newsDesc = $newsDesc;
        $this->newsImg = $newsImg;
        $this->newsThumbImg = $newsThumbImg;
        $this->newsDate = $newsDate;
        $this->newsStatus = $newsStatus;
        $this->newsText = $newsText;
    }

    public function insertData($connection,$tmpName,$imgName){
        if($this->imageUpload($tmpName,$imgName)){
            $query="INSERT INTO news(NewsTitle, NewsDesc, NewsText, NewsThumbImg, NewsImage, NewsDate, NewsStatus) VALUES ('$this->newsTitle','$this->newsDesc','$this->newsText','$this->newsThumbImg','$this->newsImg','$this->newsDate','$this->newsStatus')";
            $insertQuery=mysqli_query($connection,$query);

            if($insertQuery){
                echo "Success to insert";

            }else{
                echo "Failed to insert";
            }
        }else{
            echo "Failed to upload file";
        }

    }

    public function imageUpload($tmpName,$imgName){
        return move_uploaded_file($tmpName,'../app/upload/'.$imgName);
    }

    public function selectData($connection){
        $query="SELECT NewsTitle, NewsDesc, NewsThumbImg FROM news WHERE NewsStatus=1";
        $selectQuery=mysqli_query($connection,$query);

        if($selectQuery){
            return $selectQuery;
        }else{
            echo "Bad Getaway";
        }

    }
}