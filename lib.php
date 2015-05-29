<?php

//needs feed php utility
require_once('SimplePie.compiled.php');

//comments from simplepie example
function getInitiatedSimplePieFeed($feedUrl){
  // We'll process this feed with all of the default options.
  $feed = new SimplePie();
 
  // Set which feed to process.
  $feed->set_feed_url($feedUrl);

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
  $image = substr($feedItem, $start +5, $end - $start -6);
  return $image; 
}

//this is guessing, pinterest might change it over time...
function getBiggerImage($feedImage){
  //replace /196x/ with 736x (or bigger? find which bigger... pinterest supports) - "originals"
  $pixel = strpos($feedImage, "236x");
  //$strip = substr_replace($strip, "originals", $pixel, 4); //originals have started being different image types...
  $strip = substr_replace($feedImage, "736x", $pixel, 4);
  return $strip;
}

?>