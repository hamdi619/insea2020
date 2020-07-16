<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$firstname_ar = $_POST['firstname_ar'];
		$lastname = $_POST['lastname'];
		$lastname_ar = $_POST['lastname_ar'];
		$adress = $_POST['city'];
		$phone = $_POST['phone'];
		$cin = $_POST['cin'];
		$cne = $_POST['cne'];
		$birthday = $_POST['birthday'];
		$sex = $_POST['sex'];

		$filiere = $_POST['filiere'];
		$year = $_POST['year'];
		$reserve = $_POST['reserve'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		if(!isset($cycle)){
			$cycle = $row['cycle'];
		}
		else{$cycle = $_POST['cycle'];
		}

		if(!isset($filiere)){
			$filiere = $row['filiere'];
		}
		else{$filiere = $_POST['filiere'];
		}

		if(!isset($year)){
			$year = $row['year'];
		}
		else{$year = $_POST['year'];
		}

		if(!isset($reserve)){
			$reserve = $row['reserve'];
		}				
		else{$reserve = $_POST['reserve'];
		}
	

		try{
			$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname,firstname_ar=:firstname_ar, lastname_ar=:lastname_ar, phone=:phone, adress=:adress, cin=:cin,cne=:cne,cycle=:cycle,filiere=:filiere,year=:year,reserve=:reserve,birthday=:birthday WHERE id=:id");
			$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname,'firstname_ar'=>$firstname_ar, 'lastname_ar'=>$lastname_ar, 'phone'=>$phone, 'adress'=>$adress, 'cin'=>$cin,'cne'=>$cne,'cycle'=>$cycle,'filiere'=>$filiere,'year'=>$year,'reserve'=>$reserve,'birthday'=>$birthday, 'id'=>$id]);

			$_SESSION['success'] = 'User updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: users.php');

?>