<?php

?>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select file</label>
            <div>
                <span class="btn btn-default btn-file">Browse<input type="file" name="file"></span>
            </div>
        </div>
        <button type="submit" class="btn btn-default" name="submit">Add</button>
    </form>

    <div class="progress">
        <div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75"
             aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span id="uploadedSize">234</span>KB out of <span id="uploadSize">10001</span>KB
        </div>
    </div>

</div>
</body>
</html>
