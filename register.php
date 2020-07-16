<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'includes/session.php';


	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$firstname_ar = $_POST['firstname_ar'];
		$lastname = $_POST['lastname'];
		$lastname_ar = $_POST['lastname_ar'];
		$adress = $_POST['adress'];
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
		$repassword = $_POST['repassword'];



		$_SESSION['firstname'] = $firstname;
		$_SESSION['firstname_ar'] = $firstname_ar;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['lastname_ar'] = $lastname_ar;
		$_SESSION['adress'] = $adress;
		$_SESSION['phone'] = $phone;
		$_SESSION['cin'] = $cin;
		$_SESSION['cne'] = $cne;
		$_SESSION['birthday'] = $birthday;
		$_SESSION['sex'] = $sex;

		$_SESSION['cycle'] = $cycle;
		$_SESSION['filiere'] = $filiere;
		$_SESSION['year'] = $year;
		$_SESSION['reserve'] = $reserve
		;
		$_SESSION['email'] = $email;

		// if(!isset($_SESSION['captcha'])){
		// 	require('recaptcha/src/autoload.php');		
		// 	$recaptcha = new \ReCaptcha\ReCaptcha('6LdG86MZAAAAAHvn-6csBOBRSMssjmg-ajSaQVYr', new \ReCaptcha\RequestMethod\SocketPost());
		// 	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		// 	if (!$resp->isSuccess()){
		//   		$_SESSION['error'] = 'Please answer recaptcha correctly';
		//   		header('location: signup.php');	
		//   		exit();	
		//   	}	
		//   	else{
		//   		$_SESSION['captcha'] = time() + (1);
		//   	}

		// }

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{

					// upload images

					$target_dir_photo = "images/photo/";
					$target_dir_bac = "images/bac/";
					$target_dir_cin = "images/cin/";
					$target_dir_attestation = "images/attestation/";

					$photo_file=basename($_FILES["photo"]["name"]);
					$bac_file=basename($_FILES["bac"]["name"]);
					$cin_file=basename($_FILES["cin_copy"]["name"]);
					$attestation_file=basename($_FILES["attestation"]["name"]);

					$target_photo = $target_dir_photo . $photo_file;
					$target_bac = $target_dir_bac . $bac_file;
					$target_cin = $target_dir_cin . $cin_file;
					$target_attestation = $target_dir_attestation . $attestation_file;

					$uploadOk = 1;

					$photoFileType = strtolower(pathinfo($target_photo,PATHINFO_EXTENSION));
					$bacFileType = strtolower(pathinfo($target_bac,PATHINFO_EXTENSION));
					$cinFileType = strtolower(pathinfo($target_cin,PATHINFO_EXTENSION));
					$attestationFileType = strtolower(pathinfo($target_attestation,PATHINFO_EXTENSION));

					// Check if image file is a actual image or fake image
					// Check if file already exists
					// Check file size
					// Allow certain file formats
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					  echo "Sorry, your files were not uploaded.";
					// if everything is ok, try to upload files
					} else {
						$upload1=move_uploaded_file($_FILES["photo"]["tmp_name"], $target_photo);
						$upload2=move_uploaded_file($_FILES["bac"]["tmp_name"], $target_bac);
						$upload3=move_uploaded_file($_FILES["cin_copy"]["tmp_name"], $target_cin);
						$upload4=move_uploaded_file($_FILES["attestation"]["tmp_name"], $target_attestation);
					}
					if (!($upload1 AND $upload2 AND $upload3 AND $upload4 )) {
		    			 $_SESSION['error'] = "error uploading files";
					} 

					// end of file uploads ^
					$stmt=$conn->prepare("INSERT INTO users(email, password,firstname, lastname,lastname_ar,adress,firstname_ar,cycle, filiere,year,reserve,phone,sex,photo,copy_cin,copy_bac,copy_attest,birthday,cin,cne,activate_code) VALUES (:email,:password,:firstname,:lastname,:lastname_ar,:adress,:firstname_ar,:cycle,:filiere,:year,:reserve,:phone,:sex,:photo,:copy_cin,:copy_bac,:copy_attest,:birthday,:cin,:cne,:activate_code)");
					
					$stmt->execute(['email'=>$email,'password'=>$password,'firstname'=>$firstname,'lastname'=>$lastname,
						'lastname_ar'=>$lastname_ar,'adress'=>$adress,'firstname_ar'=>$firstname_ar,'cycle'=>$cycle,'filiere'=>$filiere,'year'=>$year,'reserve'=>$reserve,'phone'=>$phone,'sex'=>$sex,'photo'=>$photo_file,'copy_cin'=>$cin_file,'copy_bac'=>$bac_file,'copy_attest'=>$attestation_file,'birthday'=>$birthday,'cin'=>$cin,'cne'=>$cne,'activate_code'=>$code]);


					$userid = $conn->lastInsertId();


					$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$_POST['password']."</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/version4/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					";


		    		require 'vendor/autoload.php';

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'projet.devweb2020@gmail.com';     
				        $mail->Password = 'insea2020';                    
				        $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				        );                         
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   
				        
				        $mail->setFrom('projet.devweb2020@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('projet.devweb2020@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'INSEA Site Sign Up';
				        $mail->Body    = $message;

				        $mail->send();

				        unset($_SESSION['firstname']);
				        unset($_SESSION['lastname']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Account created. Check your email to activate.';
				        header('location: signup.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
				        header('location: signup.php');
				    }



					if(!$mail->send()) {  
					    $_SESSION['error'] = "error sending the email : " . $mail->ErrorInfo ;
				        header('location: signup.php');

					} else{
				        $_SESSION['success'] = 'Account created. Check your email to activate.';
				        header('location: signup.php');}




				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	
	else{
		$_SESSION['error'] = $e->getMessage();
		header('location: signup.php');
	}

?>



