<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

    <?php
      require("php-include/menu.php");
    ?>

    <section id="session-nav">
      <h2>pick your favourite music style</h2>

      <div id="choose-genre-container">
        <?php
          $genres = $fpdo->from('genres')
                          ->select('name');
          foreach ($genres as $genre) {
            echo '<a href="'.$genre['name'].'"><h5>'.$genre['name'].'</h5></a>';
          };
        ?>
        <a href="sessions"><h5>all</h5></a>
      </div>
    </section>

    <section id="session-list">
      <?php
          foreach ($query as $row) {
              echo '<article class="session-bar">';
              echo  '<img src="img/sessions/'.$row['image_URL'].'">';
              echo  '<aside class="description">';
              echo  '<h3>'.$row['name'].'</h3>';
              echo  '<h4>'.$row['subheadline'].'</h3>';
              echo  '<a href="'.$row['URL'].'">read more</a>';
              echo  '</aside>
                    </article>';
          };
      ?>
    </section>


    </main>
  </body>
</html>







    <?php
    require(__DIR__."/php-include/footer.php");
    ?>

    </body>
</html>
