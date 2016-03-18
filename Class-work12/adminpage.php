<?php
session_start();
if(isset($_SESSION['email'])){
    echo "Welcome to admin page";
}else{
    echo "You don\'t have access to this page";
    session_destroy();
}
?>