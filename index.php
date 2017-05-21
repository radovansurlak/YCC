<?php
  require(__DIR__."/vendor/autoload.php");
  require(__DIR__."/php-include/db_init.php");






  $router = new AltoRouter();

  $router->map( 'GET', '/', function() {
    require('home.php');
  });
  $router->map( 'GET', '/sessions', function() {
    global $fpdo;
    global $query;
    $query = $fpdo->from('artist_has_genres')
                    ->innerJoin('artists ON artist_has_genres.artist_ID = artists.ID')
                    ->innerJoin('sessions ON sessions.artist_ID = artists.ID')
                    ->innerJoin('articles ON artists.article_ID = articles.ID')
                    ->where('artist_has_genres.genre_ID',2)
                    ->select('artists.name, sessions.subheadline, articles.URL, articles.image_URL');
    echo "test";
    require('sessions.php');

  });
  $router->map( 'GET', '/[a:id]', function($id) {
    selectCategory($id);
  });








  // match current request url
  $match = $router->match();

  // call closure or throw 404 status
  if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
  } else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
  }
?>
