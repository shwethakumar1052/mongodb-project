<?php
      include_once '../includes/db.inc.php';
      session_start();  
      if (isset($_POST['change'])) {
        if (!isset($_SESSION['username'])) {
            header("Location: ../../login.php");
            exit();
        }
        $user = $_SESSION['username'];
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];
        if ($pwd1 != $pwd2) {
        ?>
        <script>
            alert("Passwords didn't match!!");
            window.location.replace("../changepass.php");
         </script>
        <?php
      } else {
        try {
            $conn->studentlogin->updateOne(
                ['fname' => $user],
                ['$set' => ['pwd' => $pwd1]]
            );
            ?>
            <script>
                alert("Password has been changed successfully");
                window.location.replace("../changepass.php");
             </script>
            <?php
        } catch (Exception $e) {
            ?>
            <script>
                alert("Error changing password: <?php echo addslashes($e->getMessage()); ?>");
                window.location.replace("../changepass.php");
             </script>
            <?php
        }
    }
    }
