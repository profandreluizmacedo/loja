<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);

try {

	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port       = 465;

	$mail->SMTPAuth   = true;
	$mail->Username   = 'andreluiznetsolutions@gmail.com';
	$mail->Password   = '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'; //Chave secreta do cliente

	$mail->setFrom($email,$nome);
	$mail->addAddress("andre_luiz@etecbebedouro.com.br"); //Email para onde você vai enviar

	$mail->isHTML(true);
	$mail->Subject = 'Contato Efetuado Através da Loja ETEC'; //Assunto do Email
	$mail->Body    = "NOME: $nome <br>Email: $email <br> Mensagem: $mensagem"; //MEnsagem do Email

	$mail->send();
	echo 'Mensagem enviada com sucesso.';

} catch (Exception $e) {

	echo "A mensagem não pôde ser enviada. Erro do PHPMailer: {$mail->ErrorInfo}";

}
?>