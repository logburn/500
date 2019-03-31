<?php
  $dontCheckUserLogin = true;
  require "/home/lukeuxao/public_html/500/global.php";
  require $root."enc.php";
  
  //making sure the username isn't already in use
  $user = $_POST['username'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=:usr");
  $stmt->bindParam(":usr", $user);
  $stmt->execute();
  $array = $stmt->fetch(PDO::FETCH_ASSOC);
  if($array != ""){
    header('Location: signup.php?userexists=true');
  }else{
    //setting some vars
    $user = $_POST['username'];
    $plainTextPass = $_POST['password'];
    $pass = password_hash($plainTextPass, PASSWORD_DEFAULT);
    $key = bin2hex(openssl_random_pseudo_bytes(rand(100, 300)));
    $plaintextKey = $key;
    $enc = encrypt($key, $plainTextPass);
    $key = $enc[0];
    $iv = $enc[1];
    $tag = $enc[2];
    
    //inserting the new user
    $stmt = $conn->prepare("INSERT INTO users (username, password, enc_key, enc_iv, enc_tag) VALUES (:unm, :psw, :key, :iv, :tag)");
    $stmt->bindParam(":unm", $user);
    $stmt->bindParam(":psw", $pass);
    $stmt->bindParam(":key", $key);
    $stmt->bindParam(":iv", $iv);
    $stmt->bindParam(":tag", $tag);
    $stmt->execute();
    
    $cstrong = true;
    $unhashedToken = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $token = password_hash($unhashedToken, PASSWORD_DEFAULT);
    $time = $cookietime = time() + (60*60*24*30);
    
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = :usr");
    $stmt->bindParam(":usr", $user);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $userID = $res['id'];
    
    $time = date("Y-m-d G:i:s", $time); //for the sql
    $stmt = $conn->prepare("INSERT INTO user_tokens (token, user_id, expires) VALUES (:tkn, :usr, :exp)");
    $stmt->bindParam(":tkn", $token);
    $stmt->bindParam(":usr", $userID);
    $stmt->bindParam(":exp", $time);
    $stmt->execute();
    
    setcookie("500TOKEN", $unhashedToken, $cookietime, "/500", NULL, true, true);
    setcookie("500ID", $user, $cookietime, "/500", NULL, true, true);
    setcookie("500KEY", $plaintextKey, $cookietime, "/500", NULL, true, true);
    
    header("Location: /500/write");
  }
?>