<?php

// this is the model class of the signup process 
class Login extends Dbh{
  
  // checkUser exists return false if user exists and not allow signup
  protected function getUser($username, $password){
    $sql = "SELECT * FROM users WHERE username = ? or email = ?;";
    $stmt = $this->connect()->prepare($sql);
    
    if(!$stmt->execute(array($username, $username))) {
        $stmt = null;
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
        
    if($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../login.php?error=usernotfound");
        exit();      
    }
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($password, $result[0]["password"]);
    
    if($checkPwd == false){
        $stmt = null;
        header("location: ../login.php?error=wrongpassword");
        exit();      
    }
    elseif($checkPwd == true){
        session_start();
        $_SESSION["userid"] = $result[0]["userid"];
        $_SESSION["username"] = $result[0]["username"];
        
              
    }    
    
    $stmt = null;
  }
  

}