<?php
session_start();
if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']){
    header("location:index.php");
    exit;
}
?>