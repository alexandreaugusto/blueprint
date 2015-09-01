<?php
require_once('../../plugins/phpmailer/class.phpmailer.php');

function section_emails($setor) {
	$emails = array(
		'direcao' => 'secretaria-direcao.fat@uerj.br',
		'geral' => 'secretaria-geral.fat@uerj.br',
		'pos' => 'secretaria-posgraduação.fat@uerj.br',
		'departamentos' => 'secretaria-departamentos.fat@uerj.br',
	);
	return $emails[$setor];
}

header('Content-type: text/html; charset=utf-8');

$nome     = $_POST['nome'];
$email    = $_POST['email'];
$telefone = $_POST['telefone'];
$setor    = section_emails($_POST['setor']);
$mensagem = $_POST['mensagem'];

$mail = new PHPMailer();

$mail->CharSet = 'UTF-8';

$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
//$mail->SMTPSecure = 'ssl';
$mail->Host = 'webmail.uerj.br';
//$mail->Port = 465;
$mail->Username = 'naoresponda.fat';
$mail->Password = 'fa5na0r&sp0nda';
$mail->SetFrom('naoresponda.fat@uerj.br', 'Contato FAT-UERJ');

$mail->AddAddress($setor, $setor);

$mail->Subject = "Teste";

$body .= "<b>Nome: </b>" . $nome . "<br />";
$body .= "<b>E-mail: </b>" . $email . "<br />";
$body .= "<b>Telefone: </b>" . $telefone . "<br />";
$body .= "<b>Setor: </b>" . $setor . "<br />";
$body .= "<b>Mensagem: </b>" . $mensagem . "<br />";

$mail->MsgHTML($body);

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "ok";
}