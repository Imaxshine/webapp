<?php
$data = 'Emmanueli';
function Encrypt($data)
{
    $cipher = "AES-128-CBC";
    $key = "pQw_wc45_fastOda\online";
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $option = 0; //standard level
    $encryption = openssl_encrypt($data,$cipher,$key,$option,$iv);
    return base64_encode($iv.$encryption);
}
$encrypted_data = Encrypt($data);
//echo $encrypted_data . "<br>";

function Decrypt($encrypted_data)
{
    $cipher = "AES-128-CBC";
    $key = "pQw_wc45_fastOda\online";
    $iv_length = openssl_cipher_iv_length($cipher);
    $option = 0; //standard level
    $decoded = base64_decode($encrypted_data);
    $iv = substr($decoded,0,$iv_length);
    $encoded_info = substr($decoded,$iv_length);
    return openssl_decrypt($encoded_info,$cipher,$key,$option,$iv);
}
$decrypted = Decrypt($encrypted_data);
//echo $decrypted;
