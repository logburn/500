<?php
  
  if($_GET["del"]){
    $postID = $_GET["post"];
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(":id", $postID);
    $stmt->execute();
    
    header("Location: /500/read");
  }
  
?>