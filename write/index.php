<?php
  require "/home/lukeuxao/public_html/500/global.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      $title = "Write";
      $css = "write";
      require $root."/res/head.php";
    ?>
  </head>
  <body>
    <?php require $root."/res/top.php"; ?>
    <script>
      function wordCount(thing) {
        regex = /(\S\s)|(([A-Z]|[a-z])(\.|\!|\?|\z))/;
        numOfParenthesis = 5; //how many par. sets are in the regex
        wordsLeft = 500-((thing.value.split(regex).length-1)/numOfParenthesis);
        //if(wordsLeft<0){
        //  wordsLeft = 0;
        //}
        document.getElementById("counter").innerHTML = wordsLeft;
        if(wordsLeft<=0){
          document.getElementById("submitWriting").disabled = false;
        }else{
          document.getElementById("submitWriting").disabled = true;
        }
      }
    </script>
    <form action=fork.php method=POST>
      <h2 id=counter>500</h2>
      <textarea onkeyup=wordCount(this) placeholder='Write your words here...' name=words></textarea>
      <div id=writeButtons>
        <button type=submit name=submit value=save id=saveWriting>SAVE</button>
        <button type=submit name=submit value=submit id=submitWriting disabled>SUBMIT</button>
      </div>
    </form>
  </body>
</html>