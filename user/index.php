<?php
  require "/home/lukeuxao/public_html/500/global.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "User Page";
      $css = "user";
      require $root."/res/head.php";
    ?>
  </head>
  <body>
    <?php require $root."/res/top.php"; ?>
    <h2><?=$current_user?></h3>
    <?php
      $stmt = $conn->prepare("SELECT COUNT(id) FROM posts WHERE user_id = :usr");
      $stmt->bindParam(":usr", $current_userID);
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      $times = $res["COUNT(id)"];
      if($times == 1){
        $times = "once";
      }else{
        $times = $times." times";
      }
    ?>
    <p>You have written <?=$times?> so far.</p>
    <a href=signin.php>Switch accounts</a><br>
    <a href=signout.php>Log out</a>
  </body>
</html>