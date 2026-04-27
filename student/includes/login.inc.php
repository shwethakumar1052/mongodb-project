<?php
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if (isset($_POST['login'])) {
		include_once '../../includes/db.inc.php';
        $row = $conn->studentlogin->findOne(['uname' => $user, 'pwd' => $pass]);
		if ($row) {
            $_SESSION['username'] = $row['fname']; 
            header("Location: ../index.php?result=success");
            exit();
		} else {
			 header("Location: ../login.php?result=fail");
             exit();
		}
	} else {
			header("Location: ../login.php?result=failure");
            exit();
	}

?>
