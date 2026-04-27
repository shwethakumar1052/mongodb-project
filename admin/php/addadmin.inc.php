
    <?php 
            include_once '../includes/db.inc.php';
            if (isset($_POST['signup'])) {
                $uname = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['mailid'];
                $phone = $_POST['phone'];
                $pwd1 = $_POST['pwd1'];
                $pwd2 = $_POST['pwd2'];
                if ($pwd1 == $pwd2) {
                    try {
                        $conn->adminlogin->insertOne([
                            'uname' => $uname,
                            'pwd' => $pwd1,
                            'fname' => $fname,
                            'lname' => $lname,
                            'email' => $email,
                            'phone' => $phone
                        ]);
                        ?>           
                        <script>
                            alert("Admin <?php echo $fname; ?> has been added successfully");
                            window.location.replace("../addadmin.php");
                        </script>
                        <?php
                    } catch (Exception $e) {
                        ?>
                        <script>
                            alert("Error adding admin: <?php echo addslashes($e->getMessage()); ?>");
                            window.location.replace("../addadmin.php");
                        </script>
                        <?php
                    }
                } else {
            ?>
                     <script>
                        alert("Admin could not be added, try again!");
                        window.location.replace("../addadmin.php");
                    </script>
                    <?php
                
            }
            } 
        ?>

