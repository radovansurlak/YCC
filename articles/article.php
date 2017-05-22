<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="../css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <nav id="menu">
            <ul>
              <li v-for="menuItem in leftSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
              <img src="../img/logo.png">
              <li v-for="menuItem in rightSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
            </ul>
        </nav>
        <script>
          var app = new Vue({
              el: '#menu',
              data: {
                  leftSide: [
                    {
                      title: "home",
                      address: "../"
                    }
                    ,
                    {
                      title: "sessions",
                      address: "../sessions"
                    }
                  ],
                  rightSide: [
                    {
                      title: "blog",
                      address: "../blog.php"
                    }
                    ,
                    {
                      title: "contact",
                      address: "../contact.php"
                    }
                  ]
              }
          });
        </script>

        <?php
          require("vendor/autoload.php");
          require("php-include/db_init.php");


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
              src="https://www.youtube.com/embed/<?php echo $videoURL?>?autoplay=0&controls=1&modestbranding=1"
              frameborder="0">
          </iframe>

          <article><?php echo $text ?></article>
        </section>

        <?php
            require("php-include/footer.php")
        ?>



    </body>
</html>
