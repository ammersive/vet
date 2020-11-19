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
        $this->cracker = new Cracker();
    }

    public function test1()
    {
        $this->assertSame("a", $this->cracker->decrypt("!"));
    }

    // public function test2()
    // {
    //     $this->assertSame("a", $this->cracker->decrypt("!"));
    // }



    // // Final test:
    // public function testFull()
    // {
    //     $cracker = new Cracker("! ) # ( . * % & > < @ a b c d e f g h i j k l m n o");
    //     $this->assertSame("hello mum", $cracker->decrypt("&.aad bjb"));
    // }
}
