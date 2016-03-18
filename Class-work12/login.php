<?php
include 'model.php';

if(isset($_POST['submit'])){

    $newDB=new Database('localhost','root','','databasetest');

    $email=$_POST['email'];
    $password=$_POST['password'];

    $newDB->logIN($newDB->connection,'user',$email,$password);
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div>
    <form action="" method="post">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="submit">
    </form>
</div>
</body>
</html>
