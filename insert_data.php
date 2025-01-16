<?php
include 'config.php';
global $conn;
if($_SERVER['REQUEST_METHOD'] != "POST"){
    print "Bad method, only post method is required";
    exit();
}
if(isset($_FILES['file'])){
    $name = htmlspecialchars(strip_tags($_POST['duka']));
    $location = htmlspecialchars(strip_tags($_POST['eneo']));

    $directory = "upload/";
    $fileInfo = $_FILES['file'];
    $fileName = strtolower($fileInfo['name']);
    $fileSize = $fileInfo['size'];
    $filetmpName = $fileInfo['tmp_name'];
    $afterdot = explode(".",$fileName);
    $extension = end($afterdot);
    $destinPath = $directory . $fileName;
    $allowedSize = 2 * 1024 * 1024;
    $allowedfiles = array("png","jpg","jpeg");

    if($fileSize > $allowedSize){
        echo "Your file size is exceeded 2MB as required size";
        exit;
    }
    if(!in_array($extension,$allowedfiles)){
        echo "File format {$extension} is unknown, only " . implode(",",$allowedfiles) . "\nis required";
        exit();
    }
   
    if(move_uploaded_file($filetmpName,$destinPath)){

    // Insert quey
$insert = "INSERT INTO `duka` (`jina_duka`,`image`,`eneo`) VALUES (?,?,?)";
$stmt = $conn->prepare($insert);
$stmt->bind_param("sss",$name,$fileName,$location);
if($stmt->execute()){
    echo "New record were added successfully";
}else{
    echo "Some errors, failed to add new records" . $conn->error;
}
$conn->close();
$stmt->close();
    }
}else{
    echo "No file provided";
}
