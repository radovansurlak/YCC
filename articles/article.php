<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <?php
          require("./vendor/autoload.php");
          require("./php-include/db_init.php");
          require("./php-include/menu.php");

    

          foreach ($query as $row) {
            $artist = $row['name'];
            $subheadline = $row['headline'];
            $text = $row['text'];
            $videoURL = $row['videoURL'];
          };

        ?>

        <section class="article">
          <h1><?php echo $artist ?></h1>
          <h3><?php echo $subheadline ?></h3>

          <iframe id="ytplayer" type="text/html" width="100%" height="500"
              src="https://www.youtube.com/embed/<?php echo $videoURL?>?autoplay=1&origin=http://example.com"
              frameborder="0">
          </iframe>

          <article><?php echo $text ?></article>
        </section>

        <?php
            require("php-include/footer.php")
        ?>



    </body>
</html>
