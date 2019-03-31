<?php
  require "/home/lukeuxao/public_html/500/global.php";
  setcookie("500ID", "", time()-3600, "/500", NULL, true, true);
  setcookie("500KEY", "", time()-3600, "/500", NULL, true, true);
  setcookie("500TOKEN", "", time()-3600, "/500", NULL, true, true);
  header("Location: signin.php");
?>