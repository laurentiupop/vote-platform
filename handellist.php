<?php
/**
 * Created by PhpStorm.
 * User: lau
 * Date: 29.03.2019
 * Time: 14:11
 */


include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

$seach = $_REQUEST['search'];

if($seach['value'] != ''){
    $toQuerry = "AND titlu like '%".$seach['value']."%' ";
}else {
    $toQuerry = '';
}

$sql = "SELECT id, titlu, description, nr_pct_oz, IF(was_voted = 1, 'Nu', 'Da') was_voted, pro_votes,rejected, abstention_votes, negativ_votes FROM for_vot WHERE 1=1 $toQuerry";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_all($result,MYSQLI_ASSOC);



$arrayToSend = [];
foreach($row as $rowDTO){
    $section = [];
    $section[0]= $rowDTO['nr_pct_oz'];
    $section[1] = $rowDTO['titlu'];
    $section[2]= $rowDTO['description'];
    $section[3]= $rowDTO['rejected'] == 1 ? '<button data-id="'.$rowDTO['id'].'" class="btn-success btn-sm wasVote">Da</button>' : '<button data-id="'.$rowDTO['id'].'" class="btn-danger btn-sm wasVote">Nu</button>';
    $section[4]= '<span class="text-success">'.$rowDTO['pro_votes'].'</span>';
    $section[5]= '<span class="text-warning">'.$rowDTO['abstention_votes'].'</span>';
    $section[6]= '<span class="text-danger">'.$rowDTO['negativ_votes'].'</span>';
    $section[7]= '<button data-id="'.$rowDTO['id'].'" class="btn-success btn-sm resetVote">Reset</button>';
//    $section[5]= $rowDTO['vote'] == 1 ? '<button data-id="'.$rowDTO['id'].'" class="btn-success btn-sm canVote">Da</button>' : '<button data-id="'.$rowDTO['id'].'" class="btn-danger btn-sm canVote">Nu</button>';
    array_push($arrayToSend,$section);
}

$columns = array(
// datatable column index  => database column name
    0 =>'employee_name',
    1 => 'employee_salary',
    2=> 'employee_age',
    3=> 'employee_age',
    4=> 'employee_age',
    5=> 'employee_age'

);

$json_data = array(
    "draw"            => intval( $_REQUEST['draw'] ),
    "recordsTotal"    => intval( count($row) ),
    "recordsFiltered" => intval( count($row) ),
    "data"            => $arrayToSend
);
// header('Content-Type: application/json');
echo json_encode($json_data);

?>




