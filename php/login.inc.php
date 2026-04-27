<?php
	session_start();
	include_once '../includes/db.inc.php';
	$email = $_POST['email'];
	$pwd = $_POST['password'];

	if(isset($_POST['login'])) {
		$admin = $conn->adminlogin->findOne(['email' => $email, 'pwd' => $pwd]);
		if($admin) {
			$_SESSION['username'] = $admin['uname'];
			header("Location: ../admin/index.php");
            exit();
		} else {
			$student = $conn->studentlogin->findOne(['email' => $email, 'pwd' => $pwd]);
			if($student) {
				$_SESSION['username'] = $student['fname'];
				header("Location: ../student/index.php");
                exit();
			} else {
			    header("Location: ../login.php?result=fail");
                exit();
		    } 
		} 
	}
		



		// $sqlsess = "select username from userlogin where email = '$email';";
		// $sessres = mysqli_query($conn, $sqlsess);
		// $resCheck = mysqli_num_rows($sessres);
		// if ($resCheck > 0) {
		// 	while ($rowsess = mysqli_fetch_assoc($sessres)) {
		// 		$_SESSION['username'] = $rowsess['username'];
		// 		echo "Welcome ".$_SESSION['username'];
		// 	}
		// }
		// }

?>