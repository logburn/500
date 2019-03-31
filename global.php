<?php
  if(!isset($_COOKIE["500ID"]) && !isset($_COOKIE["500KEY"]) && !isset($_COOKIE["500TOKEN"]) && !isset($dontCheckUserLogin)){
    header("Location: /500/user/signin.php");
  }
  
  $root = "/home/lukeuxao/public_html/500/";
  require "conn.php";
  conn();
  
  if(!isset($dontCheckUserLogin)){
    
    $current_user = $_COOKIE["500ID"];
    $current_key = $_COOKIE["500KEY"];
    
    $stmt = $conn->prepare("SELECT id FROM users WHERE username=:unm");
    $stmt->bindParam(":unm", $current_user);
    $stmt->execute();
    $userID = $current_userID = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    
    $stmt = $conn->prepare("SELECT token FROM user_tokens WHERE user_id=:usr");
    $stmt->bindParam(":usr", $userID);
    $stmt->execute();
    $dbToken = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $userVerified = false;
    foreach($dbToken as $token){
      if(password_verify($_COOKIE["500TOKEN"], $token['token'])){
        $userVerified = true;
        break;
      }
    }
    
    if(!$userVerified){
      header("Location: /500/user/signin.php");
    }
  }
?>