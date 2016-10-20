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

$feedUrl = getFeedUrl();
$feed = getInitiatedSimplePieFeed($feedUrl);
//print_r($feed);
$firstFeedItem = getFirstFeedItem($feed);
$image = getImageFromFeedItem($firstFeedItem);
$strip = getBiggerImage($image);
echo "   <img width=100% height=100% src=\"" . $strip . "\">";

?>

  </body>
</html>
