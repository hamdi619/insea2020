<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
          $stmt = $conn->prepare("SELECT * FROM mailbox WHERE (reciever=:reciever Or reciever=:everyone_id or reciever=:article ) and seen=0 ORDER BY sent_date DESC");
          $stmt->execute(['reciever'=>$_SESSION['user'],'everyone_id'=>2,'article'=>0]);
			foreach($stmt as $row){
				$output['count']++;
				$subject = (strlen($row['mail_subject']) > 30) ? substr_replace($row['mail_subject'], '...', 27) : $row['mail_subject'];
				$output['list'] .= "
					<li>
						<a href='mailbox.php'>
		                    <small style='color:green'>".$row['sent_date']."</small>
		                    <h4>
		                    <b style='color:black'>".$subject."</b>
		                    </h4>

						</a>
					</li>
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}


	$pdo->close();
	echo json_encode($output);

?>

