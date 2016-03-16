<?php
include 'model.php';
?>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>File Name</label>
            <input type="text" class="form-control" placeholder="File Name" name="fileName">
        </div>
        <div class="form-group">
            <label>File Extension</label>
            <select class="form-control input-lg" name="fileExtension">
                <option value="txt">Text (.txt)</option>
                <option value="jpeg">Image (.jpeg)</option>
                <option value="png">Image (.png)</option>
                <option value="html">Hypertext (.html)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Add file</label>
            <div>
                <span class="btn btn-default btn-file">Browse <input type="file" name="file"></span>
            </div>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Add</button>
    </form>

    <div class="progress">
        <div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span id="uploadedSize">234</span>KB out of <span id="uploadSize">10001</span>KB
        </div>
    </div>
    <div><p id="result">
            <?php
            if(isset($_GET['error']))
            {
                $error=$_GET['error'];
                if($error==1){
                    echo "<h3><span style='color: red'>Warning:</span> Your selected type is not same as your uploaded file!</h3>";
                }else if($error==2){
                    $message=$_GET['message'];
                    echo "<h3><span style='color: red'>Warning:</span> $message file is already exist!</h3>";
                }else if($error==3){
                    echo "<h3><span style='color: red'>Warning:</span> Unable to insert data to database!</h3>";
                }
            }
            ?>
        </p>
    </div>
    <div>
        <?php
        $newDB=new Database('localhost','root','','fira_karim');
        $files=$newDB->readFromData();
        echo '<table>';
        echo "<tr>";
        echo '<td>ID</td>';
        echo '<td>Name</td>';
        echo '<td>Extension</td>';
        echo '<td>Path</td>';
        echo '</tr>';
        while($row=mysqli_fetch_assoc($files)){

            echo '<tr>';
            foreach($row as $value){
                echo '<td>'.$value.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
</div>
<script type="text/javascript">
    var resultP=document.getElementById('result');
    var progressDiv=document.getElementById('progress');
    var uploadSize=document.getElementById('uploadSize');
    var uploadedSize=document.getElementById('uploadedSize');
    if(<?php echo isset($_GET['success'])?>) {
        var fileSize=<?php echo $_GET['size']?>;
        fileSize=fileSize/1000;
        uploadSize.innerText=fileSize;
        var pos=0;

        var id = setInterval(frame, 5);
        function frame() {
            if (pos > fileSize) {
                clearInterval(id);
                resultP.innerHTML="<h3><span style='color: greenyellow'>New file</span> - <?php echo $success=$_GET['success']?> is successfully added!</h3>";
            } else {
                pos++;
                progressDiv.style.width = pos/fileSize*100 + '%';
                uploadedSize.innerText = pos;
            }
        }
    }
</script>
</body>
</html>