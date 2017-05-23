<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Your Cozy Corner</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="https://unpkg.com/vue"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <!-- Initialize dependencies -->
    <?php
      require("vendor/autoload.php");
      require("php-include/db_init.php");
      require("php-include/menu.php");
      require("php-include/mobile-menu.php");
      ?>
    <!-- Above the fold section with background image -->
    <main>
      <h1>uncover local music gems</h1>
      <p>Your Cozy Corner gathers upcoming local artists and servers them right in front of you.</p>
    </main>
    <!-- Section with a session list -->
    <section id="recent-sessions">
      <h2>recent sessions</h2>
      <?php
        //Feeding data from SQL database
        $query = $fpdo->from('sessions')
                      ->innerJoin('artists ON artists.ID = sessions.artistID')
                      ->innerJoin('articles ON artists.articleID = articles.ID')
                      ->select('artists.name, articles.URL');

        foreach ($query as $row) {
          $artistID = $row["artistID"];
          $genres = $fpdo->from('artist_has_genres AS art_gen')
                        ->innerJoin('genres ON genres.ID = art_gen.genreID')
                        ->select('name')
                        ->where('art_gen.artistID', $artistID);
          //Data output via PHP echo and string interpolation
          echo '<article>';
          echo '<iframe id="ytplayer" height="360"
                src="https://www.youtube.com/embed/'.$row["videoURL"].'?autoplay=0&modestbranding=2&controls=0&showinfo=0">
                </iframe>';
          echo '<aside>';
          echo '<div class="genre-bar-container">';
          foreach ($genres as $genre) {
            echo "<h5>{$genre['name']}</h5>";
          }
          echo '</div>';

          echo "<h3>${row["name"]}</h3>";
          echo "<h4>${row["subheadline"]}</h4>";
          echo '<a href="articles/'.$row['URL'].'">read more</a>';
          echo '</aside>';
          echo '</article>';
        };

        ?>
    </section>
    <!-- Newsletter form section -->
    <section id="newsletter">
      <h2>unlock your access to exclusive live sessions</h2>
      <form method="post" action="/news-comfirm.php">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="email" name="email" placeholder="E-mail address">
        <input type="submit" value="Subscribe"/>
      </form>
    </section>
    <!-- Hardcoded list of blog posts -> Object for further development -->
    <section id="blog-posts">
      <h2>recent blog posts</h2>
      <aside>
        <article>
          <img alt="blog post cover image" src="img/blog_bg.png">
          <h3>Passion is not always enough</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </article>
        <article>
          <img alt="blog post cover image" src="img/blog_bg.png">
          <h3>Passion is not always enough</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </article>
        <article>
          <img alt="blog post cover image" src="img/blog_bg.png">
          <h3>Passion is not always enough</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </article>
      </aside>
    </section>
    <!-- Require footer -->
    <?php
      require(__DIR__."/php-include/footer.php");
      ?>
  </body>
</html>
