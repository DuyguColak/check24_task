<?php

// Articles Model Class
class Articles extends Dbh{

  // fetch all articles
  protected function getArticles(){
    // fecth all data from articles, article author, number of comments for the article
    $sql = "SELECT  ar.*
                  , CONCAT(u.firstname, ' ', u.lastname) AS name
                  ,(SELECT count(*) FROM comments c WHERE c.articleid = ar.articleid) AS noc
     FROM articles ar, users u WHERE ar.authorid = u.userid";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    return $results;
  }
  
  // add new article to the article table
  protected function setArticle($authorid, $articletitle, $articletext, $articleimage){
    $sql = "INSERT INTO articles(authorid, articledate, articletitle, articletext, articleimage) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$authorid, date("Y-m-d"),$articletitle, $articletext, $articleimage]); 
  }
  

  
}  