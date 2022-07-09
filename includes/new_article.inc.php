<?php
session_start();
if(isset($_SESSION['userid']))
{
     
  include "../classes/dbh.class.php";
  include "../classes/articles.class.php";
  include "../classes/articles-contr.class.php";
  
  // instantiate new article controller 
  $articlesContr = new ArticlesContr();
  
  if(isset($_POST['submit']))
  {       
    // grabbing the data
    $authorid     = $_POST['authorid'];
    $articletitle = $_POST['articletitle'];  
    $articletext  = $_POST['articletext'];
    $articleimage = $_POST['articleimage'];

    $articlesContr->addArticle($authorid, $articletitle, $articletext, $articleimage); 
    
    // going to back to front-page
    header("location: ../index.php");
     
  }  
  
}

