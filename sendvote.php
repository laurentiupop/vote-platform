<?php

include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $usr = $_POST['usr'];
    $da = $_POST['da'];
    $abt = $_POST['abt'];
    $nu = $_POST['nu'];
    
    if($da == 'true'){     
        $sql = "UPDATE `for_vot` SET `pro_votes` = `pro_votes` + 1  WHERE `for_vot`.`id` = $id";
        $sql2 = "INSERT INTO users_votes (`id`, `usr_id`, `vot_id`, `vot`) VALUES (NULL, '$usr', '$id ', 'da')";
        
    }else
    if($abt == 'true'){
        $sql = "UPDATE `for_vot` SET `abstention_votes` = `abstention_votes` + 1  WHERE `for_vot`.`id` = $id";
        $sql2 = "INSERT INTO users_votes (`id`, `usr_id`, `vot_id`, `vot`) VALUES (NULL, '$usr', '$id ', 'abtinere')";
        
    }else
    if($nu == 'true'){
        $sql = "UPDATE `for_vot` SET `negativ_votes` = `negativ_votes` + 1  WHERE `for_vot`.`id` = $id";
        $sql2 = "INSERT INTO users_votes (`id`, `usr_id`, `vot_id`, `vot`) VALUES (NULL, '$usr', '$id ', 'nu')";
        
    }else{
        header('Content-Type: application/json');
        echo json_encode([-2, 'Selecteaza o obtiune']);die();
    }
    $result = mysqli_query($db,$sql);
    $result2 = mysqli_query($db,$sql2);
    
    if(!$result || !$result2){
        $error = "Atenție! " . mysqli_error($db);
        header('Content-Type: application/json');
        echo json_encode([-2, $error]); die();
    }else{



        header('Content-Type: application/json');
        echo json_encode([0,'success']);


}

    
}

?>