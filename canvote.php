<?php
include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nr = $_POST['nr'];
    $sql = "UPDATE `users` SET `vote` = '$nr' WHERE `users`.`id` = $id";
    //     try{
    mysqli_query($db,$sql);
    
}

header('Content-Type: application/json');
echo json_encode([0,'success']);
?>