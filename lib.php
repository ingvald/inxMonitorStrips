<?php

//needs feed php utility
require_once('SimplePie.compiled.php');

//comments from simplepie example
function getInitiatedSimplePieFeed(){
  // We'll process this feed with all of the default options.
  $feed = new SimplePie();
 
  // Set which feed to process.
  $feed->set_feed_url("http://www.pinterest.com/skaug/strips/rss");

  // Run SimplePie.
  $feed->init();

  //$feed->set_cache_duration(1);
 
  // This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
  $feed->handle_content_type();  
    
  return $feed;
}

function getFirstFeedItem($feed){
  $firstItem = "";
  foreach ($feed->get_items() as $item){
    $firstItem = $item->get_description();
    break;
  }
  return $firstItem;
}

function getImageFromFeedItem($feedItem){
  //start from > stop at </a
  $start = strpos($feedItem, "src=");
  $end = strpos($feedItem, "></a");
  $strip = substr($feedItem, $start +5, $end - $start -6);
  return "$strip"; 
}

?>