<?php

// Author model class
class Authors extends Dbh{

  // read All Authors
  protected function readAuthors(){
    $sql = "SELECT * FROM users WHERE type = 'author'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    return $results;
  }
  
}  