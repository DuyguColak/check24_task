<?php

  session_start();
  $menu = "";
  if (!isset($_SESSION['userid']))
  {
    $menu =  '<li><a href="login.php">Login</a></li>';
  }
  if (isset($_SESSION['userid']))
  {
    $menu = $menu .'<li><a href="articles.php">Articles</a></li>
                    <li><a href="logout.php">Logout</a></li>';                    
  }
  
  echo $menu;