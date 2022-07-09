<?php

class ArticlesContr extends Articles{
  
  private $authorid;
  private $articledate;  
  private $articletitle;
  private $articletext;
  private $articleimage;
  
  public function listArticles(){
    return $this->getArticles();  
  }    
  
  public function addArticle($authorid, $articledate, $articletitle, $articletext, $articleimage){
    $this->authorid = $authorid;
    $this->articledate = $articledate;    
    $this->articletitle = $articletitle;
    $this->articletext = $articletext;
    $this->articleimage = $articleimage;
    $this->setArticle($this->authorid, $this->articledate, $this->articletitle, $this->articletext, $this->articleimage);
  }    
  
  


}  