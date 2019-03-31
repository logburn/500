<?php
  $dontCheckUserLogin = true;
  require "/home/lukeuxao/public_html/500/global.php";
  require $root."enc.php";
  
//Getting vars from $_POST
  $formPass = $_POST['password'];
  $user = $_POST["username"];

//checking the username and password
  //Getting the real, hashed password
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=:unm");
  $stmt->bindParam(":unm", $user);
  $stmt->execute();
  $array = $stmt->fetch(PDO::FETCH_ASSOC);
  $hashedPass = $array['password'];
  $userID = $array['id'];
  
  //checking password, starting session, redirecting
  if(password_verify($formPass, $hashedPass)){
    $cstrong = true;
    $unhashedToken = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $token = password_hash($unhashedToken, PASSWORD_DEFAULT);
    $time = time() + (60*60*24*30);
    $plaintextKey = decrypt($array["enc_key"], $formPass, $array["enc_iv"], $array["enc_tag"]);
    
    setcookie("500TOKEN", $unhashedToken, $time, "/500", NULL, true, true);
    setcookie("500ID", $user, $time, "/500", NULL, true, true);
    setcookie("500KEY", $plaintextKey, $time, "/500", NULL, true, true);
    
    $time = date("Y-m-d G:i:s", $time); //for the sql
    $stmt = $conn->prepare("INSERT INTO user_tokens (token, user_id, expires) VALUES (:tkn, :usr, :exp)");
    $stmt->bindParam(":tkn", $token);
    $stmt->bindParam(":usr", $userID);
    $stmt->bindParam(":exp", $time);
    $stmt->execute();
    
    header("Location: /500/write");
  }else{
    header("Location: signin.php?usrpass=inc");
  }
?>