<?php
  $dontCheckUserLogin = true;
  require "/home/lukeuxao/public_html/500/global.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Privacy Policy";
      $css = "policy";
      require $root."/res/head.php";
    ?>
  </head>
  <body>
    <h3>PRIVACY POLICY</h3>
    <p>By signing up, you agree that that data collected, outlined below, may be processed as stated below.</p>
    
    <p>Data that may be collected: </p>
    <ul>
      <li>Username/password (password is securely encrypted, username is not)</li>
      <li>Your writings (securely encrypted with your personal key, which is auto-generated securely, then encrypted using your password)</li>
      <li>Your IP address and time zone (encrypted)</li>
      <li>Time/date of your posts (encrypted)</li>
    </ul>
    
    <h3>How your data is used</h3>
    <p>
        Your writings are encrypted with a two-way encryption method. This means that they can be decrypted, which allows you to view them whenever you want. Your password is used to encrypt a randomly-generated key, which in turn encrypts your data. Since your password is encrypted with a one-way encryption method, no-one can decrypt it. The only way to find your password is to guess it. By encrypting this way, all data is securely stored and only someone who knows your password can read your data.<br><br>
        Your IP address and time zone are only used to verify your login patterns in order to prevent hacking. If you login from the US and then from Russia within two seconds, something's up. However, no-one needs to know where your logging in from, only if it's near where you were before. Because of this, the information is encrypted so that it can be checked for similarity, but not understood.
    </p>
  </body>
</html>