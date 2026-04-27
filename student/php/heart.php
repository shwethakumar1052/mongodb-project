<?php 
	session_start();
	include_once '../../includes/db.inc.php';
	if (isset($_GET['heart'])) {
	$id = $_GET['heart'];
	$filter = is_numeric($id) ? ['id' => (int)$id] : ['_id' => new MongoDB\BSON\ObjectId($id)];
	$row = $conn->feed->findOne($filter);
	
	if ($row) {
		$heart = isset($row['heart']) ? $row['heart'] : 'far fa-heart';
		$likes = isset($row['likes']) ? (int)$row['likes'] : 0;
		
		if ($heart == 'far fa-heart') {
			$newHeart = 'fas fa-heart';
			$newLikes = $likes + 1;
		} else {
			$newHeart = 'far fa-heart';
			$newLikes = ($likes > 0) ? $likes - 1 : 0;
		}
		
		$conn->feed->updateOne($filter, ['$set' => ['heart' => $newHeart, 'likes' => $newLikes]]);
		header("Location: ../index.php");
		exit();
	}
}