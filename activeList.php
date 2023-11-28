<?php
/**
 * Created by PhpStorm.
 * User: florin
 * Date: 29.03.2019
 * Time: 14:51
 */

include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if($_POST['reset']){
        $sql = "UPDATE for_vot SET pro_votes = 0, abstention_votes = 0, negativ_votes = 0 WHERE for_vot.id = $id";
        $sql2 = "DELETE FROM users_votes WHERE vot_id = $id";

        $result = mysqli_query($db, $sql);
        $result = mysqli_query($db, $sql2);
//    $result2 = mysqli_query($db,$sql2);

        if (!$result) {
            $error = "Atenție! " . mysqli_error($db);
            header('Content-Type: application/json');
            echo json_encode([-2, $error]);
            die();
        } else {
            header('Content-Type: application/json');
            echo json_encode([0, 'success']);
            die();
        }
    }else {
        $nr = $_POST['nr'];

        $sql = "UPDATE for_vot SET rejected = $nr WHERE for_vot.id = $id";

        $result = mysqli_query($db, $sql);
//    $result2 = mysqli_query($db,$sql2);

        if (!$result) {
            $error = "Atenție! " . mysqli_error($db);
            header('Content-Type: application/json');
            echo json_encode([-2, $error]);
            die();
        } else {
            header('Content-Type: application/json');
            echo json_encode([0, 'success']);
            die();
        }
    }
}
header('Content-Type: application/json');
echo json_encode([0, 'success']);

?>