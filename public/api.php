<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require __DIR__ . '/../vendor/autoload.php';

$directory = "./notes";
$files = glob($directory . "/*.md");

$notes = [];
foreach($files as $file){

    $Parsedown = new Parsedown();
    $content = file_get_contents($file);

    $filename = explode('/', $file);
    $filename = end($filename);

    $notes[] = [
        'updatetime' => filemtime($file),
        'update' => date('d M Y', filemtime($file)),
        'file' => $filename,
        'link' => 'notes/'.$file,
        'content' => $content,
        'html' => $Parsedown->text($content)
    ];

}

header('Content-Type: application/json');
echo json_encode($notes);
