<div class="container">

    <div class="row">
        <?php foreach($posts as $post){?>
            <article class="col-12 col-md-4 mb-2">
                <h2><?= $post->getTitle() ?></h2>
                <img class="img-fluid" src="assets/uploads/<?= $post->getPicture() ?>" alt="<?= $post->getTitle() ?>">
                <a href="single/<?= $post->getIdPost() ?>" class="btn btn-primary">Voir l'article</a>
            </article>       
        <?php } ?>
    </div>

</div>