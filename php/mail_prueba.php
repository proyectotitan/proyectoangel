<?php //
    include("../phpmailer/class.phpmailer.php");

    $mail = new PHPMailer(true);
    $mail->IsSMTP(); 
    // Vamos usar SMTP si pusiéramos IsMail() lo mandaría a través de la función mail()
    try {
      $mail->SMTPAuth   = true;                  
    // Habilitamos la autentificación por SMTP
      $mail->SMTPSecure = "ssl";                 
    // Usar SMTP seguro
      $mail->Host       = "Mx1.hostinger.es";      
    // Indicamos el servidor SMTP
      $mail->Port       = 2525;                   
    // Indicamos el puerto del servidor SMTP de Gmail
      $mail->Username   = "hoyenelmundo@r3tr0s.com";  
    // GMAIL uusuario
      $mail->Password   = "dinosaurio1";            
    // GMAIL contraseña
    // $mail->MsgHTML(file_get_contents('../html/index.html')); 
      $mail->MsgHTML("<b>Hola</b>"); 
    // Solicitamos el contenido del fichero y ponemos como contenido HTML del eMail
      $mail->AddReplyTo('osquitarbs@gmail.com', 'Nombre Apellido');
      $mail->AddAddress('osquitarbs@gmail.com', 'Nombre Apellido');
      $mail->SetFrom('osquitarbs@gmail.com', 'Nombre Apellido');
      $mail->Subject = 'Asunto del eMail que enviamos';
      $mail->AltBody = 'Para leer este eMail necesita un cliente compatible'; 
    // Mensaje opcional para los que no tengan clientes de eMail compatibles con HTML
    //  $mail->AddAttachment('images/phpmailer.gif');      
    // Fichero adjunto al correo
      
      $mail->Send();
    // Enviamos el eMail
      echo "Mensaje enviado correctamente";
    } catch (phpmailerException $e) {
      echo $e->errorMessage(); 
    } catch (Exception $e) {
      echo $e->getMessage(); 
    }
?>
