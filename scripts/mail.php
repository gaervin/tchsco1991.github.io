<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

/* New aliases. */
use PHPMailer\PHPMailer\OAuth;
/* use League\OAuth2\Client\Provider\Google; */

/* dirname("https://github.com/gaervin/tchsco1991.github.io"); */
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

/**
 * Example PHPMailer callback function.
 * This is a global function, but you can also pass a closure (or any other callable)
 * to the `action_function` property.
 *
 * @param bool   $result  result of the send action
 * @param array  $to      email address of the recipient
 * @param array  $cc      cc email addresses
 * @param array  $bcc     bcc email addresses
 * @param string $subject the subject
 * @param string $body    the email body
 */

function callbackAction($result, $to, $cc, $bcc, $subject, $body)
{
    echo "Message subject: \"$subject\"\n";
    foreach ($to as $address) {
        echo "Message to {$address[1]} <{$address[0]}>\n";
    }
    foreach ($cc as $address) {
        echo "Message CC to {$address[1]} <{$address[0]}>\n";
    }
    foreach ($bcc as $toaddress) {
        echo "Message BCC to {$toaddress[1]} <{$toaddress[0]}>\n";
    }
    if ($result) {
        echo "Message sent successfully\n";
    } else {
        echo "Message send failed\n";
    }
}

require_once '..\vendor\autoload.php';


/* Set the script time zone to UTC. */
date_default_timezone_set('Etc/UTC');

/* Information from the XOAUTH2 configuration. */
$google_email = 'gaervin@centurylink.net';
//$oauth2_clientId = '842406980449-q8gfv99qur1ndkit04isa6pu7fpg225n.apps.googleusercontent.com';
//$oauth2_clientSecret = 'hXq1RTkcW2tYf3Kj-1Nc8tf6';
//$oauth2_refreshToken = 'RefreshToken';
$pass = 'K1ll3r90';

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
//$mail = new PHPMailer(TRUE);

