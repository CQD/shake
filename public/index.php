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

// routing

$path = $_SERVER['REQUEST_URI'];
if (0 === strpos($path, '/og/img/')) {
    include __DIR__ . '/ogimg.php';
} else {
    include __DIR__ . '/page.php';
}
