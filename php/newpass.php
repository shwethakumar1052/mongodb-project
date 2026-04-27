  <?php 
      include_once '../includes/db.inc.php'; 
      if(isset($_POST['confirm'])) {
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        $username = $_POST['username'];
        if ($pass1 != $pass2) { ?>
          <script type="text/javascript">
            alert("Passwords didnt match!!");
            window.location.replace("../newpass.php");
          </script>
        <?php
      } else {
        try {
            $conn->studentlogin->updateOne(
                ['uname' => $username],
                ['$set' => ['pwd' => $pass1]]
            );
            ?>
              <script type="text/javascript">
                alert("Password changed successfully!!");
                window.location.replace("../login.php");
              </script>
            <?php
        } catch (Exception $e) {
            ?>
              <script type="text/javascript">
                alert("Error changing password: <?php echo addslashes($e->getMessage()); ?>");
                window.location.replace("../newpass.php?username=<?php echo $username; ?>");
              </script>
            <?php
        }
    }
    }
    ?>