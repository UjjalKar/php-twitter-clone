<?php  

	include '../init.php';

	if(isset($_POST['like']) && !empty($_POST['like'])) {
		$user_id 	= $_SESSION['user_id'];
		$tweet_id 	= $_POST['like'];
		$get_id 	= $_POST['user_id'];
		$res = $getFromT->addLike($user_id, $tweet_id, $get_id);
		echo json_encode($res);
	}

	if(isset($_POST['unlike']) && !empty($_POST['unlike'])) {
		$user_id 	= $_SESSION['user_id'];
		$tweet_id 	= $_POST['unlike'];
		$get_id 	= $_POST['user_id'];
		$res = $getFromT->unLike($user_id, $tweet_id, $get_id);
		echo json_encode($res);
	}

?>