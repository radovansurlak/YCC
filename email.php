<?php
    //Function to help sanitize data

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    };

    require(__DIR__."/vendor/autoload.php");
    require(__DIR__."/php-include/db_init.php");

    //Initialize variables

    $firstName = $email = $message = "";

    //Sanitizing sequence

    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $firstName = test_input($firstName);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $email = test_input($email);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    //Setting up variables for mail function

    $to      = 'ioana@yourcozycorner.com';
    $subject = "${firstName} sent you a message";
    $headers = 'From: webmaster@yourcozycorner.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    //Start PHP session, that will enable to transfer a message to contact.php

    session_start();
    $_SESSION['sent'] = "true";

    //Execute PHP e-mail function

    mail($to, $subject, $message, $headers);

    header("Location: contact.php");
?>
