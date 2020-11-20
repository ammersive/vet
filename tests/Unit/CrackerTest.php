<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Cracker;

class CrackerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    private $cracker;
    
    public function setUp() : void
    {
        // can pass in any key of 26 chars separated by spaces
        $this->cracker = new Cracker("! ) # ( . * % & > < @ a b c d e f g h i j k l m n o");
    }

    public function test1()
    {
        $this->assertSame("a", $this->cracker->decrypt("!"));
    }

    public function test2()
    {
        $this->assertSame("b", $this->cracker->decrypt(")"));
    }

    public function test3()
    {
        $this->assertSame("ab", $this->cracker->decrypt("!)"));
    }

    public function test4()
    {
        $this->assertSame("krz", $this->cracker->decrypt("@go"));
    }

    // Final test:
    public function testFull()
    {
        $this->assertSame("hello mum", $this->cracker->decrypt("&.aad bjb"));
    }

    public function testWithNewKey()
    {
        $newKeyCracker = new Cracker(") # ( . * % & > < @ a b c d e f g h i j k l m n o !");
        $this->assertSame("a b c", $newKeyCracker->decrypt(") # ("));
    }
}