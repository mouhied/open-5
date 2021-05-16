<h1>Liste des posts</h1>

<?php foreach ($posts as $post) : ?>

    <h2 ><?= $post->titre ?></h2>
    <h5><?= $post->chapo ?></h5>
    <h3 ><?= $post->create_at ?></h3>
    <h4><?= $post->auteur ?></h4>


<?php endforeach; ?>


