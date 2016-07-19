<script>
	function cadastroyes(){
		setTimeout("window.location='index.html'", 2000);
	}
	function cadastrono(){
		setTimeout("window.location='cadastro.html'", 2000);
	}
</script>
<?php
	require "conecta.php";
	require 'PHPMailer/PHPMailerAutoload.php';

	$nome = $_POST['nome'];
	$email= $_POST['email'];
	$senha= $_POST['senha'];
	$cadastra = @mysql_query("INSERT INTO dados(nome, email, senha) VALUES ('$nome','$email','$senha')");
	if ($cadastra==false) {
		echo "<h2>Erro no cadastro</h2>";
		echo "<script>cadastrono()</script>";
	}
	else{
		echo "<h2>Cadastrado com SUCESSO!</h2>";
		echo "<script>cadastroyes()</script>";
	}
	// Instância do objeto PHPMailer
$mail = new PHPMailer;
 
// Configura para envio de e-mails usando SMTP
$mail->isSMTP();
 
// Servidor SMTP
$mail->Host = 'smtp.gmail.com';
 
// Usar autenticação SMTP
$mail->SMTPAuth = true;
 
// Usuário da conta
$mail->Username = 'arthurlds73@gmail.com';
 
// Senha da conta
$mail->Password = 'arml1527ls';
 
// Tipo de encriptação que será usado na conexão SMTP
$mail->SMTPSecure = 'ssl';
 
// Porta do servidor SMTP
$mail->Port = 465;
 
// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);
 
// Email do Remetente
$mail->From = 'arthurlds73@gmail.com';
 
// Nome do Remetente
$mail->FromName = 'Arthur Lima de Souza';
 
// Endereço do e-mail do destinatário
$mail->addAddress($email);
 
// Assunto do e-mail
$mail->Subject = 'Seu cadastro foi efetuado com SUCESSO!';
 
// Mensagem que vai no corpo do e-mail
$mail->Body = '<font color="red"><h1>Cadastro em ZH efetuado com SUCESSO!</h1></font><h3><b>Email: <b>'.$email.'</h3><h3><b>Usuario: </b>'.$usuario.'<h3><b>Senha: </b>'.$senha.'<h3>';
$mail->Body .= '<br> Obrigado por se cadastrar em nosso site.';
$mail->Body .= '<h5>Atenciosamente, Equipe ZH<h5>
<h5>Não responda a este e-mail. Para ver mais informações, visite a Central de Ajuda das Contas ZH.</h5>'; 
// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()){
    echo '<br>E-mail de confirmação enviado!';
	}
else{
    echo '<br>Erro ao enviar Email:' . $mail->ErrorInfo;
	}
?>