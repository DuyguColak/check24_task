<?php

class Dbh {
  
  protected function connect(){
    try{
      $username = "check24";
      $pwd = "2B8o.L7qjIQQ270b";
      $pdo = new PDO('mysql:host=localhost;dbname=check24', $username, $pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
    }catch (PDOException $e){
      print "Error!:" . $e->getMessage() ."<br>";
      die();
    }
  }
  
}