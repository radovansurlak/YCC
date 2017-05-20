<?php
  require(__DIR__."/vendor/autoload.php");
  require(__DIR__."/php-include/db_init.php");

  //Routing
  $router = new AltoRouter();

  $router->map( 'GET', '/sessions.php/a', function() {
    echo "tesssddt";
  });



  // match current request url
  $match = $router->match();

  // call closure or throw 404 status
  if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
  } else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
  };


  require(__DIR__."/php-include/menu.php");

  ?>
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



    <section id="session-list">
      <h2>pick your favourite music style</h2>
      <div id="choose-genre-container">
        <h5>jazz</h5>
        <h5>jazz</h5>
        <h5>jazz</h5>
        <h5>jazz</h5>
      </div>
    </section>



    <?php
    require(__DIR__."/php-include/footer.php");
    ?>

    </body>
</html>
