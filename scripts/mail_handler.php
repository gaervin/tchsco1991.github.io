<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $to = "gaervin@gmail.com"; // this is your Email address
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
    $subject = "Phamplet Submission";
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
?>
</body>
</html>
