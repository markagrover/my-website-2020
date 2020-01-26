<?php
/**
 * Created by PhpStorm.
 * User: markgrover
 * Date: 1/25/20
 * Time: 8:04 PM
 */
function truncate($text, $chars = 200) {
    if(strlen($text) > $chars) {
        $text = $text.' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text ,' '));
        $text = $text.'...';
    }
    return $text;
}

function scanFolder($dir){
    $fileNames = scandir($dir);
    foreach($fileNames as $fileName){
        if($fileName == '.'){

        } elseif($fileName == '..'){

        } else {
            echo "<p class='fileName'>blog_images/" . $fileName . "<img class='thumbnail' src='blog_images/" . $fileName . "' height='50px'></p><br>";
        }

    }
}