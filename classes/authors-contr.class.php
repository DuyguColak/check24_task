<?php

// Author Controller Class 
class AuthorsContr extends Authors{
  
  // read all authors
  public function getAuthors(){
    return $this->readAuthors();  
  }  

}  