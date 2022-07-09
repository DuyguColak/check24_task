<?php
   
  //Include classes 
  include "classes/dbh.class.php";
  include "classes/articles.class.php";
  include "classes/articles-contr.class.php";

  // instantiate new article controller 
  $articlesContr = new ArticlesContr();
  $articles = $articlesContr->listArticles();
  


