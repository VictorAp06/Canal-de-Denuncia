<?php

  include('envio-email-dados.php');

  $dadosEmail = new Dados();

  //echo $dadosEmail->username;

  session_start();
  $codigo = $_SESSION['cadastrado_sucesso'];
  $data_envio = date('d/m/Y H:i');
  echo $codigo;
  header('Content-Type: text/html; charset=UTF-8');
  // Importar classes PHPMailer para o namespace global 
  // Elas devem estar no topo do seu script, não dentro de uma função 
  use  PHPMailer\PHPMailer\PHPMailer;
  use  PHPMailer\PHPMailer\SMTP;
  use  PHPMailer\PHPMailer\Exception;

  // Carrega o autoloader do Composer 
  require  'vendor/autoload.php' ;
  //Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $dadosEmail->host;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $dadosEmail->username;                  //SMTP username
      $mail->Password   = $dadosEmail->password;                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = $dadosEmail->port;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom($dadosEmail->username, 'Mailer');
      $mail->addAddress($dadosEmail->setEmailAdress, 'Ti');     //Add a recipient
      //$mail->addAddress('ellen@example.com');               //Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      $mail->addCC('');
      //$mail->addBCC('bcc@example.com');

      //Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
      
      //Content

      $mail->setLanguage('pt-BR', 'vendor\phpmailer\phpmailer\language\phpmailer.lang-pt_br.php');
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Informe de DENÚNCIA cadastrada';
      $mail->Body    = " 
        ** Mensagem automática **<br>
        Denúncia de código <b>$codigo</br> cadastrada.<br>
        Favor verificar denúncia através do link:<br>
        Não a necessidade de responder este email.<br>
        Este e-mail foi enviado em <b>$data_envio</b>";
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }