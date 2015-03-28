<?php
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

$_SERVER['XX_ACTUAL_LINK'] = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
