<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Your Cozy Corner</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://unpkg.com/vue"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!-- Manually added VueJS menu to avoid URL problems -->
    <nav id="menu">
      <ul>
        <li v-for="menuItem in leftSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
      </ul>
      <img alt="your cozy corner logo" src="../img/logo.png">
      <ul>
        <li v-for="menuItem in rightSide"><a :href="menuItem.address">{{menuItem.title}}</a></li>
      </ul>
    </nav>
    <nav id="menu-mobile">
      <img alt="your cozy corner logo" src="../img/logo.png">
      <ul>
        <li v-for="menuItem in links"><a :href="menuItem.address">{{menuItem.title}}</a></li>
      </ul>
    </nav>
    <script>
      var app = new Vue({
          el: '#menu-mobile',
          data: {
              //Menu items stored as JS objects
              links: [
                {
                  title: "home",
                  address: "/"
                }
                ,
                {
                  title: "sessions",
                  address: "sessions"
                },
                {
                  title: "blog",
                  address: "/blog"
                },
                {
                  title: "contact",
                  address: "/contact"
                }
              ]
          }
      });
      var app = new Vue({
        el: '#menu',
        data: {
            //Menu items stored as JS objects
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
      //Initialize DB and dependencies
      require("vendor/autoload.php");
      require("php-include/db_init.php");
      //Source data from database
      foreach ($query as $row) {
        $artist = $row['name'];
        $subheadline = $row['headline'];
        $text = $row['text'];
        $videoURL = $row['videoURL'];
      };

      ?>
    <!-- Article body -->
    <section class="article">
      <h1><?php echo $artist ?></h1>
      <h3><?php echo $subheadline ?></h3>
      <!-- Youtube embed -->
      <iframe id="ytplayer" height="500"
        src="https://www.youtube.com/embed/<?php echo $videoURL?>?autoplay=0&controls=1&modestbranding=1">
      </iframe>
      <article><?php echo $text ?></article>
    </section>
    <!-- Require footer -->
    <?php
      require("php-include/footer.php")
      ?>
  </body>
</html>
