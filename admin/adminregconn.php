<?php
    include_once '../includes/db.inc.php';
    if(isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password1 == $password2) {
            try {
                $conn->adminlogin->insertOne([
                    'uname' => $uname,
                    'pwd' => $password1,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'phone' => $phone
                ]);
                header("Location: login.php?signup=success");
            } catch (Exception $e) {
                header("Location: adminreg.php?error=db");
            }
        } else { 
            header("Location: adminreg.php?error=passwordsmismatch");
        }
    }
?>