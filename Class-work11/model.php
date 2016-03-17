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

    public function insertData($connection,$table,$name,$extension,$path){
        $fullPath=$path.$name.'.'.$extension;
        $tempQuery="INSERT INTO $table (FileName,FileExtension, FilePath) VALUES ('$name','$extension','$fullPath')";

        $query=mysqli_query($connection,$tempQuery);

        if(!$query){
            $this->error=-1;
        }
    }
}

class File extends Database{
    //properties
    public $fileName;
    public $fileExtension;
    public $fileSize;
    public $filePath;
    public $fileGeneralType;
    public $fileDir;
    public $connection;

    //default no error
    public $error=0;

    //constructor for selected file
    function __construct($a,$b){
        $this->fileName=$a['name'];
        $this->fileExtension=end(explode('.',$a['name']));
        $this->fileGeneralType=reset(explode('/',$a['type'])).rand();
        $this->filePath=$a['tmp_name'];
        $this->fileSize=$a['size'];
        $this->connection=$b;

        $this->checkType();
    }
    //check type of file
    function checkType(){
        //if file is image change file upload directory to image/
        if($this->fileExtension=='jpeg'||$this->fileExtension=='png'){
            //if size of file is satisfied set the directory
            if($this->checkSize()){
                $this->fileDir='image/';
                parent::insertData($this->connection,'image',$this->fileGeneralType,$this->fileExtension,$this->fileDir);
                //add image file to certain directory
                $this->addFile();
            }else{
                //set error id to debug
                $this->error=-1;
            }
        }
        //if file is text change file upload directory to text/
        else if($this->fileGeneralType=='text'||$this->fileGeneralType=='application'){
            $this->fileDir='text/';
            parent::insertData($this->connection,'text',$this->fileGeneralType,$this->fileExtension,$this->fileDir);
            $this->addFile();
        }
    }
    //check the size of file for image to ensure that file size doesn't exceed 2MB
    function checkSize(){
        //if size of file exceed 2MB return false
        if($this->fileSize>2000000){
            return false;
        }
        else{
            return true;
        }
    }
    //add file to selected directory
    function addFile(){
        $checkMove=move_uploaded_file($this->filePath,$this->fileDir.$this->fileGeneralType.'.'.$this->fileExtension);
        //if file can't be moved return error message
        if(!$checkMove){
            echo "Can\'t moved!";
        }
    }
}