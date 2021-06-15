<div class="container-fluid bg-light py-5 text-center section-title">
    <h2 class="text-danger">Tous les articles</h2>
    <p class="font-weight-bold mb-0">Mes publications</p>
</div>

<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-12 col-sm-12">
            <?php foreach ($posts as $post) : ?>

                <div class="card mb-4 mt-4">
                        <img class="card-img-top" src="contenu\img\post-sample-image.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title"><?= $post->titre ?></h2>
                            <p class="card-text"><?= $post->chapo ?></p>
                            <p class="card-text"><?= $post->auteur ?></p>
                            <a href="/posts/lire/<?= $post->id ?>" class="btn btn-primary">Lire la suite &rarr;</a>
                        </div>
                        
                    </div>

            <?php endforeach; ?>
        </div>