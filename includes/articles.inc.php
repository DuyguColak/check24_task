<?php

  
  //Instantiate signup controller class
  include "classes/dbh.class.php";
  include "classes/articles.class.php";
  include "classes/articles-contr.class.php";

  $articlesContr = new ArticlesContr();
  $articles = $articlesContr->listArticles();
  


