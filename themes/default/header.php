<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

    <title><?php echo is_home() ? config('title') : config('title').' - '.SLUG ?></title>

    <link rel="stylesheet" href="<?php echo THEME ?>/dist/styles/style.css">
    <script src="<?php echo THEME ?>/dist/scripts/script.js" charset="utf-8"></script>

</head>
<body>


    <header>
        <div class="container">

            <a href="<?php echo config('url') ?>"><?php echo config('title') ?></a>

        </div>
    </header>

    <main>
        <div class="container">
