<?php

/*
 * PHP PBKDF2 implementation The number of rounds can be increased to keep ahead
 * of improvements in CPU/GPU performance. You should use a different salt for
 * each password (it's safe to store it alongside your generated password This
 * function is slow; that's intentional! For more information see: -
 * http://en.wikipedia.org/wiki/PBKDF2 - http://www.ietf.org/rfc/rfc2898.txt
 */
function pbkdf2 ($password, $salt, $rounds = 15000, $keyLength = 32, 
        $hashAlgorithm = 'sha256', $start = 0)
{
    // Key blocks to compute
    $kb = $start + $keyLength;
    
    // Derived key
    $dk = '';
    
    // Create key
    for ($block = 1; $block <= $kb; $block ++) {
        // Initial hash for this block
        $ib = $h = hash_hmac($hashAlgorithm, $salt . pack('N', $block), 
                $password, true);
        
        // Perform block iterations
        for ($i = 1; $i < $rounds; $i ++) {
            // XOR each iteration
            $ib ^= ($h = hash_hmac($hashAlgorithm, $h, $password, true));
        }
        
        // Append iterated block
        $dk .= $ib;
    }
    
    // Return derived key of correct length
    return base64_encode(substr($dk, $start, $keyLength));
}