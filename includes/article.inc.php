<?php
   
  //Include classes 
  include "classes/dbh.class.php";
  include "classes/articles.class.php";
  include "classes/articles-contr.class.php";  
  include "classes/comments.class.php";
  include "classes/comments-contr.class.php";
  
  $articleId = $_GET["id"];
  // instantiate article controller 
  $articlesContr = new ArticlesContr();
  $article = $articlesContr->readArticle($articleId);
  
  // instaniate comments controller
  $commentsContr = new CommentsContr();
  $comments = $commentsContr->readComments($articleId);
  
  


