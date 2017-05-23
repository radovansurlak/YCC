<?php
  require("vendor/autoload.php");
  require("php-include/db_init.php");

  $router = new AltoRouter();

  $router->map( 'GET', '/', function() {
    require('home.php');
  });

  $router->map( 'GET', '/blog', function() {
    require('blog.php');
  });

  $router->map( 'GET', '/contact', function() {
    require('contact.php');
  });


  $router->map( 'POST', '/news-comfirm.php', function() {
    header('Location: news-comfirm.php');
  });
  $router->map( 'GET', '/sessions', function() {
    global $fpdo;
    global $query;
    $query = $fpdo->from('sessions')
                    ->innerJoin('artists ON sessions.artistID = artists.ID')
                    ->innerJoin('sessions ON sessions.artistID = artists.ID')
                    ->innerJoin('articles ON artists.articleID = articles.ID')
                    ->select('artists.name, sessions.subheadline, articles.URL, articles.imageURL');
    require('sessions.php');
  });

  $router->map( 'GET', '/articles/[a:link]', function($link) {
    global $fpdo;
    global $query;
    $query = $fpdo->from('artists')
          ->innerJoin('articles ON artists.articleID = articles.ID')
          ->innerJoin('sessions ON sessions.articleID = articles.ID')
          ->select('name, text, videoURL, headline')
          ->where('articles.URL',$link);
    require('articles/article.php');
  });

  $router->map( 'GET', '/[a:id]', function($id) {
    function prepareData ($genre) {
      global $fpdo;
      global $query;
      $query = $fpdo->from('artist_has_genres')
                      ->innerJoin('artists ON artist_has_genres.artistID = artists.ID')
                      ->innerJoin('sessions ON sessions.artistID = artists.ID')
                      ->innerJoin('articles ON artists.articleID = articles.ID')
                      ->where('artist_has_genres.genreID',$genre)
                      ->select('artists.name, sessions.subheadline, articles.URL, articles.ID, articles.imageURL');
      require('sessions.php');
    };
    switch ($id) {
    case 'pop':
        prepareData(1);
        break;
    case 'rock':
        prepareData(2);
        break;
    case 'blues':
        prepareData(3);
        break;
    case 'jazz':
        prepareData(4);
        break;
    case 'soul':
        prepareData(5);
        break;
    };
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
