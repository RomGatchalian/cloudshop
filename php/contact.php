<?php

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.1and1.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'technical.support@151272810036809.info';                     // SMTP username
        $mail->Password   = 'Kam0teQu3!!!';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('noreply@yourcloudshop.com', 'Mailer');
        $mail->addAddress('romgatchalian@gmail.com', 'Joe User');     // Add a recipient

        $content  = "Full Name: "      . $_POST["name"]    . "\r\n";
		$content .= "Store Name: " . $_POST["store_name"]   . "\r\n";
		$content .= "Email: " . $_POST["email"]   . "\r\n";
		$content .= "Mobile Number: " . $_POST["mobile_no"]   . "\r\n";
        $content .= "Message: "     . $_POST["message"]   . "\r\n";
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'YOURCLOUDSHOP Inquiry';
        $mail->Body    =  $content;
    
        $mail->send();
        
        $result = array(
            "sendstatus" => 1
        );

        echo json_encode($result);

    } catch (Exception $e) {
        $result = array(
            "sendstatus" => 0
        );

        echo json_encode($result);
    }

?>