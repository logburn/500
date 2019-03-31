<?php
  $dontCheckUserLogin = true;
  require "/home/lukeuxao/public_html/500/global.php";
  if(isset($_GET["usrpass"])){
    $note = "<small style='color: red;'>Incorrect username or password</small><br>";
  }else{
    $note = "";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php
    $title = "Sign In";
    $css = "sign";
    require $root."/res/head.php";
  ?>
</head>
  <body>
    <div id=formWrapper>
      <form method=POST action=pwdchk.php>
        <h1>SIGN IN</h1>
        <p>Username:</p>
        <input type=text name=username autocomplete=off autofocus>
        <p>Password:</p>
        <input type=password name=password autocomplete=off><br>
        <?php echo $note; ?>
        <button type=submit>SUBMIT</button><br>
        <p>Need an account? <a href=signup.php>Sign up.</a></p>
      </form>
    </div>
    <input type=checkbox id=cookie>
    <div id=cookies>
      <p>This site uses cookies to keep you logged in and for encryption purposes.<br>
      By signing in to this website, you agree to the usage of these cookies.<br>
      Cookies are not used for any other reasons than stated above.</p>
      <label for=cookie>I understand, dismiss this banner</label>
    </div>
  </body>
</html>