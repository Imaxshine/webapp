<?php
$id = isset($_GET['id'])? $_GET['id'] : null;
if($id)
{
    print "Product ID: " . $id;
}else{
    print 'Invalid product ID';
}