<?php

require __DIR__ . '/../vendor/autoload.php';

$directory = "./notes";
$files = glob($directory . "/*.md");

$notes = [];
foreach($files as $file){

    $Parsedown = new Parsedown();
    $content = file_get_contents($file);

    $notes[] = [
        'updatetime' => filemtime($file),
        'update' => date('d M Y', filemtime($file)),
        'file' => 'notes/'.$file,
        'content' => $content,
        'html' => $Parsedown->text($content)
    ];

}

header('Content-Type: application/json');
echo json_encode($notes);
