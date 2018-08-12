<?php  


	$title = '';
	
	if(isset($_SESSION['location'])) {
		if($_SESSION['location'] === 'settings') {
			$title .= "Twitter | Setting";
		} 

		if($_SESSION['location'] === 'home') {
			$title .= "Twitter | Home";
		}

		if($_SESSION['location'] === 'userpage') {
			$title .= "Twitter | ". $user->screenName;
		}

		if($_SESSION['location'] === 'password') {
			$title .= "Twitter | Change Password";
		}
	} else {
		$title .= "Twitter | Welcome";
	}

?>



<!doctype html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style-complete.css"/>
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>  
		<script src="assets/js/jquery.js"></script>  	  

    </head>
<!--Helvetica Neue-->
<body>