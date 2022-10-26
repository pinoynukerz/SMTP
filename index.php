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
 // echo $_POST['fullname'].''.$_POST['email'].''.$_POST['subject'].''.$_POST['message'];
    
 //use PHPMailer\PHPMailer\PHPMailer;
 //use PHPMailer\PHPMailer\Exception;
 
 // If necessary, modify the path in the require statement below to refer to the
 // location of your Composer autoload.php file.
 require 'vendor/autoload.php';
 
 // Replace sender@example.com with your "From" address.
 // This address must be verified with Amazon SES.
 $sender = 'jmattz23@hotmail.com';
 $senderName = 'Sender Name';
 
 // Replace recipient@example.com with a "To" address. If your account
 // is still in the sandbox, this address must be verified.
 $recipient = 'jmattz23@hotmail.com';
 
 // Replace smtp_username with your Amazon SES SMTP user name.
 $usernameSmtp = getenv('AKIAVFEKWWJKOCX3NVOC');
 
 // Replace smtp_password with your Amazon SES SMTP password.
 $passwordSmtp = getenv('BNHBX65+DorQDmmi9T95DCei5oH6KM6M1umgyt4Pht4i');
 
 // Specify a configuration set. If you do not want to use a configuration
 // set, comment or remove the next line.
 //$configurationSet = 'ConfigSet';
 
 // If you're using Amazon SES in a region other than US West (Oregon),
 // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
 // endpoint in the appropriate region.
 $host = 'email-smtp.us-east-1.amazonaws.com';
 $port = 587;
 
 // The subject line of the email
 $subject = 'Subject Here';
 
 // The plain-text body of the email
 $bodyText =  "AWS RDS Staging Password Reset. Your AWS RDS Staging password has been reset. See attached file for your password.";
 
 // The HTML-formatted body of the email
 $bodyHtml = 'Hi,<br /><br />
     <p>Your AWS RDS Staging password has been reset. See attached file for your new password.</p>';
 
 $mail = new PHPMailer(true);
 
 try {
     // Specify the SMTP settings.
     $mail->isSMTP();
     $mail->setFrom($sender, $senderName);
     $mail->Username   = $usernameSmtp;
     $mail->Password   = $passwordSmtp;
     $mail->Host       = $host;
     $mail->Port       = $port;
     $mail->SMTPAuth   = true;
     $mail->SMTPSecure = 'tls';
     //$mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
 
     // Specify the message recipients.
     $mail->addAddress($recipient);
     // You can also add CC, BCC, and additional To recipients here.
 
     // Specify the content of the message.
     $mail->isHTML(true);
     $mail->Subject    = $subject;
     $mail->Body       = $bodyHtml;
     $mail->AltBody    = $bodyText;
   //  $mail->addAttachment("pass.txt.gpg", 'pass.txt.gpg');
     $mail->Send();
     echo "Email sent!" , PHP_EOL;
 } catch (phpmailerException $e) {
     echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
 } catch (Exception $e) {
     echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
 }




    //email
    // $mail = new PHPMailer;
    // $mail->isSMTP();
    // $mail->SMTPDebug = 0;
    // $mail->Host = 'email-smtp.us-east-1.amazonaws.com' //AWS ses 
    // $mail->Port = 465;
    // $mail->SMTPSecure = 'tls';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'AKIAVFEKWWJKOCX3NVOC';
    // $mail->Password = 'BNHBX65+DorQDmmi9T95DCei5oH6KM6M1umgyt4Pht4i';
    // $mail->setFrom('jmattz23@hotmail.com','Info');
    // $mail->addAddress($email,$name);
    // $mail->addCC('email id','name')
    // $mail->Subject = $subject;
    // $mail->msgHTML($message);
    // $mail->AltBody = 'HTML does not Support';
    // $mail->addAttachment('image.jpg');
  
    // if(!$mail->send()){
    //     echo "Error".$mail->ErrorInfo;
    
    // }else{
    //     echo "Mail Sent";
    // }
    
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

