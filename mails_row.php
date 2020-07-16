<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();



		$stmt = $conn->prepare("SELECT * FROM mailbox WHERE mail_id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		if($row['reciever']=='2'){
			$row['type']="a mail from admin to everyone";
		}
		else if($row['reciever']!=='2' and $row['reciever']!=='0'){
			$row['type']="a mail from admin to you";
		}
		else{
			$row['type']="this is an article";
		}

		$stmt = $conn->prepare("UPDATE mailbox SET seen=1 WHERE mail_id=:id");
		$stmt->execute(['id'=>$id]);

		$pdo->close();

		echo json_encode($row);
	}
?>