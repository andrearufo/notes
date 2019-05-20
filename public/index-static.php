<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <title>Rufo's Notes</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.png" type="image/png" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.12-pre/lodash.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://raw.githack.com/andrearufo/nova.css/master/css/nova.min.css">

</head>
<body>

    <?php

    $root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $notes = json_decode( file_get_contents($root.'/api.php'), 1);

    ?>

    <header>
        <div class="container">

            <nav>
                <h5>From the desk of Andrea Rufo</h5>

                <form method="get">
                    <input type="search" name="s" v-model="search" placeholder="Cerca...">
                </form>
            </nav>

        </div>
    </header>

    <section>
        <div class="container">

            <!-- <div v-if="search">
                <h3>Ricerca per <em>{{ search }}</em></h3>
                <p>Trovati {{ list.length }} risultati</p>
                <hr>
            </div> -->

            <?php foreach ($notes as $note): ?>
                <article>
                    <div>
                        <?php echo $note['html'] ?>
                    </div>
                    <div>
                        <small>Ultima modifica <?php echo date('d M Y', $note['updatetime']) ?>, <a href="<?php echo $note['file'] ?>" download>Download the .md file</a></small>
                    </div>
                    <hr>
                </article>
            <?php endforeach; ?>

        </div>
    </section>

</body>
</html>
