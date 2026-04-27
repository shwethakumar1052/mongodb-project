<?php 
	include_once '../../includes/db.inc.php';
	if (isset($_POST['add'])) {
		$cname = $_POST['cname'];
		$website = $_POST['website'];
		$ctype = $_POST['ctype'];
		$status = $_POST['status'];
		$address = $_POST['address'];
		$phone = $_POST['telephone'];

		try {
			$conn->company->insertOne([
				'name' => $cname,
				'type' => $ctype,
				'address' => $address,
				'number' => $phone,
				'website' => $website,
				'status' => $status,
				'minperc' => '0',
				'id' => time() // Using timestamp as a simple unique integer ID for compatibility
			]);
			?>
			<script>
				alert("Company has been added successfully");
				window.location.replace("../viewcompanies.php?result=success");
			</script>
			<?php
		} catch (Exception $e) {
			?>
			<script>
				alert("Company could not be added: <?php echo addslashes($e->getMessage()); ?>");
				window.location.replace("../addcompanies.php?result=fail");
			</script>
			<?php
		}
	}

	if (isset($_POST['update'])) {
		$cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$website = $_POST['website'];
		$ctype = $_POST['ctype'];
		$status = $_POST['status'];
		$address = $_POST['address'];
		$phone = $_POST['telephone'];
		$minperc = $_POST['minperc'];

		try {
			$filter = is_numeric($cid) ? ['id' => (int)$cid] : ['_id' => new MongoDB\BSON\ObjectId($cid)];
			$conn->company->updateOne($filter, [
				'$set' => [
					'name' => $cname,
					'website' => $website,
					'address' => $address,
					'type' => $ctype,
					'status' => $status,
					'number' => $phone,
					'minperc' => $minperc
				]
			]);
			?>
			<script>
				alert("Company has been updated");
				window.location.replace("../viewcompanies.php?result=success");
			</script>
			<?php
		} catch (Exception $e) {
			?>
			<script>
				alert("Company could not be updated: <?php echo addslashes($e->getMessage()); ?>");
				window.location.replace("../editcomp.php?result=fail");
			</script>
			<?php
		}
	}
?>