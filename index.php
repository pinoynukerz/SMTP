<?php 
//SMTP MAIL
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
if(isset($_POST['submit'])){
   
    $name    = $_POST['fullname'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    
    echo '<div style="margin-top:45px margin-left:40px;margin-right:auto;">';
    //    echo $_POST['fullname'].''.$_POST['email'].''.$_POST['subject'].''.$_POST['message'];
    
    //email
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'email-smtp.us-east-1.amazonaws.com' //AWS ses 
    $mail->Port = 465;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'AKIAVFEKWWJKOCX3NVOC';
    $mail->Password = 'BNHBX65+DorQDmmi9T95DCei5oH6KM6M1umgyt4Pht4i';
    $mail->setFrom('jmattz23@hotmail.com','Info');
    $mail->addAddress($email,$name);
    //$mail->addCC('email id','name')
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    $mail->AltBody = 'HTML does not Support';
//    $mail->addAttachment('image.jpg');
  
    if(!$mail->send()){
        echo "Error".$mail->ErrorInfo;
    
    }else{
        echo "Mail Sent";
    }
    
    echo '</div>';
}


?>

<html>
    <head><title>SMTP </title>
</head>

<div style="width:50%; margin-top:45px; margin-left:40px; margin-right:auto;">
<form action="" method="POST">
    <p>name: <input type="text" name="fullname" /> </p>
    <p>email: <input type="email" name="email" /> </p>
    <p>subject: <input type="subject" name="subject" /> </p>
    <p>message <textarea name="message"></textarea></p>
    <input type="submit" name="submit" />
</form>
</div>

