<?php 
	session_start();
	include_once '../../includes/db.inc.php';
	if (isset($_GET['heart'])) {
	$id = $_GET['heart'];
	$filter = is_numeric($id) ? ['id' => (int)$id] : ['_id' => new MongoDB\BSON\ObjectId($id)];
	$row = $conn->feed->findOne($filter);
	
	if ($row) {
		$heart = isset($row['heart']) ? $row['heart'] : 'far fa-heart';
		$newHeart = ($heart == 'far fa-heart') ? 'fas fa-heart' : 'far fa-heart';
		
		$conn->feed->updateOne($filter, ['$set' => ['heart' => $newHeart]]);
		header("Location: ../index.php");
		exit();
	}
}