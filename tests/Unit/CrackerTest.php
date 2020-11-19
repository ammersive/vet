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
        $cracker = new Cracker("! ) # ( . * % & > < @ a b c d e f g h i j k l m n o");
        $this->assertSame("hello mum", $cracker->decrypt("&.aad bjb"));
    }
}






// <?php

// namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
// use App\Cracker;

// class CrackerTest extends TestCase
// {
//     /**
//      * A basic unit test example.
//      *
//      * @return void
//      */
    
//     private $cracker;
    
//     public function setUp() : void
//     {
//         $this->cracker = new Cracker();
//         $this->cracker->addAlphabet("a b c d e f g h i j k l m n o p q r s t u v w x y z");
//         dd($this->cracker->alphabet);
//         // $this->cracker->$addKey = "! ) # ( . * % & > < @ a b c d e f g h i j k l m n o";
//     }

//     public function test1()
//     {
//         $this->assertSame("a", $this->cracker->decrypt("!"));
//     }

//     public function test2()
//     {
//         $this->assertSame("b", $this->cracker->decrypt(")"));
//     }

//     // public function test3()
//     // {
//     //     $this->assertSame("ab", $this->cracker->decrypt("!)"));
//     // }

//     public function test4()
//     {
//         $this->assertSame("a b c d e f g h i j k l m n o p q r s t u v w x y z", $this->cracker->$alphabet);
//     }
