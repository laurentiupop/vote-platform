<?php 
include('session.php');

$name = $_POST['titleT'];
$description = $_POST['description'];
$oz = $_POST['oz'];
$order = $_POST['order'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO `for_vot` ( `titlu`, `description`, `nr_pct_oz`, `sort`, `pro_votes`, `abstention_votes`, `negativ_votes`)
            VALUES ( '$name' ,'$description' , '$oz' , '$order' , 0,0,0 )";
//     try{
    $result2 = mysqli_query($db,$sql);
   ;
    if($result2) {
        
    }else{
        header('Content-Type: application/json');
        echo json_encode( mysqli_error($db));
        die();
    }
//     }catch (Exception $e){
//         header('Content-Type: application/json');
//         echo json_encode('Insert was not possible');
//     }
}
header('Content-Type: application/json');
echo json_encode([0,'success']);

?>