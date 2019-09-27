<?php

config('title');

function config(String $value){
    $config = json_decode( file_get_contents(__DIR__.'/../config.json'), 1);

    if( isset($config[$value] )){
        return $config[$value];
    }else{
        return false;
    }
}

function get_notes(){
    $directory = "./notes";
    $files = glob($directory . "/*.md");

    $notes = [];

    foreach($files as $file){
        $html = new Parsedown();
        $content = file_get_contents($file);
        $filename = explode('/', $file);
        $filename = substr(end($filename), 0, -3);
        $slug = slugify($filename);

        $note = new Note([
            'updated' => filemtime($file),
            'slug' => $slug,
            'content' => $html->text($content)
        ]);

        $notes[$slug] = $note;
    }

    return $notes;
}

function get_note($slug){
    $notes = get_notes();
    if( isset($notes[$slug]) ){
        return $notes[$slug];
    }else {
        return false;
    }
}

function get_single(){
    return get_note(SLUG);
}

function is_home(){
    return $_SERVER['REQUEST_URI'] == '/';
}

/**
* Thanks to https://stackoverflow.com/a/2955878
* @param  String $text Raw text to convert
* @return String       Converted text to slug
*/
function slugify($text){
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
