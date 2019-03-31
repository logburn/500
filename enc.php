<?php
function encrypt($plaintext, $key){
  $cipher = "aes-128-gcm";
  if (in_array($cipher, openssl_get_cipher_methods())){
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $res = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
    return array($res, $iv, $tag);
  } 
}
function decrypt($ciphertext, $key, $iv, $tag){
  $cipher = "aes-128-gcm";
  if (in_array($cipher, openssl_get_cipher_methods())){
    return openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
  }
}
?>