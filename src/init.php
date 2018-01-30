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


$isHttps =  !empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS'];

$actual_link = sprintf("%s://%s%s",
    $isHttps ? 'https' : 'http',
    $_SERVER['HTTP_HOST'],
    $_SERVER['REQUEST_URI']
);

if (!$isHttps && 'shake.hiigara.net' === $_SERVER['HTTP_HOST']) {
    $new_url = "https://" . substr($actual_link, 7);
    http_response_code(301);
    header("Location: {$new_url}");
    exit;
}
