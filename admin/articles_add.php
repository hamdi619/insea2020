<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM articles WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'article already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}
			try{
				$stmt = $conn->prepare("INSERT INTO articles (title, description, slug,photo) VALUES ( :name, :description, :slug , :photo)");
				$stmt->execute(['name'=>$name, 'description'=>$description, 'slug'=>$slug, 'photo'=>$new_filename]);

				$mail_subject=$name;
				$mail_text="Checkout this new article <a href='article.php?article=".$slug."'>HERE!</a>";
				$stmt = $conn->prepare("INSERT INTO mailbox (sender, reciever, mail_subject, mail_text) VALUES (:sender, :reciever, :mail_subject, :mail_text)");
				$stmt->execute(['sender'=>1, 'reciever'=>0, 'mail_subject'=>$mail_subject, 'mail_text'=>$mail_text ]);
				$_SESSION['success'] = 'Article added successfully';


			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up article form first';
	}

	header('location: articles.php');

?>