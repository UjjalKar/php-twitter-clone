<?php  
	
	include 'core/init.php';

	$user_id = $_SESSION['user_id'];
	$user = $getFromU->userData($user_id);

	if($getFromU->loggedIn() === false) {
		header('Location: '.BASE_URL.'index.php');
	}

	$_SESSION['location'] = 'settings';

	// $_SESSION['location'] = 'settings';
	
	if(isset($_POST['submit'])) {
		$username 	= $getFromU->checkInput($_POST['username']);
		$email 		= $getFromU->checkInput($_POST['email']);
		$error 		= array();

		if(!empty($username) and !empty($email)) {
			if($user->username != $username and $getFromU->checkUsername($username) === true) {
				$error['username'] = "The username is not available";

			} else if(preg_match("/[^a-zA-Z0-9\!]", $username)) {
				$error['username'] = "only characters and numbers allowed!";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$error['email'] = "invalid email format";

			} elseif ($user->email != $email and $getFromU->checkEmail($email) === true) {

				$error['email'] = "Email already in use";

			} else {
				$getFromU->update('users', $user_id, array(

					'username' => $username,
					'email' => $email

				));
				header('Location: '.BASE_URL.'settings/account');
			}

		} else {
			$error['fields'] = 'All fields are requires';
		}
	}


?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/leftsection.php'; ?>
		
		<div class="righter">
			<div class="inner-righter">
				<div class="acc">
					<div class="acc-heading">
						<h2>Account</h2>
						<h3>Change your basic account settings.</h3>
					</div>
					<div class="acc-content">
					<form method="POST">
						<div class="acc-wrap">
							<div class="acc-left">
								<?php echo $user->username; ?>
							</div>
							<div class="acc-right">
								<input type="text" name="username" value="<?php echo $user->username; ?>"/>
								<span>
									<?php if(isset($error['username'])){
										echo $error['username'];
									} ?>
								</span>
							</div>
						</div>

						<div class="acc-wrap">
							<div class="acc-left">
								Email
							</div>
							<div class="acc-right">
								<input type="text" name="email" value="<?php echo $user->email; ?>"/>
								<span>
									<?php if(isset($error['email'])){echo $error['email'];} ?>
								</span>
							</div>
						</div>
						<div class="acc-wrap">
							<div class="acc-left">
								
							</div>
							<div class="acc-right">
								<input type="Submit" name="submit" value="Save changes"/>
							</div>
							<div class="settings-error">
								<?php if(isset($error['fields'])){echo $error['fields'];} ?>
   							</div>	
						</div>
					</form>
					</div>
				</div>
				<div class="content-setting">
					<div class="content-heading">
						
					</div>
					<div class="content-content">
						<div class="content-left">
							
						</div>
						<div class="content-right">
							
						</div>
					</div>
				</div>
			</div>	
		</div><!--RIGHTER ENDS-->

	</div>
	<!--CONTAINER_WRAP ENDS-->

	</div><!-- ends wrapper -->
<?php include 'includes/footer.php'; ?>


