<?php

namespace App;

// Given an alphabet decryption key create a program that can crack any message using the decryption key.

Class Cracker
{

    private $message;
    
    // Attempt 4
    public function decrypt($message)
    {   
        $alphabet = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
        $key =      "! ) # ( . * % & > < @ a b c d e f g h i j k l m n o";        
        $cipher = array_combine(explode(" ", $key), explode(" ", $alphabet));
        $cipher[" "] = " ";

        $cracked = "";
        $messageArray = str_split($message);
    
        foreach ($messageArray as $char) {
            $cracked .= $cipher[$char];    
        } 
        return $cracked;
    }
}

    // // Attempt 3
    // // The above but without space value added to $cipher

    // // Attempt 2
    // public function decrypt($char)
    // {   
    //     if ($char === ")") {
    //         return "b";
    //     }
    //     return "a";
    // }

    // // Attempt 1
    // public function decrypt($char)
    // {   
    //     return "a";
    // }