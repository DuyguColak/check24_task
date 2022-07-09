<?php

// Comments Model Class
class Comments extends Dbh{

  // fetch all Comments
  protected function getComments($articleId){
  
    $sql = "SELECT * FROM comments WHERE articleid = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$articleId]);
    
    $results = $stmt->fetchAll();
    return $results;
  }
  
  // add new comment 
  protected function setComment($articleId, $name, $email, $url, $comment){
    $sql = "INSERT INTO comments(articleid, name, email, url, comment) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$articleId, $name, $email, $url, $comment]); 
  }  
  
}  