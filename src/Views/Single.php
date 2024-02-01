<div class="container">

    <article class="col-12 col-md-4 mb-2">
        <h2><?= $post->getTitle() ?></h2>
        <img class="img-fluid" src="/assets/uploads/<?= $post->getPicture() ?>" alt="<?= $post->getTitle() ?>">
        <p><?= $post->getContent() ?></p>
    </article>       

</div>