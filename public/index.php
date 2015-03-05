<?php
$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

$input = @$_SERVER['REQUEST_URI'];
$input = @trim($input);
$input = @trim($input, '/');

if (empty($input)) {
    $input = "抖";
} else {
    $input = urldecode($input);
}

if (filter_var($input, FILTER_VALIDATE_URL) && preg_match('@\\.(jpg|png|gif)$@', $input)) {
    $mode = 'image';
} else {
    $mode = 'text';
}

$len = strlen($input);
$base = 20;
$font_size = ($len>5) ? ($base*5/$len) : $base;
?><!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<title>抖<?=htmlspecialchars($input)?></title>
<meta property="og:title" content="抖<?=htmlspecialchars($input)?>" />
<meta property="og:url" content="<?=htmlspecialchars($actual_link)?>" />
<meta property="og:description" content="抖你的這個<?=htmlspecialchars($input)?>" />
<meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/img/og.png" />

<link rel="stylesheet" type="text/css" href="http://elrumordelaluz.github.io/csshake/css/csshake.css">
<style>
html,body{margin:0;padding:0;background-color:#FFAB52;color:white;height:100%; overflow:hidden}
.wrapper{
    text-align:center;
    padding:2em 1em 3em;
    width:100%;
    height:100%;
    max-width:1500px;
    margin:0 auto;
    box-sizing:border-box;
}
.S{
    font-size:<?=(double) $font_size?>em;
    line-height:120%;
}
.IS{
    max-width:80%;
}

table{
width:100%;
height:90%;
}
</style>
</head>
<body>
<div class="wrapper">
<table>
<tr><td valign="middle">
<?php if ('text' === $mode) :?>
<span class="S shake shake-hard shake-constant"><?=htmlspecialchars($input)?></span>
<?php elseif ('image' === $mode):?>
<img class="IS shake shake-hard shake-constant" src="<?=htmlspecialchars($input)?>">
<?php endif;?>
</td></tr></table>
</div>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-368263-15', 'xn--pru.hiigara.net');
ga('send', 'pageview');
</script>

</body>
</html>

