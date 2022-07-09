<?php

if(isset($_SESSION['userid']))
{
     
  //Instantiate signup controller class
  include "classes/dbh.class.php";
  include "classes/authors.class.php";
  include "classes/authors-contr.class.php";

  $authorsContr = new AuthorsContr();
  $authors = $authorsContr->getAuthors();
  
}

