<?php
  require $root."enc.php";
  $enc = encrypt($_POST["words"], $current_key);
  $postID =  bin2hex(openssl_random_pseudo_bytes(7));
  
  $stmt = $conn->prepare("INSERT INTO posts (id, user_id, text, iv, tag) VALUES (:id, :uid, :txt, :iv, :tag)");
  $stmt->bindParam(":id", $postID);
  $stmt->bindParam(":uid", $current_userID);
  $stmt->bindParam(":txt", $enc[0]);
  $stmt->bindParam(":iv", $enc[1]);
  $stmt->bindParam(":tag", $enc[2]);
  $stmt->execute();
  
  header("Location: /500/read/?post=".$postID);
?>