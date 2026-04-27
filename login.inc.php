<?php
	include_once 'includes/db.inc.php';
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd1'];
	session_start();
	if(isset($_POST['login'])) {
		// Check Admin collection
		$admin = $conn->adminlogin->findOne(['uname' => $uname, 'pwd' => $pwd]);
		
		if($admin) {
			$_SESSION['username'] = $admin['uname'];
			header("Location: admin/index.php");
			exit();
		} else {
			// Check Student collection
			$student = $conn->studentlogin->findOne(['uname' => $uname, 'pwd' => $pwd]);
			
			if($student) {
				$_SESSION['username'] = $student['fname'];
				header("Location: student/index.php");
				exit();
			} else {
				?>
                <script>
                    alert("Username and Password Incorrect!");
                    window.location.replace("login.php");
                </script>
            <?php
			} 
		} 
	}
?>
		
