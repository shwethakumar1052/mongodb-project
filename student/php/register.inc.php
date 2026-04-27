<?php 
	include_once '../../includes/db.inc.php';
	if (isset($_POST['signup'])) {
		$uname = $_POST['username'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mailid = $_POST['mailid'];
		$phone = $_POST['phone'];
		$pwd1 = $_POST['pwd1'];
		$pwd2 = $_POST['pwd2'];
		$secque = $_POST['secque'];
		$secans = $_POST['secans'];

        try {
            $conn->studentlogin->insertOne([
                'uname' => $uname,
                'fname' => $fname,
                'lname' => $lname,
                'email' => $mailid,
                'phone' => $phone,
                'pwd' => $pwd1,
                'secque' => $secque,
                'secans' => $secans,
                'percentage' => '0',
                'course' => 'Not Specified'
            ]);
            header("Location: ../login.php?result=success");
            exit();
        } catch (Exception $e) {
            header("Location: ../register.php?result=fail&error=" . urlencode($e->getMessage()));
            exit();
        }
	}
?>