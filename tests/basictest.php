<?php
//initial tests, trying phpunit

class basictest extends PHPUnit_Framework_TestCase {
  public function testParsingIndexJustFine(){
    $indexPage = get_include_contents("index.php");
    $this->assertContains("/html", $indexPage);
  }
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