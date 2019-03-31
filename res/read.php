<?php
  require "enc.php";
  require "conn.php";
  conn();
  
  $pid = $_GET["post"];
  $usr = 4;
  
  $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :pid AND user_id = :uid");
  $stmt->bindParam(":pid", $pid);
  $stmt->bindParam(":uid", $usr);
  $stmt->execute();
  $post = $stmt->fetch(PDO::FETCH_OBJ);
  
  //make sure the post belongs to the current user
  
  $stmt = $conn->prepare("SELECT * FROM dec_info WHERE posts_id = :pid");
  $stmt->bindParam(":pid", $pid);
  $stmt->execute();
  $dec_info = $stmt->fetch(PDO::FETCH_OBJ);
  
  $text = $post->text;
  $key = $dec_info->enc_key;
  $iv = $dec_info->iv;
  $tag = $dec_info->tag;
  
  echo decrypt($text, $key, $iv, $tag);
?>