<?php
	include 'includes/session.php';

	if(isset($_POST['sendmail'])){
		if(!isset($_POST['reciever'])){
			$reciever=2;
		}
		else{
			$reciever = $_POST['reciever'];	
		}


		$mail_subject = $_POST['subject'];
		$mail_text = $_POST['mail_text'];



		$conn = $pdo->open();


		try{
			$stmt = $conn->prepare("INSERT INTO mailbox (sender, reciever, mail_subject, mail_text) VALUES (:sender, :reciever, :mail_subject, :mail_text)");
			$stmt->execute(['sender'=>1, 'reciever'=>$reciever, 'mail_subject'=>$mail_subject, 'mail_text'=>$mail_text ]);
			$_SESSION['success'] = 'Email sent successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}


		$pdo->close();
		}	
	else{
		$_SESSION['error'] = 'Fill up form first';
	}

	header('location: mailbox.php');

?>