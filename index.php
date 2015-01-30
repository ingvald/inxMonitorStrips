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


TBD...

<?php

$feed = getInitiatedSimplePieFeed();
//print_r($feed);
$firstFeedItem = getFirstFeedItem($feed);
print_r($firstFeedItem);


/*
* x init simplepie feed with function
* loop through only first, or find simple alternative
* strip down to html with img url
* adjust size
* get/ show img directly using url
*/
?>

  </body>
</html>
