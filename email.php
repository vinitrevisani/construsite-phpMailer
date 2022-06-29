<?php 

//importando phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';

$mail = new PHPMailer(true);

if(
    //conferir se tudo foi preenchido
    isset($_POST['nome']) &&
    !empty($_POST['nome']) &&
    isset($_POST['tel']) &&
    !empty($_POST['tel']) &&
    isset($_POST['email']) &&
    !empty($_POST['email']) &&
    isset($_POST['msg']) &&
    !empty($_POST['msg'])
)
{
    //receber o valor do html
    $nome = $_POST['nome'];
    $telefone = $_POST['tel'];
    $email = $_POST['email'];
    $msg =  $_POST['msg'];
    filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);
    filter_var($email, FILTER_SANITIZE_EMAIL);
        //ver se funcionou
        try{

            //configurações
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //debug
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io'; //server teste(colocar host do servidor)
        $mail->SMTPAuth = true;
        $mail->Username = ''; //usuario teste(colocar o email real quando tiver servidor)
        $mail->Password = ''; //senha teste()
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525; //porta do servidos

            //destinatario

        $mail->setFrom('email', 'Teste');
        $mail->addAddress('email', 'Vinicius');

            //conteudo do email

        $mail->isHTML(true);
        $mail->Subject = 'Titulo do Email';
        $mail->Body = "Nome: ".$nome."<br>Email: ".$email."<br>Telefone: ".$telefone."<br>";
        $mail->AltBody ="O usuario acima enviou está mensagem: ".$msg;

        $mail->send();

        echo "Mensagem enviada";
    } 
        //se nao funcionar mostra essa mensagem
    catch(Exception $e) {
        echo "Erro: Email não enviado com sucesso. Error PHPMailer: {$mail->Errorinfo}";
        echo "Erro: Email não enviado com sucesso.";
    }
    echo "<br><br><a href=index.html><button>Voltar</button></a>";

}
else{
    header('location:index.html');
}




?>