<?php require 'header.php'; ?>

    <?php $note = get_single(); ?>

    <article id="post-<?php echo $slug ?>">

        <h1><?php echo $note->title() ?></h1>
        <time><?php echo $note->updated() ?></time>
        <div><?php echo $note->content() ?></div>

    </article>

<?php require 'footer.php'; ?>
