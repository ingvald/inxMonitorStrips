<?php
  //needs feed php utility
  require_once('SimplePie.compiled.php');
  require_once('lib.php');
?><html>
    <head>
      <title>
monitor strips
      </title>
    </head>
  <body>

<?php

$feed = getInitiatedSimplePieFeed("http://www.pinterest.com/skaug/strips.rss");
//print_r($feed);
$firstFeedItem = getFirstFeedItem($feed);
$image = getImageFromFeedItem($firstFeedItem);
$strip = getBiggerImage($image);
echo "   <img width=100% src=\"" . $strip . "\">";

?>

  </body>
</html>
