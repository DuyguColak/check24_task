<?php
   
  //Include classes 
  include "classes/dbh.class.php";
  include "classes/articles.class.php";
  include "classes/articles-contr.class.php";
  
  if (!isset ($_GET['page']) ) 
  {  
     $page_number = 1;  
  } 
  else 
  {  
     $page_number = $_GET['page'];  
  }    

  // instantiate new article controller 
  $articlesContr = new ArticlesContr();
  $articles = $articlesContr->listArticles($page_number);
  
  //pagination
  $noArticles = $articlesContr->countArticles();


