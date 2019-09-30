<?php

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
