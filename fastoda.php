<?php
$url = "https://fastoda.online/stoke/show.data.php";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
echo $result;
curl_close($ch);