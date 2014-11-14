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
foreach ($feed->get_items() as $item){
  $feeditem = $item->get_description();
  
  print_r($feeditem);

}
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
