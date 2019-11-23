<?php

$uri = $_SERVER['REQUEST_URI'];
$slug = substr($uri, 1);

define('SLUG', $slug);
define('THEME', 'themes/'.config('theme'));

if( !is_home() && !get_note(SLUG) ){
    http_response_code(404);
    include( THEME.'/404.php');
    exit;
}
