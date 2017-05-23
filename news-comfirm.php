<?php
  //Redirect after 4s to homepage

  header( "refresh:4;url=/" );

  //Security measure against hijacking through GET method

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Function to help sanitize data -

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    };

    require(__DIR__."/vendor/autoload.php");
    require(__DIR__."/php-include/db_init.php");

    //Initialize variables

    $firstName = $email = "";

    //Sanitizing sequence

    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $firstName = test_input($firstName);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $email = test_input($email);

    //End of sanitization

    $values = array('firstName' => $firstName, 'email' => $email);
    $query = $fpdo->insertInto('newsletter')->values($values)->execute();
  };
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Your Cozy Corner</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://unpkg.com/vue"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <section id="newsletter">
      <h2>all done!</h2>
      <h4>
      You'll get secret link for every live session from now on :)
    </section>
  </body>
</html>
