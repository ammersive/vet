<?php

namespace App;

// Given an alphabet decryption key create a program that can crack any message using the decryption key given.

Class Cracker
{

    private $message;
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }
    
    public function decrypt($message)
    {   
        $alphabet = "a b c d e f g h i j k l m n o p q r s t u v w x y z";               
        $cipher = array_combine(explode(" ", $this->key), explode(" ", $alphabet));
        $cipher[" "] = " ";

        $cracked = "";
        $messageArray = str_split($message);
    
        foreach ($messageArray as $char) {
            $cracked .= $cipher[$char];    
        } 
        return $cracked;
    }
}

    // // Attempt 4
    // // Have $key declared inside decrypt() method, so only that key can be used. With final attempt, key is passed to object on creation, so many keys can be used.

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