<?php

include('session.php');
if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
}

$seach = $_REQUEST['search'];

if($seach['value'] != ''){
    $toQuerry = "AND username like '%".$seach['value']."%' ";
}else {
    $toQuerry = '';
}

$sql = "SELECT id, username, email, acces_list, IF(account_status = 1, 'Activ', 'Inactiv') account_status, IF(member_ccl = 1, 'Da', 'Nu') member_ccl, vote FROM users WHERE 1=1 $toQuerry";
$result = mysqli_query($db,$sql);

$row = array();
while ($ro = $result->fetch_assoc()) {
    $row[] = $ro;
}

$arrayToSend = [];
foreach($row as $rowDTO){
    $section = [];
    $section[0] = $rowDTO['username'];
    $section[1]= $rowDTO['email'];
    $section[2]= $rowDTO['acces_list'];
    $section[3]= $rowDTO['account_status'];
    $section[4]= $rowDTO['member_ccl'];
    $section[5]= $rowDTO['vote'] == 1 ? '<button data-id="'.$rowDTO['id'].'" class="btn-success btn-sm canVote">Da</button>' : '<button data-id="'.$rowDTO['id'].'" class="btn-danger btn-sm canVote">Nu</button>';
    array_push($arrayToSend,$section);
}

$json_data = array(
    "draw"            => intval( $_REQUEST['draw'] ),
    "recordsTotal"    => intval( count($row) ),
    "recordsFiltered" => intval( count($row) ),
    "data"            => $arrayToSend
);
header('Content-Type: application/json');
echo json_encode($json_data);
?>