/* Open the try/catch block. */

  /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
  $mail = new PHPMailer();
  /* SMTP parameters. */
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   /* SMTP server address. */
   $mail->Host = 'smtp.centurylink.net';
   /* Use SMTP authentication. */
   $mail->SMTPAuth = true;
   /* Set the encryption system. */
   //$mail->SMTPSecure = 'tls';
   //$mail->SMTPSecure = 'ssl';
   /* SMTP authentication username. */
   $mail->Username = $google_email;
   /* SMTP authentication password. */
   $mail->Password = $pass;
   /* Set the SMTP port. */
   $mail->Port = 587;
   /* Enable SMTP debugging */
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
   $mail->SMTPDebug = 3;
   /* Set the mail sender. */
   $mail->setFrom('gaervin@centurylink.net', 'TCHSco1991 Admin');
   /* Add Reply-To */
   // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
   /* Add a recipient. */
   //$mail->addAddress('gaervin@gmail.com', 'GMAIL');
   $mail->addAddress('gaervin@gmail.com', 'GMAIL');
   /* Add CC and BCC */
   $mail->addCC('gaervin@centurylink.net', 'CenturyLink');
   $mail->addBCC('gary.ervin@mfgs.carahsoft.com', 'Carahsoft');

   /* Set the subject. */
   $mail->Subject = 'Test Email via SMTP using PHPMailer';
   /* Set the mail message body. */
   //$mail->Body = 'There is a great disturbance in the Force.';
   $mail->isHTML(TRUE);
   $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email I am sending using SMTP mail server with PHPMailer.</p>";
   // $mail->Body = '<html>There is a great disturbance in the <strong>Force</strong>.</html>';
   $mail->Body = $mailContent;
   $mail->AltBody = 'There is a great disturbance in the Force.';

   /* Add Attachments (Multiple Attachments - Just Repeat) */
   // $mail->addAttachment('path/to/file', 'Name of file');
   // $mail->addAttachment('path/to/file', 'Name of file');
   // $mail->addAttachment('path/to/file', 'Name of file');

   /* Add an attachment from the string */
   // $mysql_data = $mysql_row['blob_data'];
   // $mail->addStringAttachment($mysql_data, 'db_data.db');
   // $mail->addStringAttachment(file_get_contents($url), 'myfile.pdf');

   /* To embed an image */
   // $mail->addEmbeddedImage('path/to/image_file.jpg', 'image_cid');
   // $mail->isHTML(true);
   // $mail->Body = '<img src="cid:image_cid">';

   /* Action Function */
   //$mail->action_function = 'callbackAction';

   /* Finally send the mail. */
    if($mail->send()){
        echo 'Message has been sent';
    }else{
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

if(isset($_POST['submit'])){
    $to = "gaervin@centurylink.net"; // this is your Email address
    $from = $_POST['bus_email']; // this is the sender's Email address
    $bus_name = $_POST['bus_name'];
    $bus_owner = $_POST['bus_owner'];
    $bus_street = $_POST['bus_street'];
    $bus_suite = $_POST['bus_suite'];
    $bus_city = $_POST['bus_city'];
    $bus_state = $_POST['bus_state'];
    $bus_phone = $_POST['bus_phone'];
    $full_page = $_POST['full_page'];
    $half_page = $_POST['half_page'];
    $quar_page = $_POST['quar_page'];
    $all_info = $bus_name . "\n\n" . $bus_owner . "\n\n" . $bus_street . "\n\n" . $bus_suite . "\n\n" . $bus_city . "\n\n" . $bus_state . "\n\n" . $bus_phone . "\n\n";
    $page_size = $full_page . "\n\n" . $half_page . "\n\n" . $quar_page . "\n\n";
    $subject = "Pamphlet Submission";
    $subject2 = "Copy of your form submission";
    $message = $bus_owner . " from " . $bus_name . " submitted and Advertisement or Acknowledgement:" . "\n\n" . $all_info . "\n\n" . $page_size . "\n\n" . $_POST['message'];
    $message2 = $bus_owner . "Here is a copy of your message " . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
//catch (Exception $e)
//{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
//   echo $e->getMessage();
//}

//Alternative approach using a closure
//try {
//    $mail->action_function = static function ($result, $to, $cc, $bcc, $subject, $body) {
//        if ($result) {
//            echo "Message sent successfully\n";
//        } else {
//            echo "Message send failed\n";
//        }
//    };

//if(isset($_POST['submit'])){
//    $to = "gaervin@gmail.com"; // this is your Email address
//    $from = $_POST['bus_email']; // this is the sender's Email address
//    $bus_name = $_POST['bus_name'];
//    $bus_owner = $_POST['bus_owner'];
//    $bus_street = $_POST['bus_street'];
//    $bus_suite = $_POST['bus_suite'];
//    $bus_city = $_POST['bus_city'];
//    $bus_state = $_POST['bus_state'];
//    $bus_phone = $_POST['bus_phone'];
//    $full_page = $_POST['full_page'];
//    $half_page = $_POST['half_page'];
//    $quar_page = $_POST['quar_page'];
//    $all_info = $bus_name . "\n\n" . $bus_owner . "\n\n" . $bus_street . "\n\n" . $bus_suite . "\n\n" . $bus_city . "\n\n" . $bus_state . "\n\n" . $bus_phone . "\n\n";
//    $page_size = $full_page . "\n\n" . $half_page . "\n\n" . $quar_page . "\n\n";
//    $subject = "Phamplet Submission";
//    $subject2 = "Copy of your form submission";
//    $message = $bus_owner . " from " . $bus_name . " submitted and Advertisement or Acknowledgement:" . "\n\n" . $all_info . "\n\n" . $page_size . "\n\n" . $_POST['message'];
//    $message2 = $bus_owner . "Here is a copy of your message " . "\n\n" . $_POST['message'];

//    $headers = "From:" . $from;
//    $headers2 = "From:" . $to;
//    mail($to,$subject,$message,$headers);
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
//    }

//    function test_input($data) {
//      $data = trim($data);
//      $data = stripslashes($data);
//      $data = htmlspecialchars($data);
//      return $data;
//    }

?>
</body>
</html>
