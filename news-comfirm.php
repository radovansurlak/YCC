<?php
  header( "refresh:5;url=/" );
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    };

    require(__DIR__."/vendor/autoload.php");
    require(__DIR__."/php-include/db_init.php");

    $firstName = $email = "";

    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $firstName = test_input($firstName);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $email = test_input($email);
    $values = array('firstName' => $firstName, 'email' => $email);
    $query = $fpdo->insertInto('newsletter')->values($values)->execute();
  };
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
        <link rel="stylesheet" href="css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

      <?php
        require(__DIR__."/php-include/menu.php");
      ?>

      <section id="newsletter">
        <h2>all done!</h2>
        <h4>You'll get secret link for every live session from now on :)
      </section>


          <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

          <script src="js/main.js"></script>

      </body>
  </html>
