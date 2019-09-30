<?php require 'header.php'; ?>

    <?php foreach (get_notes() as $slug => $note): ?>

        <article id="post-<?php echo $note->slug() ?>">

            <time>&mdash; <?php echo $note->updated() ?></time>
            <h1><?php echo $note->title() ?></h1>
            <p><?php echo $note->excerpt() ?></p>
            <a href="<?php echo $note->permalink() ?>"><?php echo _('Read more') ?> &rarr;</a>

        </article>

    <?php endforeach; ?>

<?php require 'footer.php'; ?>
