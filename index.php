<?php

  //Routing Setup

  require("vendor/autoload.php");
  require("php-include/db_init.php");

  $router = new AltoRouter();

  //Mapping of Routes

  $router->map( 'GET', '/', function() {
    require('home.php');
  });

  //Blog page mapping

  $router->map( 'GET', '/blog', function() {
    require('blog.php');
  });

  //Contact page mapping

  $router->map( 'GET', '/contact', function() {
    require('contact.php');
  });

  //Newsletter subscription mapping

  $router->map( 'POST', '/news-comfirm.php', function() {
    header('Location: news-comfirm.php');
  });

  //Sessions page mapping

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

  //Select articles based on URL

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

  //Select sessions based on genre - Routing logic

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

    //Identify and assign genre

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
