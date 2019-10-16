<?php

// Debugger
$debug = true;
if( $debug ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Classes
require 'core/Note.php';
require 'core/Parsedown.php';

// Functions
require 'core/functions.php';
require 'core/route.php';

// Views
if( is_home() ){
    require THEME.'/home.php';
}else{
    require THEME.'/single.php';
}
