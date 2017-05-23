<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Your Cozy Corner</title>
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
      require("php-include/mobile-menu.php");
      ?>
    <section id="blog">
      <article class="blog-post">
        <img src="img/blog_bg.png" alt="blog thumbnail picture">
        <aside>
          <h3>Sample Blog Post</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <a href="#">read more</a>
        </aside>
      </article>
      <article class="blog-post">
        <img src="img/blog_bg.png" alt="blog thumbnail picture">
        <aside>
          <h3>Sample Blog Post</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <a href="#">read more</a>
        </aside>
      </article>
      <article class="blog-post">
        <img src="img/blog_bg.png" alt="blog thumbnail picture">
        <aside>
          <h3>Sample Blog Post</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <a href="#">read more</a>
        </aside>
      </article>
    </section>
    <?php
      require("php-include/footer.php")
      ?>
  </body>
</html>
