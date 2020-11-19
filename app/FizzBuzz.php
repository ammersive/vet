<?php

namespace App;

Class FizzBuzz
{
    private $num;

    public function forNumber($num)
    {   
        $returnString = "";

        if ($num % 3 === 0) {
            $returnString .= "Fizz";
        }
        if ($num % 5 === 0) {
            $returnString .= "Buzz";
        }
        if ($num % 7 === 0) {
            $returnString .= "Rarr";
        }

        return $returnString ? $returnString : strval($num);
    }

}
    // public function forNumber($num)
    // {
    //     return "1";
    // }

    // public function forNumber($num)
    // {
    //     if ($num === 2) {
    //         return "2";
    //     }
    //     return "1";
    // }

    // public function forNumber($num)
    // {
    //     if ($num === 3) {
    //         return "Fizz";
    //     }
    //     else if ($num === 2) {
    //         return "2";
    //     }
    //     return "1";
    // }

    // REFACTOR
    // public function forNumber($num)
    // {
    //     if ($num === 3) {
    //         return "Fizz";
    //     }
    //     return strval($num);
    // }

    // public function forNumber($num)
    // {
    //     if ($num === 3) {
    //         return "Fizz";
    //     }
    //     else if ($num === 5) {
    //         return "Buzz";
    //     }
    //     return strval($num);
    // }

    // public function forNumber($num)
    // {
    //     if ($num === 3 || $num === 6) {
    //         return "Fizz";
    //     }
    //     else if ($num === 5) {
    //         return "Buzz";
    //     }
    //     return strval($num);
    // }

    // public function forNumber($num)
    // {
    //     if ($num === 3 || $num === 6) {
    //         return "Fizz";
    //     }
    //     else if ($num === 5 || $num === 10) {
    //         return "Buzz";
    //     }
    //     return strval($num);
    // }

    // public function forNumber($num)
    // {   
    //     $returnString = "";

    //     if ($num === 3 || $num === 6) {
    //         $returnString .= "Fizz";
    //     }
    //     if ($num === 5 || $num === 10 ) {
    //         $returnString .= "Buzz";
    //     }
    //     if ($num === 15) {
    //         $returnString .= "FizzBuzz";
    //     }

    //     return $returnString ? $returnString : strval($num);
    // }

    // public function forNumber($num)
    // {   
    //     $returnString = "";

    //     if ($num % 3 === 0) {
    //         $returnString .= "Fizz";
    //     }
    //     if ($num % 5 === 0) {
    //         $returnString .= "Buzz";
    //     }

    //     return $returnString ? $returnString : strval($num);
    // }