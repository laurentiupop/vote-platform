<?php
   include("config.php");
 
 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 
   $result = true;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['id']);
      $mypassword = mysqli_real_escape_string($db,$_POST['email']); 
      $random = generateRandomString(15).$myusername;
      
      $sql = "INSERT INTO account_request (`id`, `oncr_id`, `email`, `is_solved`, `register_code`) VALUES (NULL, '$myusername', '$mypassword ', '0', '$random')";
    
     $result = mysqli_query($db,$sql);
		
      if($result ) {
        
        $to = $mypassword;
	$subject = "Cont ag.scoutmures.ro";
	$txt = "Bună! \nNe bucurăm că dorești să fii la curent cu informațiile legate de Adunarea Generală 2019. Pe baza contului creat vei putea accesa platforma http://ag.scoutmures.ro unde vei putea consulta toate documentele AG 2019.\n\nDe asemenea, anul acesta dorim să testăm un sistem de vot electronic care va funcționa tot pe baza acestui cont. Vei avea nevoie de o conexiune la internet și de un telefon deștept pentru a putea vota la AG. Dacă nu ești prezent sau dacă nu îndeplinești condițiile de vot nu vei putea vota, dar vei putea urmări în timp real ce se votează și care sunt rezultatele. \nATENȚIE! Informațiile și sistemul se testează și nu sunt 100% precise pentru moment.\n\nPentru a intra în contul tău, te rugăm accesează acest link și configurează-ți numele de utilizator și parola \n\nhttp://ag.scoutmures.ro/register.php?key=$random \n\n Gata oricând!\n Laurențiu Pop, administrator sistem.";
	$headers = "From: contact@scoutmures.ro" . "\r\n" ."CC: laurentiu.pop@scoutmures.ro";
	

	mail($to,$subject,$txt,$headers);
        
         header("location: login.php");
      }else {
      if(!$result){
		$error = "Atenție! " . mysqli_error($db);
	}else
         $error = "Cererea ta nu a putut fi inregistrată, te rugăm încearcă mai târziu";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
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

<style>
.greenStyle{
   	 background: -webkit-linear-gradient(top, #7dff75, #3d6f05);
   	 background: -o-linear-gradient(top, #7dff75, #3d6f05);
 	 background: -moz-linear-gradient(top, #7dff75, #3d6f05);
  	 background: linear-gradient(top, #7dff75, #3d6f05);
	}
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100 greenStyle">
				<form class="login100-form validate-form" method='POST' action=''>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-account-add"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Crează cont
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Introdu un ID ONCR">
						<input required class="input100" type="text" name="id" placeholder="ID oncr">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introdu emailul tău">
						<input required  class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="✉"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Crează cont
						</button>
					</div>
  					<div class="text-center" style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					<div class="text-center p-t-90">
						<a class="txt1" href="/login">
							Loghează-te
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