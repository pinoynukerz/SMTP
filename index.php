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
    $messagepost = $_POST['message'];
     
    $message = "<div style=\"text-align:center;background-color:#00335a;padding:16px 0\"><div class=\"adM\">
    </div><img src=\"https://www.audiophile.ph/catalog/view/theme/audiophile/image/audiophile.svg\" alt=\"logo\" class=\"CToWUd\">
</div><div style=\"background-color:#f6f6f6;padding:30px\"><div style=\"margin:0 auto;width:620px;background-color:#fff;border:1px solid #eee;padding:30px\">
    <table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" style=\"border-collapse:collapse;font-size:12px;font-family:verdana;\" border=\"1\" bordercolor=\"#CCCCC\">
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Date</td><td >$datetoday</td></tr>
    <tr><td width=\"150\" bgcolor=\"#f4f4f4\" align=\"right\">Name</td><td width=\"450\"> $full_name </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Email</td><td > $from </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">Telephone</td><td >$phone </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" align=\"right\">IP Address</td><td > $ip_address </td></tr>
    <tr><td bgcolor=\"#f4f4f4\" colspan=\"2\"><FONT SIZE=\"+1\" >Message was Sent via Contact us page</FONT></td></tr>
    <tr><td bgcolor=\"#f4f4f4\" valign=\"top\" align=\"right\" height=\"150\">Message</td><td valign=\"top\" > $messagepost</td></tr>
    </table></div></div><div style=\"padding-top:30px;text-align:center;padding-bottom:30px;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif\">
    <div style=\"width:640px;background-color:#ffffff;margin:0 auto\">
    <p style=\"margin:0 0 10px\">Copyright © 2022 , All rights reserved.</p>
    <p style=\"margin:0 0 10px\">You are receiving this email because you are subscribed to <a style=\"color:#00aeef;text-decoration:none\" href=\"http://condo.com.ph\" target=\"_blank\">Condo.Com.Ph</a></p>
    <div class=\"yj6qo\"></div></div><div class=\"adL\"></div></div>"; 
     

    $sender = 'jmattz23@hotmail.com';
    $senderName = $name;
    $recipient = 'alfred.mattz@gmail.com';
    $usernameSmtp = 'AKIAVFEKWWJKDDLUBNRU'; 
    $passwordSmtp = 'BEWEfDgnPyD6GB9nh85C0QMPsxIg1ykA8uMpGgtUdGsz';
    $host = 'email-smtp.us-east-1.amazonaws.com';
    $port = 465;
     
    $subject  = $email;
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
