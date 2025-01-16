<?php
$path = fopen("note.html","r");
$size = filesize("note.html");
// $read = fread($path,$size);
if(!feof($path)){
    $i = 0;
    while($i <= $size){
        echo fgets($path) . "<br>";
        $i++;
    }
}
