<?php
include '../app/model.php';

$newDB=new Database('localhost','root','','news');
if($newDB->error!=0){
    echo "Error to connect database!";
}
if(isset($_POST['submit'])){
    $newsTitle=$_POST['news_title'];
    $newsDesc=$_POST['news_desc'];
    $newsImg=$_POST['news_image'];
    $newsThumbImg=$_POST['news_image'];
    $newsDate=$_POST['news_date'];
    $newsStatus=$_POST['news_status'];
    $newsText=$_POST['news_text'];

    $newNews=new News($newsTitle, $newsDesc, $newsImg, $newsThumbImg, $newsDate, $newsStatus, $newsText);
    $newNews->insertData($newDB->connection);
}

?>

<html>
<head>
    <title>Add News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<form class="navbar-form navbar-left" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input class="form-control" type="text" placeholder="News Title" name="news_title">
        <input class="form-control" type="text" placeholder="News Description" name="news_desc">
        <input class="form-control" type="text" placeholder="News Image" name="news_image">
        <input class="form-control" type="date" placeholder="News Date" name="news_date">
        <label>Published</label>
        <input class="form-control" type="radio" value="1" name="news_status">
        <label>Not published</label>
        <input class="form-control" type="radio" value="0" name="news_status">
        <textarea name="news_text"></textarea>
        <input class="btn btn-default" type="submit" name="submit">
    </div>


</form>
</body>
</html>
