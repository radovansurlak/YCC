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
         ?>

         <section id="contact">
             <h2>contact us</h2>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

             <form method="post">
               <input type="text" name="firstName" placeholder="First Name">
               <input type="email" name="email" placeholder="E-mail">
               <textarea rows="4" cols="50">
                </textarea>
               <input type="submit" value="send"/>
             </form>

         </section>

        <?php
            require("php-include/footer.php")
        ?>



    </body>
</html>