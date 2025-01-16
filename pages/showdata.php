<?php
$id = isset($_GET['id'])? $_GET['id'] : null;
$name = isset($_GET['name'])? $_GET['name'] : null;
if($id && $name){
    echo "Product ID: {$id} and Product name: {$name}";
//    echo "Product name: ";
}else{
    echo "Invalid data were provided";
}
