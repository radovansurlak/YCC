<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>

      <?php
        require("vendor/autoload.php");

        $pdo = new PDO("mysql:host=localhost;dbname=ycc", "root", "root");
        $fpdo = new FluentPDO($pdo);

      ?>

      <nav id="menu">
          <ul>
            <li v-for="menuItem in leftSide">{{menuItem.title}}</li>
            <img src="img/logo.png">
            <li v-for="menuItem in rightSide">{{menuItem.title}}</li>
          </ul>
      </nav>

      <main>

        <script>
            var app = new Vue({
                el: '#menu',
                data: {
                    leftSide: [
                      {
                        title: "home",
                        address: "#"
                      }
                      ,
                      {
                        title: "sessions",
                        address: "#"
                      }
                    ],
                    rightSide: [
                      {
                        title: "blog",
                        address: "#"
                      }
                      ,
                      {
                        title: "contact",
                        address: "#"
                      }
                    ]
                }
            });
        </script>

        <h1>uncover local music gems</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

      </main>

      <section id="recent-sessions">
        <h2>recent sessions</h2>

        <?php
        $query = $fpdo->from('sessions')
                      ->innerJoin('artists ON artists.ID = sessions.artist_ID')
                      ->select('artists.name');



        foreach ($query as $row) {

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
            echo $genre['name'];
          }
          echo '</div>';

          echo "<h3>${row["name"]}</h3>";
          echo "<h4>${row["subheadline"]}</h4>";
          echo '<a href="#">read more</a>';
          echo '</article>';
        };

        ?>



      <article>

        <iframe id="ytplayer" type="text/html" width="50%" height="360"
        src="https://www.youtube.com/embed/M7lc1UVf-VE?autoplay=0&modestbranding=2&controls=0&showinfo=0"
        frameborder="0">
        </iframe>

        <aside>

        <div class="genre-bar-container">
          <h5>jazz</h5>
          <h5>jazz</h5>
          <h5>jazz</h5>
        </div>

        <h3>tanya</h3>
        <h4>Sing with me</h4>

        <a href="#">read more</a>


      </aside>

    </article>

  </section>

  <section id="newsletter">

    <h2>unlock your access to exclusive secret live sessions</h2>

    <form method="post">
      <input type="text" name="firstName" value="First Name">
      <input type="email" name="email" value=" Name">
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







        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

    </body>
</html>
