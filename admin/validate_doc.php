<?php
	include 'includes/session.php';

	if(isset($_POST['validate'])){
		$userid = $_POST['userid'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE users SET attestation_inscription=1 WHERE id=:id");
			$stmt->execute(['id'=>$userid]);

			$_SESSION['success'] = 'Student validated';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();

		header('location: user_info.php?user='.$userid);
	}

?>