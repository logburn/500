<?php
  $stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = :usr ORDER BY date DESC");
  $stmt->bindParam(":usr", $current_userID);
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_OBJ);
  
  foreach($posts as $post){
    $link = $post->id;
    $date = date("F j, Y", strtotime($post->date));
    echo "<h3><a href=?post=$link>$date</a></h3>";
  }
?>