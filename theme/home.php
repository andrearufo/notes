<?php require 'header.php'; ?>

    <?php foreach (get_notes() as $slug => $note): ?>

        <article id="post-<?php echo $slug ?>">

            <time><?php echo $note->updated() ?></time>
            <div><?php echo $note->excerpt() ?></div>
            <a href="<?php echo $note->permalink() ?>"><?php echo _('Read more...') ?></a>

        </article>

    <?php endforeach; ?>

<?php require 'footer.php'; ?>
