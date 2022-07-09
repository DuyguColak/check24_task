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
  public function listArticles(){
    return $this->getArticles();  
  }    
  
  // add new article 
  public function addArticle($authorid, $articletitle, $articletext, $articleimage){
    $this->authorid = $authorid;  
    $this->articletitle = $articletitle;
    $this->articletext = $articletext;
    $this->articleimage = $articleimage;
    $this->setArticle($this->authorid, $this->articletitle, $this->articletext, $this->articleimage);
  }    
  
  


}  