<?php
if (isset($_POST['update'])) {
    include_once '../../includes/db.inc.php';
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    try {
        $filter = is_numeric($id) ? ['id' => (int)$id] : ['_id' => new MongoDB\BSON\ObjectId($id)];
        $res = $conn->applied->updateOne($filter, [
            '$set' => ['status' => $status]
        ]);
        
        ?>
        <script>
            alert("Details have been edited");
            window.location.replace("../viewapply.php");
        </script>  
        <?php
    } catch (Exception $e) {
        ?>
        <script>
            alert("Details couldn't be edited: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("../viewapply.php");
        </script>
        <?php
    }
}
?>