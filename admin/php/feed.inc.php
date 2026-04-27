<?php 
	session_start();
	include_once '../../includes/db.inc.php';
	if (isset($_POST['post'])) {
		$message = $_POST['message'];
		$user = $_SESSION['username'];
		
		try {
			$res = $conn->feed->insertOne([
				'user' => $user,
				'message' => $message,
				'date' => date('Y-m-d'),
				'time' => date('H:i:s')
			]);
			header("Location: ../index.php?result=success");
		} catch (Exception $e) {
			header("Location: ../index.php?result=fail");
		}
	}
?>
