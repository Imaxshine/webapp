<?php
$id = isset($_GET['id'])? $_GET['id'] : null;
$name = isset($_GET['nm'])? $_GET['nm'] : null;
if($id && $name){
    echo "Product ID: {$id} and Product name: {$name}";
//    echo "Product name: ";
}else{
    echo "Invalid URL were provided";
}
