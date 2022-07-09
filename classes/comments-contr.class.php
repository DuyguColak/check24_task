<?php

// Comments Controller Class
class CommentsContr extends Comments{
  
  // properties
  
  // methods
  
  // list all comments for index page
  public function readComments($articleId){
    return $this->getComments($articleId);  
  }    
  
  // add new article 
  public function addComment($articleId, $name, $email, $url, $comment){
    $this->articleid = $articleId;
    $this->name = $name;  
    $this->email = $email;
    $this->url = $url;
    $this->comment = $comment;
    $this->setComment($this->articleid, $this->name, $this->email, $this->url, $this->comment);
  }     


}  