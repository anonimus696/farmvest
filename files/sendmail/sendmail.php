<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

/* 
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'mail.adm.tools';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'admin@farmvest.website';                     //SMTP username
	$mail->Password   = '123qwe#@!Q';                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
 */
	//Від кого лист
	$mail->setFrom('farmvest@gmail.com', 'Farmvest'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('admin@farmvest.website'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Нове повідомлення користувача';

	//Тіло листа
	$body = '<h3>Інформація користувача</h3>';

	if(trim(!empty($_POST['email']))){
		$body.= '<p> <strong>Email address:</strong> '.$_POST['email'].'</p>';
	}	

	if(trim(!empty($_POST['name']))){
		$body.= '<p> <strong>Name:</strong> '.$_POST['name'].'</p>';
	}	

	if(trim(!empty($_POST['phone']))){
		$body.= '<p> <strong>Phone:</strong> '.$_POST['phone'].'</p>';
	}	

	if(trim(!empty($_POST['message']))){
		$body.= '<p> <strong>Message:</strong> '.$_POST['message'].'</p>';
	}	

	
	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Send success!';
	}

	// $response = ['message' => $message];

	// header('Content-type: application/json');
	// echo json_encode($response);

	// header('Location: http://www.farmvest.website/home.html');

	header('Location: http://www.farmvest.website/sendok.html');

?>

<!-- 
echo
	"
	<script>
	document.location.href = 'http://www.farmvest.website/home.html';
	document.body.classList.add('success');
	</script>
	
	";
-->

