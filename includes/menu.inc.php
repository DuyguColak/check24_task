<?php

  $menu = "";
  if (!isset($_SESSION['userid']))
  {
    $menu =  '<li><a href="login.php">Login</a></li>';
  }
  if (isset($_SESSION['userid']))
  {
    $menu = $menu .'<li><a href="new_article.php">New Article</a></li>
                    <li><a href="logout.php">Logout</a></li>';                    
  }
  
  echo $menu;