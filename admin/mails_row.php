<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT mailbox.mail_subject,mailbox.mail_text,mailbox.sent_date,users.firstname,users.lastname FROM mailbox INNER JOIN users ON sender=id WHERE mailbox.mail_id=:id ");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();		

		$stmt = $conn->prepare("UPDATE mailbox SET seen=1 WHERE mail_id=:id");
		$stmt->execute(['id'=>$id]);
		
		$pdo->close();

		echo json_encode($row);
	}
?>