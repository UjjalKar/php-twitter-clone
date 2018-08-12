<?php  
	include 'core/init.php';

	$user_id = $_SESSION['user_id'];
	$user = $getFromU->userData($user_id);

	if($getFromU->loggedIn() === false) {
		header('Location: '.BASE_URL. 'index.php');
	}

	$_SESSION['location'] = 'password';

	if(isset($_POST['submit'])) {
		$currentPwd 	= $_POST['currentPwd'];
		$newPassword 	= $_POST['newPassword'];
		$rePassword 	= $_POST['rePassword'];
		$error 			= array();

		if(!empty($currentPwd) && !empty($newPassword) && !empty($rePassword)) {
			if($getFromU->checkPassword($currentPwd) === true) {

				if(strlen($newPassword) < 6) {

					$error['newPassword'] = "password is short";

				} else if($newPassword != $rePassword) {

					$error['rePassword'] = "password doesn't match";
				} else {
					$enpass = md5($newPassword);
					$getFromU->update('users', $user_id, array(

						'password' => $enpass

					));
					header('Location: '.BASE_URL.$user->username);
				}

			} else {
				$error['currentPwd'] = "password is incorrect";
			}

		} else {
			$error['fields'] = "All Fields are required";
		}
	}


?>
<?php include 'includes/header.php'; ?>

<?php include 'includes/leftsection.php'; ?>

	<div class="righter">
		<div class="inner-righter">
			<div class="acc">
				<div class="acc-heading">
					<h2>Password</h2>
					<h3>Change your password or recover your current one.</h3>
				</div>
				<form method="POST">
				<div class="acc-content">
					<div class="acc-wrap">
						<div class="acc-left">
							Current password
						</div>
						<div class="acc-right">
							<input type="password" name="currentPwd"/>
							<span>
								<?php if(isset($error['currentPwd'])){echo $error['currentPwd'];} ?>
							</span>
						</div>
					</div>

					<div class="acc-wrap">
						<div class="acc-left">
							New password
						</div>
						<div class="acc-right">
							<input type="password" name="newPassword" />
							<span>
								<?php if(isset($error['newPassword'])){echo $error['newPassword'];} ?>
							</span>
						</div>
					</div>

					<div class="acc-wrap">
						<div class="acc-left">
							Verify password
						</div>
						<div class="acc-right">
							<input type="password" name="rePassword"/>
							<span>
								<?php if(isset($error['rePassword'])){echo $error['rePassword'];} ?>
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
	</div>
	<!--RIGHTER ENDS-->
</div>
<!--CONTAINER_WRAP ENDS-->
</div>
<!-- ends wrapper -->
<?php include 'includes/footer.php'; ?>
