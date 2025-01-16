<?php
require 'config.php';
$id = $_GET['id']? $_GET['id'] : null ;
if($id){
    $select = mysqli_query($conn,"SELECT `image` FROM `duka` WHERE `duka_id` = '$id'");
    $result = mysqli_fetch_assoc($select);
    $filename = $result['image'];
    $directory = "upload/";
    // unlink a file
    unlink($directory . $filename);
    // delete forever
    $delete = "DELETE FROM `duka` WHERE `duka_id` = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("i",$id);
    if($stmt->execute()){
        echo "Data imefutwa kwa mafanikio";
    }else{
        echo "Imeshindikana kufuta data";

    }
}else{
    echo "No any ID provided";
}
