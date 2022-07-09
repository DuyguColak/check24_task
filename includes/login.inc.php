<?php

if(isset($_POST['submit']))
{
  // grabbing the data
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  //Instantiate signup controller class
  include "../classes/dbh.class.php";
  include "../classes/login.class.php";
  include "../classes/login-contr.class.php";
  $signup = new LoginContr($username, $password);
  
  // running error handlers and user signup
  $signup->loginUser();
  
  // going to back to front-page
  header("location: ../index.php?error=none");
  
  
}