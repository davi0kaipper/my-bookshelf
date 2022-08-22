<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost:8000/public/styles/main.css">
        <title>My Bookshelf</title>
    </head>
    <body>
        <div class="mb-3">
            <?php require '../partials/nav.php'; ?>
        </div>
        <div class="col-6 container-fluid">
            <div class="row mb-3">
                <label class="col-4 col-form-label" for="photo">Capa</label>
                <div class="col-8">
                    <img src="../upload/<?= $book["cover"]; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="title">Título</label>
                <div class="col-8">
                    <input type="text" name="title" id="title" value="<?= $book['name']; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="author">Autor(es)</label>
                <div class="col-8">
                    <input type="text" name="author" id="author" value="<?= $book['author']; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="genre">Gênero(s)</label>
                <div class="col-8">
                    <input type="text" name="genre" id="genre" value="<?= $book['genre']; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="publisher">Editora</label>
                <div class="col-8">
                    <input type="text" name="publisher" id="publisher" value="<?= $book['publisher']; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="pages">Número de páginas</label>
                <div class="col-8">
                    <input type="text" name="pages" id="pages" value="<?= $book['number_of_pages']; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="is_national">Publicação Nacional</label>
                <div class="col-8">
                    <input type="text" name="is_national" id="is_national" value="<?= $book['is_national'] ? 'Sim' : 'Não'; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-4 col-form-label" for="description">Descrição</label>
                <div class="col-8">
                    <textarea name="description" id="description" rows="4" class="form-control" readonly><?= $book['description']; ?></textarea>
                </div>
            </div>

            <div class="row d-flex">
                <a class="btn btn-primary w-50 mx-auto" href="./index.php" role="button">Voltar</a>
            </div>
        </div>
    </body>
</html>
