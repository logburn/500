<meta charset=utf-8>
<title><?=$title?> | 500 Words</title>
<link rel=icon href=\i\favicon.ico type=image/x-icon>
<link rel=stylesheet href=/500/res/global.css type=text/css>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
  $css = is_array($css)?$css:array($css);
  foreach($css as $file){
    echo "<link rel=stylesheet href=".$file.".css type=text/css>\n";
  }
?>