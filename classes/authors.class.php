<?php

class Authors extends Dbh{

  protected function readAuthors(){
    $sql = "SELECT * FROM users WHERE type = 'author'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    $results = $stmt->fetchAll();
    return $results;
  }
  
  protected function setAuthor($username, $password, $email, $firstname, $lastname){
    $sql = "INSERT INTO users(username, password, email, firstname, lastname, type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute([$username, $hashedPwd, $email, $firstname, $lastname, 'author']); 
  }
  
  // checkUser exists return false if user exists and not allow signup
  protected function checkUser($username, $email){
    $sql = "SELECT userid FROM users WHERE username = ? OR email = ?;";
    $stmt = $this->connect()->prepare($sql);
    
    if(!$stmt->execute(array($username, $email))) {
        $stmt = null;
        header("location: ../authors.php?error=stmtfailed");
        exit();
    }
    
    $resultCheck;
    if($stmt->rowCount() > 0){
      $resultCheck = false;
    }
    else{
      $resultCheck = true;
    }
    return $resultCheck;
  }
  
}  