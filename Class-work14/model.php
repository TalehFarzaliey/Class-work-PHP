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

    public function makeQuery($connect,$query){
        return mysqli_query($connect,$query);
    }

}

