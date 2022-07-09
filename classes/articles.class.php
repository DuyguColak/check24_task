<?php

// Articles Model Class
class Articles extends Dbh{

  // fetch all articles
  protected function getArticles($page_number){
    // fecth all data from articles, article author, number of comments for the article
    $limit = 3;
    $initial_page = ($page_number-1) * $limit;   
    $sql = "SELECT  ar.*
                  , CONCAT(u.firstname, ' ', u.lastname) AS name
                  ,(SELECT count(*) FROM comments c WHERE c.articleid = ar.articleid) AS noc
     FROM articles ar, users u WHERE ar.authorid = u.userid
     ORDER BY ar.articledate
     LIMIT $initial_page, $limit
     ";
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
  
  // get number of articles for pagination
  protected function getNOArticles(){  
    $sql = "SELECT  count(*) AS noArticles FROM articles";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    $result = $stmt->fetchColumn();
    return $result;
  }  

  // gets a specific article with articleid
  protected function getArticle($articleid){
    $sql = "SELECT  a.*
                   ,CONCAT(u.firstname, ' ', u.lastname) AS name 
            FROM    articles a
                   ,users u 
            WHERE a.authorid = u.userid 
            AND   a.articleid = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$articleid]);
    
    $result = $stmt->fetch();
    return $result;
  }
  
}  