<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'vendor/autoload.php';

    /**
     * 
     */
    class Send extends CI_Controller
    {
    	
    	function __construct()
    	{
    		parent::__construct();
    	}


    	function index(){

    		    $mail = new PHPMailer(true);
 
    // $no_invoice         = $_POST['no_invoice'];
    // $nama_pengirim      = $_POST['nama_pengirim'];
    // $email              = $_POST['email'];
 
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'aldiiit593@gmail.com';                     // SMTP username
    $mail->Password   = 'aldimantap1234';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
    //Recipients
    $mail->setFrom('aldiiit593@gmail.com', 'Percobaan');
    $mail->addAddress('alldii1956@gmail.com', 'Hay');     // Add a recipient
   
    $mail->addReplyTo('aldiiit593@gmail.com', 'Percobaan');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Konfirmasi Pembayaran dari Localhost';
    $mail->Body    = '<h1>Halo, Admin.</h1>';    
 
    if($mail->send())
    {
        echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    	}


    }

 ?>