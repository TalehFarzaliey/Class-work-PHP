<?php
include "model.php";

$newDB=new Database('localhost','root','','fileupload');


?>

<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Text Table</h2>
<?php
$newView=new ViewData($newDB->selectData($newDB->connection,'text'),'text');
?>
<br/>
<h2>Image Table</h2>
<?php
$newView=new ViewData($newDB->selectData($newDB->connection,'image'),'image');
?>
</body>
</html>
