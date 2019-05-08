<?php

namespace App\Service;

/**
 *  class Yodalizer
 */
class Yodalizer
{
    public static function yodalizeIt(string $str) :string
    {
        $res="";
        $test = $str;
        //TODO Write your code here,
        //TODO And return what we are waiting for at the end...
        //$str = "The lazy dog jumped over the fox";
        $myArray = str_word_count($test, 1);
        $reverse = array_reverse($myArray);
     
        $res = implode(" ", $reverse);
        // foreach ($reverse as $rev) {
        //    return $rev." ";
        //}
        $result=ucfirst($res);
        return $result;
    }
}
