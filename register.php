<?php
   include("config.php");
   session_start();
   $mycode = $_GET['key'];
   
   if($mycode)
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	      // username and password sent from form 
	      
	      $myusername = mysqli_real_escape_string($db,$_POST['username']);
	      $firstname= mysqli_real_escape_string($db,$_POST['firstname']);
	      $name= mysqli_real_escape_string($db,$_POST['name']);
	      $mypassword = mysqli_real_escape_string($db,md5($_POST['password'])); 
	      $mypassword2 = mysqli_real_escape_string($db,md5($_POST['password2'])); 
	       
	      if(strcmp($mypassword2 ,$mypassword) != 0){
	     
	       $error = "Parolele introduse nu sunt aceleași!";
	      }else{
	      
		      $sql = "SELECT * FROM account_request WHERE register_code = '$mycode' and is_solved = 0";
		      $result = mysqli_query($db,$sql);
		      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		      $active = $row['active'];
		      
		      $count = mysqli_num_rows($result);
				
		      if($count == 1) {
		      $email = $row['email'];
		      $oncrId = $row['oncr_id'];
		      
		      $sq3 = "SELECT * FROM oncr_id WHERE oncr_id = '$oncrId'";
		      $result3 = mysqli_query($db,$sql3);
		      $row3 = mysqli_fetch_array($result,MYSQLI_ASSOC);
		      $count3 = mysqli_num_rows($result);
		      
		      if($count3 == 1){
		         $sql2 = "INSERT INTO `users` (`id`, `username`, `name`, `first_name`, `email`, `acces_list`, `type`, `last_login`, `account_status`, `img_profile`, `member_ccl`, `dob`, `password`, `oncr_id`, `vote`) VALUES (NULL, '$myusername', '$name', '$firtsname', '$email', 'Ag', '1', CURRENT_TIMESTAMP, '0', NULL, '2', CURRENT_TIMESTAMP , '$mypassword ', '$oncrId ', '0');";
    
     			 $result2 = mysqli_query($db,$sql2);
     			 
     			 $sql4 = "UPDATE account_request SET `is_solved` = 1 WHERE oregister_code = '$mycode'";
     			 $result4 = mysqli_query($db,$sql4);
     			 
      			if($result2) {
		         	header("location: welcome.php");
		        }else{
		        	$error = "Atenție! " . mysqli_error($db);
		        }
		        }else{
		       		$error = "Id oncr invalid!";
		        }
		      }else {
		      	$error = "Linkul nu corespunde unui cont valid sau a fost activat deja.";
		      }
		   }
	   }
    	else{
    		$error = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css?v=<?php echo(strtotime('now')) ?>">
	<link rel="stylesheet" type="text/css" href="css/main.css?v=<?php echo(strtotime('now')) ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method='POST' action=''>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-account"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Înregistrează cont
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Introdu un nume de utilizator">
						<input required  class="input100" type="text" name="username" placeholder="Nume de utilizator">
						
						
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

<input required style="display:none" class="hidden" type="text" name="key" value="<?php echo $mycode ?>">
					<div class="wrap-input100 validate-input" data-validate = "Introdu un prenume">
						<input required  class="input100" type="text" name="firstname" placeholder="Prenume">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Introdu un nume">
						<input required  class="input100" type="text" name="name" placeholder="Nume">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
				
					<div class="wrap-input100 validate-input" data-validate="Introdu o parolă">
						<input required  class="input100" type="password" name="password" placeholder="Parolă">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Reintrodu parolă">
						<input required  class="input100" type="password" name="password2" placeholder="Confirmă parola">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Înregistrează-te
						</button>
					</div>
  					<div class="text-center" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

					<div class="text-center p-t-90">
						<a class="txt1" href="request.php">
							Cează un cont
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>