<?php

/**
* Return the value required set in the config file
* @param  String $value The item in the config file
* @return String The value setted in the config
*/
function config(String $value){
    $config = json_decode( file_get_contents(__DIR__.'/../config.json'), 1);

    if( isset($config[$value] )){
        return $config[$value];
    }else{
        return false;
    }
}

/**
* The list of the notes converted
* @return Array List of the notes
*/
function get_notes(){
    $directory = "./notes";
    $files = glob($directory . "/*.md");

    $notes = [];

    foreach($files as $file){
        $filename = explode('/', $file);
        $filename = substr(end($filename), 0, -3);

        $content = file_get_contents($file);
        $updated = filemtime($file);
        $slug = slugify($filename);

        $note = new Note([
            'updated' => $updated,
            'slug' => $slug,
            'content' => $content
        ]);

        $notes[$slug] = $note;
    }

    return $notes;
}

/**
* The single note by his slug
* @param  String $slug The slug of the note
* @return Note The single note
*/
function get_note($slug){
    $notes = get_notes();
    if( isset($notes[$slug]) ){
        return $notes[$slug];
    }
    return null;
}
/**
* Return the single note in the single page
* @return Note The note requested
*/
function get_single(){
    return get_note(SLUG);
}

/**
* Determine if is in home page
* @return Bool The check
*/
function is_home(){
    return $_SERVER['REQUEST_URI'] == '/';
}

/**
* Thanks to https://stackoverflow.com/a/2955878
* @param  String $text Raw text to convert
* @return String Converted text to slug
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

/**
* https://stackoverflow.com/q/3299033
* @param  [type] $string  [description]
* @param  [type] $tagname [description]
* @return [type]          [description]
*/
function getTextBetweenTags($string, $tagname){
    $pattern = "/<$tagname ?.*>(.*)<\/$tagname>/";
    preg_match($pattern, $string, $matches);
    return $matches[1];
}
