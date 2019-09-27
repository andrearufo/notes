<?php


$uri = $_SERVER['REQUEST_URI'];
$slug = substr($uri, 1);
define('SLUG', $slug);

if( !is_home() && !get_note(SLUG) ){
    http_response_code(404);
    include('theme/404.php'); // provide your own HTML for the error page
    echo '<pre>'.print_r($_SERVER, 1).'</pre>';
    die();
}
