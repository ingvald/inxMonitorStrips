<?php
//initial tests, trying phpunit

class basictest extends PHPUnit_Framework_TestCase {

  private $feedUrl = "http://www.pinterest.com/skaug/strips/rss";

  public function testParsingIndexJustFine(){
    $indexPage = get_include_contents("index.php");
    $this->assertContains("/html", $indexPage);
  }

  public function testGetInitSimplePieFeed(){
    include_once("lib.php");
    $this->assertEquals(true, function_exists("getInitiatedSimplePieFeed"));
  }
  
  public function testGettingFeedContent(){
    include_once("lib.php");
    $feed = getInitiatedSimplePieFeed($this->feedUrl);
    $this->assertNotEmpty($feed);
    $this->assertTrue(stringContainsString($feed, "www.pinterest"));
  }
  
  public function testGetFirstFeedItem(){
    include_once("lib.php");
    $feed = getInitiatedSimplePieFeed($this->feedUrl);
    $firstFeedItem = getFirstFeedItem($feed);
    //assumption: one feed item less than 300 in length...
    $this->assertTrue(strlen($firstFeedItem) < 500);
  }
  
  public function testStripDownToImage(){
    include_once("lib.php");
    $feed = getInitiatedSimplePieFeed($this->feedUrl);
    $firstFeedItem = getFirstFeedItem($feed);
    $img = getImageFromFeedItem($firstFeedItem);
    //assumption: stripped = not having "href" ?
    $this->assertFalse(stringContainsString($img, "href"));
  }

}

function stringContainsString($haystack, $needle){
  $haystackTxt = serialize($haystack);
  $needleInHaystack = stripos($haystackTxt, $needle);
  if ($needleInHaystack === false) return false;
  return true;
}

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

?>