<?php

// Articles Controller Class
class ArticlesContr extends Articles{
  
  // properties
  private $authorid; 
  private $articletitle;
  private $articletext;
  private $articleimage;
  
  // methods
  
  // list all articles for index page
  public function listArticles($page_number){
    return $this->getArticles($page_number);  
  }    
  
  // add new article 
  public function addArticle($authorid, $articletitle, $articletext, $articleimage){
    $this->authorid = $authorid;  
    $this->articletitle = $articletitle;
    $this->articletext = $articletext;
    $this->articleimage = $articleimage;
    $this->setArticle($this->authorid, $this->articletitle, $this->articletext, $this->articleimage);
  }    
  
  // get number of all articles for pagination
  public function countArticles(){
    return $this->getNOArticles();  
  } 
  
  public function readArticle($articleid){
    return $this->getArticle($articleid);  
  }    


}  