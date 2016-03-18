<?php
include 'model.php';



if(isset($_POST['submit'])){
    $newDB=new Database('localhost','root','','databasetest');

    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $newDB->insertData($newDB->connection,'user',$name,$surname,$email,$password);
}
