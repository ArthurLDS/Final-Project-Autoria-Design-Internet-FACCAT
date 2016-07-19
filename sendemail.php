<script>
	function volta(){
		setTimeout("window.location='contato.html'", 1500);
	}
</script>
<meta charset="UTF-8"/>
<?php
	require 'PHPMailer/PHPMailerAutoload.php';

	$nome = $_POST['nome'];
	$email= $_POST['email'];
	$msg= $_POST['msg'];

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
$mail->FromName = 'Games Stop Contato';
 
// Endereço do e-mail do destinatário
$mail->addAddress('grupoalgames@gmail.com');
 
// Assunto do e-mail
$mail->Subject = 'Cotato site Game Stop';
 
// Mensagem que vai no corpo do e-mail
$mail->Body = '<br><img src="https://www.gamestop.ie/Views/Locale/Content/Images/logo.png" alt="img-gs"><br><font color="red"><h1>'.$nome.' entrou em contato conosco!</h1></font><h3><br>Segue abaixo as informações do usuário... <br><br><b>Email: '.$email.'</b></h3><h3><b>Nome: </b>'.$nome.'<h3><b>Mensagem: </br></b>'.$msg.'<h3>';
$mail->Body .= '<font color="green"><h5>Equipe de Tecnologia da Informação Games Stop<h5></font>
<h5>Esta é uma mensagem automática. Não responda a este e-mail. Para ver mais informações, entre em contato com o setor de TI da gamestop</h5>'; 
// Envia o e-mail e captura o sucesso ou erro
if($mail->Send()){
    echo 'Entraremos em contato em breve...';
    echo "<script>volta();</script>";
	}
else{
    echo 'Erro ao enviar Email:' . $mail->ErrorInfo;
    echo "<script>volta();</script>";
	}
?>