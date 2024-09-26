<h1 class="text-center mt-5">Ajouter un article</h1>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="InputTitle" class="form-label">Titre</label>
            <input type="text" class="form-control" id="InputTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="InputPicture" class="form-label">Image</label>
            <input type="file" class="form-control" id="InputPicture" name="picture">
        </div>
        <div class="mb-3">
            <label for="InputContent" class="form-label">Contenu</label>
            <textarea class="form-control" id="InputContent" name="content"></textarea>
        </div>
        <button class="btn btn-primary mt-3" type="submit">Soumettre l'article</button>
    </form>
</div>   