<?php


class Database{
    public $server;
    public $username;
    public $userPass;
    public $dbName;
    public $error;

    public $connection;

    function __construct($a,$b,$c,$d)
    {
        $this->server=$a;
        $this->username=$b;
        $this->userPass=$c;
        $this->dbName=$d;

        $this->dbConnect();
    }

    function dbConnect(){
        $this->connection=mysqli_connect($this->server,$this->username,$this->userPass,$this->dbName);
        if($this->connection){
            $this->error=-0;
        }
        else{
            $this->error=-1;
        }
    }

    function insertData($fileName,$fileExtension,$filePath){
        $query=mysqli_query($this->connection,"INSERT INTO files(FileName, FileExtention, FileUrl)
          VALUES ('$fileName','$fileExtension','$filePath')");
        if(!$query){
            $this->error=-1;
        }
    }

    function readFromData(){
        return mysqli_query($this->connection,"SELECT * FROM files");
    }
}

class File{
    public $fileName;
    public $fileExtension;
    public $filePath;
    public $fileConn;
    public $check;

    function __construct($a,$b,$c,$d)
    {
        $this->fileName=$a;
        $this->fileExtension=$b;
        $this->filePath=$c;
        $this->filePath=$this->filePath.$this->fileName.'.'.$this->fileExtension;
        $this->fileConn=$d;
        if(file_exists($this->filePath)){
            $this->check=-1;
        }
        else{
            move_uploaded_file($this->fileConn,$this->filePath);
            $this->check=0;
        }
    }

}