<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['admin'])){
		try{
          $stmt = $conn->prepare("SELECT * FROM mailbox WHERE reciever=:reciever  and seen=0 ORDER BY sent_date DESC");
          $stmt->execute(['reciever'=>1]);
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

