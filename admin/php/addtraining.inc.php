<?php 
	include_once '../../includes/db.inc.php';
	if (isset($_POST['add'])) {
		$course = $_POST['course'];
		$lecturer = $_POST['lecturer'];

		try {
			$conn->training->insertOne([
				'course' => $course,
				'lecturer' => $lecturer,
				'id' => time()
			]);
			?>
			<script>
				alert("Training Course has been added successfully");
				window.location.replace("../viewtraining.php?result=success");
			</script>
			<?php
		} catch (Exception $e) {
			?>
			<script>
				alert("Training course could not be added: <?php echo addslashes($e->getMessage()); ?>");
				window.location.replace("../addtraining.php?result=fail");
			</script>
			<?php
		}
	}

	if (isset($_POST['update'])) {
		$cid = $_POST['cid'];
		$course = $_POST['course'];
		$lecturer = $_POST['lecturer'];

		try {
			$filter = is_numeric($cid) ? ['id' => (int)$cid] : ['_id' => new MongoDB\BSON\ObjectId($cid)];
			$conn->training->updateOne($filter, [
				'$set' => [
					'course' => $course,
					'lecturer' => $lecturer
				]
			]);
			?>
			<script>
				alert("Training Course has been updated successfully");
				window.location.replace("../viewtraining.php?result=success");
			</script>
			<?php
		} catch (Exception $e) {
			?>
			<script>
				alert("Training course could not be edited: <?php echo addslashes($e->getMessage()); ?>");
				window.location.replace("../edittraining.php?result=fail");
			</script>
			<?php
		}
	}
?>