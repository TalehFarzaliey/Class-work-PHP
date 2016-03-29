<?php
include 'model.php';
$newDB=new Database('localhost','root','','codeacademy');
$query="SELECT * FROM books";
$queryResult=$newDB->makeQuery($newDB->connection,$query);
echo "<table>";
echo "<tr>
<th>Title</th>
<th>Author</th>
<th>Description</th>
<th>Year</th>
</tr>";
while($row=mysqli_fetch_object($queryResult)){
echo "<tr>";

    echo "<td><a href='bookData.php?id=$row->BookId'>$row->BookTitle</a></td>";
    echo "<td>$row->BookAuthor</td>";
    echo "<td>$row->BookDescription</td>";
    echo "<td>$row->BookYear</td>";

    echo "</tr>";
}
echo "</table>"
?>

