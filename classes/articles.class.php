<?php

class Articles extends Dbh{

  protected function getArticles(){
    $sql = "SELECT  ar.*
                  , CONCAT(u.firstname, ' ', u.lastname) AS name
                  ,(SELECT count(*) FROM comments c WHERE c.articleid = ar.articleid) AS noc
     FROM articles ar, users u WHERE ar.authorid = u.userid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    return $results;
  }
  
  protected function setArticle($authorid, $articledate, $articletitle, $articletext, $articleimage){
    $sql = "INSERT INTO articles(authorid, articledate, articletitle, articletext, articleimage) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$authorid, $articledate, $articletitle, $articletext, $articleimage]); 
  }
  

  
}  