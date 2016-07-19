<script>
	function volta(){
		setTimeout("window.location='cadastro.html'", 500);
	}
	function beleza(){
		setTimeout("window.location='index.html'", 4000);
	}
</script>
<meta charset="UTF-8"/>
<?php
	require 'PHPMailer/PHPMailerAutoload.php';

	$nome = $_POST['nome'];
	$email= $_POST['email'];
	$senha= $_POST['senha'];
	$senhaconf = $_POST['senhaconf'];

	if ($senha!=$senhaconf) {
		echo "<script>alert('As senhas são são compatíveis! Tente corrigir')</script>";
		echo "<script>volta();</script>";
	}
	else{

// Instância do objeto PHPMailer
$mail = new PHPMailer;
 
// Configura para envio de e-mails usando SMTP
$mail->isSMTP();
 
// Servidor SMTP
$mail->Host = 'smtp.gmail.com';
 
// Usar autenticação SMTP
$mail->SMTPAuth = true;
 
// Usuário da conta
$mail->Username = 'grupoalgames@gmail.com';
 
// Senha da conta
$mail->Password = '123456AL';
 
// Tipo de encriptação que será usado na conexão SMTP
$mail->SMTPSecure = 'ssl';
 
// Porta do servidor SMTP
$mail->Port = 465;
 
// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);
 
// Email do Remetente
$mail->From = 'grupoalgames@gmail.com';
 
// Nome do Remetente
$mail->FromName = 'Games Stop';
 
// Endereço do e-mail do destinatário
$mail->addAddress($email);
 
// Assunto do e-mail
$mail->Subject = 'Cadastro Game Stop';
 
// Mensagem que vai no corpo do e-mail
$mail->Body = '<br><img src="https://www.gamestop.ie/Views/Locale/Content/Images/logo.png" alt="img-gs"><br><font color="red"><h1>Obrigado por se cadastrar em nosso site!</h1></font><h3></br>Suas informações de identificação: <br><br><b>Email: '.$email.'</b></h3><h3><b>Usuário: </b>'.$nome.'<h3><b>Senha: </br></b>'.$senha.'<h3>';
$mail->Body .= '<font color="green"><h5>Equipe de Tecnologia da Informação Games Stop<h5></font>
<h5>Esta é uma mensagem automática. Não responda a este e-mail. Para ver mais informações, entre em contato com o setor de TI da gamestop</h5>'; 
// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()){
    echo '<h2>Email de confirmação enviado!</h2>';
    echo "<script>beleza();</script>";
	}
else{
    echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
    echo "<script>beleza();</script>";
	}
	}
?>