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

    public function insertData($connection,$table,$name,$surname,$email,$password){
        $tempQuery="INSERT INTO $table (UserName,UserSurname, UserEmail, UserPassword)
VALUES ('$name','$surname','$email','$password')";

        $query=mysqli_query($connection,$tempQuery);

        if(!$query){
            $this->error=-1;
        }
    }

    public function logIN($connection,$table,$email,$password){
        $tempQuery="SELECT UserEmail, UserPassword FROM $table WHERE UserEmail='$email'";
        $query=mysqli_query($connection,$tempQuery);
        $row=mysqli_fetch_assoc($query);
        if($row['UserEmail']==$email){
            if($row['UserPassword']==$password){
                session_start();
                $_SESSION['email']=$email;
                $_SESSION['password']=$password;
                echo "Logged In";
            }else{
                echo "Invalid password";
            }
        }else{
            echo "Invalid email";
        }
    }

}
