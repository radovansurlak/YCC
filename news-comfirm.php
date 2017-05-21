<?php header( "refresh:5;url=/" );
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
        require(__DIR__."/vendor/autoload.php");
        require(__DIR__."/php-include/db_init.php");
        require(__DIR__."/php-include/menu.php");
      ?>

      <section>
        <h2>all done!</h2>
        <h4>you'll get secret link for every live session from now on :)
      </section>

      <?php
      require(__DIR__."/php-include/footer.php");
      ?>



          <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

          <script src="js/main.js"></script>

      </body>
  </html>
