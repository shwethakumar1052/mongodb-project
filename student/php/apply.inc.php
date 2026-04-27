<?php
    session_start();
    include_once '../../includes/db.inc.php';
    if (isset($_GET['comp'])) {
        $company = $_GET['comp'];
        $user = $_SESSION['username'];
        
        try {
            $conn->applied->insertOne([
                'company' => $company,
                'name' => $user,
                'status' => 'Unknown',
                'id' => time()
            ]);
            ?>
                <script>
                    alert("You have applied for the company successfully!");
                    window.location.replace("../viewapply.php");
                </script>
            <?php
        } catch (Exception $e) {
            ?>
                <script>
                    alert("Apply Unsuccessful: <?php echo addslashes($e->getMessage()); ?>");
                    window.location.replace("../viewapply.php");
                </script>
            <?php
        }
    }  
?>