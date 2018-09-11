<?php

$assetTime = '201801301610';

///////////////////////////////////////////////

// 擋掉討厭的假 referral
if (isset($_SERVER['HTTP_REFERER'])) {
    $ref = $_SERVER['HTTP_REFERER'];
    $bads = [
        'semalt.com',
        'buttons-for-website.com',
    ];
    foreach ($bads as $bad) {
        if (false !== strpos($ref, $bad)) {
            http_response_code(404);
            die();
        }
    }
}
