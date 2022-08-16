<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>My Bookshelf</title>
    </head>
    <body>
        <div class="mb-3">
            <?php require '../nav.php'; ?>
        </div>

        <div class="col-6 container-fluid">
            <div class="alert alert-danger mb-3 text-center">
                Dados inválidos. Corrija as entradas.
            </div>
            <form action="store.php" method="post" enctype="multipart/form-data">

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="cover">Capa</label>
                    <div class="col-8">
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="title">Título</label>
                    <div class="col-8">
                        <input type="text" name="title" id="title" value="<?= $data["title"] ?? ""; ?>" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="author">Autor(es)</label>
                    <div class="col-8">
                        <input type="text" name="author" id="author" value="<?= $data["author"] ?? ""; ?>" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="pages">Número de páginas</label>
                    <div class="col-8">
                        <input type="number" name="pages" id="pages" value="<?= $data["pages"] ?? ""; ?>" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        Gênero(s)
                    </div>
                    <div class="col-8">
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="action" value="Ação" class="form-check-input">
                            <label class="form-check-label" for="action">Ação</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="academic" value="Acadêmico" class="form-check-input">
                            <label class="form-check-label" for="academic">Acadêmico</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="adventure" value="Aventura" class="form-check-input">
                            <label class="form-check-label" for="adventure">Aventura</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="science_fiction" value="Ficção Científica" class="form-check-input">
                            <label class="form-check-label" for="science_fiction">Ficção Científica</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="fantasy" value="Fantasia" class="form-check-input">
                            <label class="form-check-label" for="fantasy">Fantasia</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="religion" value="Religião" class="form-check-input">
                            <label class="form-check-label" for="religion">Religião</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre[]" id="horror" value="Terror" class="form-check-input">
                            <label class="form-check-label" for="horror">Terror</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label">Publicação Nacional</label>
                    <div class="col-8">
                        <div class="form-check">
                            <input type="radio" name="is_national" id="yes" value="yes" class="form-check-input">
                            <label class="form-check-label" for="yes">Sim</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="is_national" id="no" value="no" class="form-check-input">
                            <label class="form-check-label" for="no">Não</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="publisher">Editora</label>
                    <div class="col-8">
                        <input type="text" name="publisher" id="publisher" value="<?= $data["publisher"] ?? ""; ?>" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-4 col-form-label" for="description">Descrição</label>
                    <div class="col-8">
                        <textarea name="description" id="description" rows="4" class="form-control"><?= $data["description"] ?? ""; ?></textarea>
                    </div>
                </div>

                <div class="row d-flex">
                    <button type="submit" class="btn btn-primary w-50 mx-auto"><?= $saveButton ?></button>
                </div>
            </form>
        </div>
    </body>
</html>
