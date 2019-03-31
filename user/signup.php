<?php
  $dontCheckUserLogin = true;
  require "/home/lukeuxao/public_html/500/global.php";
  if(isset($_GET["userexists"])){
    $note = "<br><small style='color: red;'>That username is already in use.<br>Please choose another.</small><br>";
  }else{
    $note = "";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Sign Up";
      $css = "sign";
      require $root."/res/head.php";
    ?>
  </head>
  <body>
    <div id=formWrapper>
      <form method=POST action=crtuser.php>
        <h1>SIGN UP</h1>
        <p>Username:</p>
        <input type=text name=username autocomplete=off autofocus>
        <?php if($note != ""){echo $note;} ?>
        <p>Password:</p>
        <input type=password name=password autocomplete=off><br>
        <button type="submit">SUBMIT</button><br>
        <p>Have an account? <a href=signin.php>Sign in.</a></p>
      </form>
    </div>
    <input type=checkbox id=cookie>
    <div id=cookies>
      <p>This site uses cookies to keep you logged in and for encryption purposes.<br>
      By signing up for this website, you agree to the usage of these cookies.<br>
      Cookies are not used for any other reasons than stated above.</p>
      <label for=cookie>I understand, dismiss this banner</label>
    </div>
  </body>
</html>