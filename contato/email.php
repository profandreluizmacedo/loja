<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer(true);

try {
	$nome     = $_POST['nome'];
	$email    = $_POST['email'];
	$assunto  = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];


	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port       = 465;

	$mail->SMTPAuth   = true;
	$mail->Username   = 'andreluiznetsolutions@gmail.com';
	$mail->Password   = 'mzbk ccyq xypo mtct'; //Chave secreta do cliente
	//Para Criar a Chave secreta acesse: 👉 https://myaccount.google.com/apppasswords
	//Crie um Aplicativo e gere uma Senha para o APP e informe a Senha gerada na Variavel password acima
    //A conta precisa estar com a Verificação em duas etapas ativada
	$mail->setFrom($email,$nome);
	$mail->addAddress("andre_luiz@etecbebedouro.com.br"); //Email para onde você vai enviar

	$mail->isHTML(true);
	$mail->Subject = 'Contato Efetuado Através da Loja ETEC'; //Assunto do Email
	$mail->Body    = "NOME: $nome <br>Email: $email <br> Mensagem: $mensagem"; //Mensagem do Email

	$mail->send();
	echo 'Mensagem enviada com sucesso.';

} catch (Exception $e) {

	echo "A mensagem não pôde ser enviada. Erro do PHPMailer: {$mail->ErrorInfo}";

}
?>