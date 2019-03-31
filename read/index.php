<?php
  require "/home/lukeuxao/public_html/500/global.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Your Writings";
      $css = "read";
      require $root."/res/head.php";
    ?>
  </head>
  <body>
    <?php
      require $root."/res/top.php";
      if(isset($_GET["post"])){
        require "open.php";
      }else{
        require "list.php";
      }
    ?>
  </body>
</html>