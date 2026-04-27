<?php
include_once '../includes/db.inc.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $res = $conn->company->deleteOne(['id' => (int)$id]);
        if ($res->getDeletedCount() === 0) {
            // Try as string if int fails, or use _id if migrated
            $res = $conn->company->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        }
        ?>
        <script>
            alert("Company has been deleted");
            window.location.replace("../viewcompanies.php?result=success");
        </script>
        <?php
    } catch (Exception $e) {
        ?>
        <script>
            alert("Company could not be deleted: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("../viewcompanies.php?result=fail");
        </script>
        <?php
    }
}

if (isset($_GET['delete1'])) {
    $id = $_GET['delete1'];
    try {
        $res = $conn->training->deleteOne(['id' => (int)$id]);
        if ($res->getDeletedCount() === 0) {
            $res = $conn->training->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
        }
        ?>
        <script>
            alert("Course has been deleted");
            window.location.replace("../viewtraining.php?result=success");
        </script>
        <?php
    } catch (Exception $e) {
        ?>
        <script>
            alert("Course could not be deleted: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("../viewtraining.php?result=fail");
        </script>
        <?php
    }
}
?>