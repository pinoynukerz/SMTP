<?php 
//SMTP MAIL
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
 if(isset($_POST['submit'])){

    echo '<div style="margin-top:45px margin-left:40px;margin-right:auto;">';

    echo $_POST['fullname'].''.$_POST['email'].''.$_POST['subject'].''.$_POST['message'];
    
   echo '</div>';
   
    $name    = $_POST['fullname'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sender = 'jmattz23@hotmail.com';
    $senderName = "$name";
    $recipient = 'alfred.mattz@gmail.com';
    $usernameSmtp = 'AKIAVFEKWWJKDDLUBNRU'; 
    $passwordSmtp = 'BEWEfDgnPyD6GB9nh85C0QMPsxIg1ykA8uMpGgtUdGsz';
    $host = 'email-smtp.us-east-1.amazonaws.com';
    $port = 465;
     
    $subject  = 'Inquiry: by'"$email";
    $bodyText = $subject;
    $bodyHtml = $message;
     
     
    $mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP(true);
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'ssl';
    
    $mail->addAddress($recipient);
    
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
    $mail->AltBody    = $bodyText;
    
    $mail->Send();
    
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}
     
    

 }
?>

<html>
    <head><title>SMTP </title>
</head>

<div style="width:50%; margin-top:45px; margin-left:40px; margin-right:auto;">
    
<h2>Contact Us</h2>
<form action="" method="POST">
    <p>name:    <input type="text" name="fullname" /> </p>
    <p>email:   <input type="email" name="email" /> </p>
    <p>subject: <input type="subject" name="subject" /> </p>
    <p>message  <textarea name="message"></textarea></p>
                <input type="submit" name="submit" />
</form>
    
</div>
