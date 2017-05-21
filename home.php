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

      <main>

        <h1>uncover local music gems</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

      </main>

      <section id="recent-sessions">
        <h2>recent sessions</h2>

        <?php




        $query = $fpdo->from('sessions')
                      ->innerJoin('artists ON artists.ID = sessions.artist_ID')
                      ->innerJoin('articles ON artists.article_ID = articles.ID')
                      ->select('artists.name, articles.URL');

        foreach ($query as $row) {
          var_dump($row);
        }

        foreach ($query as $row) {
          $artist_ID = $row["artist_ID"];
          $genres = $fpdo->from('artist_has_genres AS art_gen')
                        ->innerJoin('genres ON genres.ID = art_gen.genre_ID')
                        ->select('name')
                        ->where('art_gen.artist_ID', $artist_ID);

          echo '<article>';
          echo '<iframe id="ytplayer" type="text/html" width="50%" height="360"
                src="https://www.youtube.com/embed/'.$row["videoURL"].'?autoplay=0&modestbranding=2&controls=0&showinfo=0"
                frameborder="0">
                </iframe>';
          echo '<aside>';
          echo '<div class="genre-bar-container">';
          foreach ($genres as $genre) {
            echo "<h5>{$genre['name']}</h5>";
          }
          echo '</div>';

          echo "<h3>${row["name"]}</h3>";
          echo "<h4>${row["subheadline"]}</h4>";
          echo '<a href="#">read more</a>';
          echo '</article>';
        };

        ?>

  </section>

  <section id="newsletter">

    <h2>unlock your access to exclusive live sessions</h2>

    <form method="post" action="/news-comfirm.php">

      <input type="text" name="firstName" placeholder="First Name">
      <input type="email" name="email" placeholder="E-mail">
      <input type="submit" value="Submit"/>

    </form>

  </section>

  <section id="blog-posts">

    <h2>recent blog posts</h2>

    <aside>

      <article>
        <img src="img/blog_bg.png">
        <h3>Passion is not always enough</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </article>

      <article>
        <img src="img/blog_bg.png">
        <h3>Passion is not always enough</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </article>

      <article>
        <img src="img/blog_bg.png">
        <h3>Passion is not always enough</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </article>

    </aside>



  </section>

  <?php
    require(__DIR__."/php-include/footer.php");
  ?>



        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

    </body>
</html>
