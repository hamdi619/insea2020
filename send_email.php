<?php
	include 'includes/session.php';

	if(isset($_POST['sendmail'])){

		$mail_subject = $_POST['subject'];
		$mail_text = $_POST['mail_text'];
		if (isset($_SESSION['user'])) {
			$sender=$_SESSION['user'];	
		}
		else{
			$sender=0;	
		}
		$reciever = 1;	


		$conn = $pdo->open();


		try{
			$stmt = $conn->prepare("INSERT INTO mailbox (sender, reciever, mail_subject, mail_text) VALUES (:sender, :reciever, :mail_subject, :mail_text)");
			$stmt->execute(['sender'=>$sender, 'reciever'=>$reciever, 'mail_subject'=>$mail_subject, 'mail_text'=>$mail_text ]);
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

	if (isset($_SESSION['user'])) {
		header('location: mailbox.php');	
	}
	else{
		header('location: index.php');	
	}

?>