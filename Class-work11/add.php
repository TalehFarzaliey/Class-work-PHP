<?php
include 'model.php';

if(isset($_POST['submit'])){

    $newDB=new Database('localhost','root','','fileupload');
    echo $newDB->error;
    $newFile=new File($_FILES['file'],$newDB->connection);

    header("Location: view.php");
}
?>