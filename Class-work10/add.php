<?php
include "model.php";

if(isset($_POST['submit'])) {
    $myPath = 'upload/';

    $nameSelect = $_POST['fileName'];
    $extensionSelect = $_POST['fileExtension'];
    $myFile = $_FILES['file'];
    $fileName = $myFile['name'];
    $fileSize = $myFile['size'];
    $fileType = $myFile['type'];
    $fileTmpName = $myFile['tmp_name'];

    $extensionFile = explode(".", $fileName);

    $newDB=new Database('localhost','root','','fira_karim');

    if (strcmp($extensionSelect, end($extensionFile)) == 0) {
        $newFile=new File($nameSelect,$extensionSelect,$myPath,$fileTmpName);
        $tempName=$nameSelect.'.'.$extensionSelect;
        if($newFile->check!=0){
            header("Location: index.php?error=2&message=$tempName");
        }else{
            $newDB->insertData($nameSelect,$extensionSelect,$myPath.$nameSelect.'.'.$extensionSelect);
            if($newDB->error!=0){
                header("Location: index.php?error=3");
            }else{
                header("Location: index.php?success=$tempName&size=$fileSize");
            }
        }
    } else {
        header("Location: index.php?error=1");
    }
}
else{
    header("Location: index.php");
}
?>


