<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}
?> 