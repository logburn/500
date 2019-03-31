<div id=open>
<?php

  if(isset($_GET["del"])){
    require "delete.php";
  }
  
  require $root."enc.php";
  
  $pid = $_GET["post"];
  
  $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :pid");
  $stmt->bindParam(":pid", $pid);
  $stmt->execute();
  $post = $stmt->fetch(PDO::FETCH_OBJ);
  
  if($current_userID != $post->user_id){
    echo "Hey, that's not your post!";
    exit();
  }
  
  $text = $post->text;
  $iv = $post->iv;
  $tag = $post->tag;
  $text = decrypt($text, $current_key, $iv, $tag);
  
  echo "<h3>".date("F j, Y", strtotime($post->date))."</h3>";
  echo "<p>".str_word_count($text)." words <a href=?post=".$_GET["post"]."&del=1 class=hoverColor>delete</a></p>";
  echo "<pre>".$text."</pre>";
?>
</div>