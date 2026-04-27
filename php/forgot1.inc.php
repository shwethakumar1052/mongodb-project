<?php 
  include_once '../includes/db.inc.php'; 
  if (isset($_POST['submit'])) {
  $ans = $_POST['answer'];
  $username = $_POST['username'];  
  
    $row = $conn->studentlogin->findOne(['uname' => $username]);
    if ($row) {
      $dbans = $row['secans'];
      if ($dbans == $ans) {
        header("Location: ../newpass.php?username=$username");
      } else { ?>
          <script type="text/javascript">
            alert("Answers didnt match");
            window.location.replace("../forgot.inc.php");
          </script>
       <?php   
      }
    }
  }
?>