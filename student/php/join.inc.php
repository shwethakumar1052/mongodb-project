<?php
    session_start();
    include_once '../includes/db.inc.php';
    if (isset($_POST['joinnow'])) {
        $course = $_POST['course'];
        $user = $_SESSION['username'];
        $conn->joincourse->insertOne([
            'course' => $course,
            'student' => $user
        ]);
        header("Location: ../join.php?success=1");
        exit();
    }
?>