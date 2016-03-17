<?php
include 'model.php';

if(isset($_POST['submit'])){

    $newFile=new File($_FILES['file']);

}