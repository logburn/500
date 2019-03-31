<?php
  require "/home/lukeuxao/public_html/500/global.php";
  
  //Getting the proper file for submitting or saving (Placed here for the <title>)
  $place = $_POST["submit"];
  
  //The functions of this page are at the bottom so that the HTML will show (no idea if that actually works, but I think it has in the past so)
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = $place." post";
      $css = "";
      require $root."/res/head.php";
    ?>
  </head> 
  <body>
    <h2>Your secrets are safe here.</h2>
    <pre>
      <?php include $place.'.php'; ?>
    </pre>
  </body>
</html>
<?php
  if($_POST["submit"] != "submit" && $_POST["submit"] != "save"){
    //POST informatin missing
    echo "Umm... POST information is missing - how/why are you here?";
    exit();
    exit(); //just in case lol
  }
?>