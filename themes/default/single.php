<?php require 'header.php'; ?>

    <?php $note = get_single(); ?>

    <article id="post-<?php echo $slug ?>">

        <time>&mdash; <?php echo $note->updated() ?></time>
        <div><?php echo $note->html() ?></div>

    </article>

<?php require 'footer.php'; ?>
