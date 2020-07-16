<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){


		$curr_password = $_POST['curr_password'];
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
		$cycle = $_POST['cycle'];
		$filiere = $_POST['filiere'];
		$year = $_POST['year'];
		$reserve = $_POST['reserve'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(password_verify($curr_password, $user['password'])){


			$photo = $user['photo'];
			$copy_cin = $user['copy_cin'];
			$copy_bac = $user['copy_bac'];
			$copy_attest = $user['copy_attest'];




			if(!empty($_FILES['photo']["name"])){
				$photo=(!empty($_FILES['photo'])?basename($_FILES["photo"]["name"]):$user['photo']);
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/photo/'.$photo);
			}else{
				$photo = $user['photo'];
			}
			if(!empty($_FILES['copy_cin']["name"])){
				$copy_cin = basename($_FILES["copy_cin"]["name"]);	
				move_uploaded_file($_FILES['copy_cin']['tmp_name'], 'images/cin/'.$copy_cin);
			}else{
				$copy_cin = $user['copy_cin'];
			}
			if(!empty($_FILES['copy_bac']["name"])){
				$copy_bac = basename($_FILES["copy_bac"]["name"]);	
				move_uploaded_file($_FILES['copy_bac']['tmp_name'], 'images/bac/'.$copy_bac);
			}else{
				$copy_bac = $user['copy_bac'];
			}
			if(!empty($_FILES['attestation']["name"])){
				$copy_attest = basename($_FILES["attestation"]["name"]);	
				move_uploaded_file($_FILES['attestation']['tmp_name'], 'images/attestation/'.$copy_attest);
			}else{
				$copy_attest = $user['copy_attest'];
			}									


			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			try{
				$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname,firstname_ar=:firstname_ar, lastname_ar=:lastname_ar, phone=:phone, adress=:adress, photo=:photo,cin=:cin,cne=:cne,copy_bac=:copy_bac,copy_cin=:copy_cin,copy_attest=:copy_attest,sex=:sex,cycle=:cycle,filiere=:filiere,year=:year,reserve=:reserve,birthday=:birthday WHERE id=:id");

				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname,'firstname_ar'=>$firstname_ar, 'lastname_ar'=>$lastname_ar, 'phone'=>$phone, 'adress'=>$adress, 'photo'=>$photo,'cin'=>$cin,'cne'=>$cne,'copy_bac'=>$copy_bac,'copy_cin'=>$copy_cin,'copy_attest'=>$copy_attest,'sex'=>$sex,'cycle'=>$cycle,'filiere'=>$filiere,'year'=>$year,'reserve'=>$reserve,'birthday'=>$birthday, 'id'=>$user['id']]);				

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	$pdo->close();

	header('location: profile.php');

?>