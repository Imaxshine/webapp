<?php
$url = "https://example.com";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$response = curl_exec($ch);
if(curl_errno($ch)){
    echo "Errors/Error " . curl_error($ch);
    exit();
}
curl_close($ch);
echo $response;