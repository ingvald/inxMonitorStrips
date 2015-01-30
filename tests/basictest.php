<?php
//initial tests, trying phpunit

class basictest extends PHPUnit_Framework_TestCase {

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
    $feed = getInitiatedSimplePieFeed();
    $this->assertNotEmpty($feed);
    $this->assertTrue(strpos($feed, "www.pinterest") !== 0);
  }
  
  public function testGetFirstFeedItem(){
    include_once("lib.php");
    $feed = getInitiatedSimplePieFeed();
    $firstFeedItem = getFirstFeedItem($feed);
    //assumption: one feed item less than 300 in length...
    $this->assertTrue(strlen($firstFeedItem) < 300);
  }
  
/*
  public function testStripDownToImage(){
    include_once("lib.php");
    $feed = getInitiatedSimplePieFeed();
    $strippedFeed = getStrippedFeed();
    //stripped = not having "href" ?
  }
*/
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