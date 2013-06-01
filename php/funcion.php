<?php 
//function correo($nombre, $correo, $mensaje, $asunto) {
//    require 'class.phpmailer.php';
//      include("class.smtp.php");
//    try {
//        $mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
//        $mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
//        $mail->SMTPAuth = true; 
////        $mail->SMTPSecure = "ssl"; 
//       // habilitado SMTP autentificaciÃ³n
////        $mail->Port = 25;                    // puerto del server SMTP
//        
//        $mail->Host = "smtp.gmail.com";
//        $mail->Port = 587;
//        $mail->Username = "hoyenelmundo1@gmail.com";
//        $mail->Password = "dinosaurio1";
//        $mail->From = "hoyenelmundo1@gmail.com";
//        $mail->FromName = "Administrador";
//        $mail->Subject = $asunto;
//        $mail->AltBody = "$mensaje";
//        $mail->MsgHTML($mensaje);
//
//        $mail->AddAddress($correo, $nombre);
//
//
//        $mail->IsHTML(true); // Enviar como HTML
//        $mail->Send(); //Enviar
//    } catch (phpmailerException $e) {
//        echo $e->errorMessage();
//       
//    }
//}
//correo('asdfasd', 'jorgedelportillo@ymail.com', 'puta', 'sdfsdf')


//require_once('class.phpmailer.php');
////include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
//
//$mail             = new PHPMailer();
//
////$body             = file_get_contents('contents.html');
////$body             = eregi_replace("[\]",'',$body);
//
//$mail->IsSMTP(); // telling the class to use SMTP
////$mail->Host       = "mail.yourdomain.com"; // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
//                                           // 1 = errors and messages
//                                           // 2 = messages only
//$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
//$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
//$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
//$mail->Username   = "hoyenelmundo1@gmail.com";  // GMAIL username
//$mail->Password   = "dinosaurio1";            // GMAIL password
//
//$mail->SetFrom('name@yourdomain.com', 'First Last');
//
//$mail->AddReplyTo("name@yourdomain.com","First Last");
//
//$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";
//
//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
//
//$mail->MsgHTML("hola");
//
//$address = "jorgedelportillo@ymail.com";
//$mail->AddAddress($address, "John Doe");
//
////$mail->AddAttachment("images/phpmailer.gif");      // attachment
////$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
//
//if(!$mail->Send()) {
//  echo "Mailer Error: " . $mail->ErrorInfo;
//} else {
//  echo "Message sent!";
//}
//    
//


include("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "hoyenelmundo1@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "dinosaurio1"; // your SMTP password or your gmail password
$from = "hoyenelmundo1@gmail.com"; // Reply to this email
$to="hoyenelmundo1@gmail.com"; // Recipients email ID
$name="hoyenelmundo1@gmail.com"; // Recipient's name
$mail->From = $from;
$mail->FromName = "Webmaster"; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);
$mail->AddReplyTo($from,"Webmaster");
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Sending Email From Php Using Gmail";
$mail->Body = "This Email Send through phpmailer, This is the HTML BODY "; //HTML Body
$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}


?>