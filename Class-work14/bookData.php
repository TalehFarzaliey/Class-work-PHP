<?php
include 'model.php';
$id=$_GET['id'];
$newDB=new Database('localhost','root','','codeacademy');
$query="SELECT * FROM books WHERE BookId=$id";
$queryResult=$newDB->makeQuery($newDB->connection,$query);
echo "<table>";
echo "<tr>
<th>Title</th>
<th>Author</th>
<th>Description</th>
<th>Year</th>
</tr>";
$row=mysqli_fetch_object($queryResult);
echo "<tr>";

echo "<td>$row->BookTitle</td>";
echo "<td>$row->BookAuthor</td>";
echo "<td>$row->BookDescription</td>";
echo "<td>$row->BookYear</td>";

echo "</tr>";

echo "</table>";