<?php
//Start up PHP session so we can output "Message sent successfully" later on
session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Your Cozy Corner</title>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="https://unpkg.com/vue"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- Initialize dependencies -->
        <?php
          require("./vendor/autoload.php");
          require("./php-include/db_init.php");
          require("./php-include/menu.php");
          require("php-include/mobile-menu.php");
         ?>

         <section id="contact">
             <h2>contact us</h2>
             <p>
             <?php
                 //Display success message if e-mail was already sent
                 if(!empty($_SESSION['sent'])) {
                     echo "Message sent successfully :)";
                 } else {
                     echo "We'll be happy to hear from you, whether you'd like to perform an YCC session
                      or ask us anything, give us a message :)";
                 };
                 //Unset PHP session variable
                 unset($_SESSION['sent']);
             ?>
             </p>

             <!-- Email form -->

             <form method="post" action="email.php">
               <input type="text" name="firstName" placeholder="First Name">
               <input type="email" name="email" placeholder="E-mail">
               <textarea name="message" rows="4" cols="50">Type your message here :)
                </textarea>
               <input type="submit" value="send"/>
             </form>

         </section>

        <!-- Require footer -->

        <?php
            require("php-include/footer.php")
        ?>

    </body>
</html>
