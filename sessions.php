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
      <!-- Require Menus -->
      <?php
      require("php-include/menu.php");
      require("php-include/mobile-menu.php");
      ?>
      <!-- Sessions navigation elements -->
    <section id="session-nav">
      <h2>Pick your favourite music style</h2>
      <div id="choose-genre-container">
        <?php
          $genres = $fpdo->from('genres')
                          ->select('name');
          foreach ($genres as $genre) {
            echo '<a href="'.$genre['name'].'"><h5>'.$genre['name'].'</h5></a>';
          };
          ?>
        <a>
          <h5>all</h5>
        </a>
      </div>
    </section>
    <!-- Sessions browser screen -->
    <section id="session-list">
      <?php
        foreach ($query as $row) {
            echo '<article class="session-bar">';
            echo  '<img alt="session cover image" src="img/sessions/'.$row['imageURL'].'">';
            echo  '<aside class="description">';
            echo  '<h3>'.$row['name'].'</h3>';
            echo  '<h4>'.$row['subheadline'].'</h4>';
            echo  '<a href="articles/'.$row['URL'].'">read more</a>';
            echo  '</aside>
                  </article>';
        };
        ?>
    </section>
    <!-- Require footer -->
    <?php
      require(__DIR__."/php-include/footer.php");
      ?>
  </body>
</html>
