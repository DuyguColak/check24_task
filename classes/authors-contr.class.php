<?php

class AuthorsContr extends Authors{
  
  private $username;
  private $email;  
  private $password;
  private $password_confirm;
  private $firstname;
  private $lastname;
  private $dateofbirth;

  
  public function add($username, $email, $password, $password_confirm, $firstname, $lastname){
    $this->username = $username;
    $this->email = $email;    
    $this->password = $password;
    $this->password_confirm = $password_confirm;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->checkInput();
    $this->setAuthor($this->username, $this->email, $this->password, $this->firstname, $this->lastname);
  }    
  
  public function checkInput(){
    if($this->emptyInput() == false){
       header("location: ../authors.php?error=emptyinput");
       exit();
    }
    if($this->invalidUid() == false){
       header("location: ../authors.php?error=username");
       exit();
    }
    if($this->invalidEmail() == false){
       header("location: ../authors.php?error=email");
       exit();
    }
    if($this->passwordMatch() == false){
       header("location: ../authors.php?error=passwordmatch");
       exit();
    }
    if($this->usernameTaken() == false){
       header("location: ../authors.php?error=useroremailtaken");
       exit();
    }    
    
  }
  
  private function emptyInput(){
    $result;
    if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->password_confirm)){
       $result = false;
    }else{
      $result = true;
    }
    return $result; 
  }
  
  private function invalidUid(){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }
  
  private function invalidEmail(){
    $result;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }

  private function passwordMatch(){
    $result;
    if($this->password !== $this->password_confirm){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }
  
  private function usernameTaken(){
    $result;
    if(!$this->CheckUser($this->username, $this->email)){
      $result = false;
    }else{
      $result = true;
    }
    return $result;
  }  
  
  public function getAuthors(){
    return $this->readAuthors();  
  }  

}  