<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx' crossorigin='anonymous'>
    <link rel="stylesheet" href="http://localhost:8000/public/styles/main.css">
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>My Bookshelf - Listagem de Livros</title>
</head>
<body>
    <?php require '../partials/nav.php'; ?>
    <div class='container'>
        <div class='row mt-3'>
            <div class='col'>
                <div class='mb-3'>
                    <a href='./create.php' class='btn btn-primary'>Cadastrar</a>
                    <button id='remove_selected' class='btn btn-secondary'>Remover selecionados</button>
                    <form action="./batch.php" id='remove_form' method="post">
                        <input type='hidden' name='selected' id='selected' value=''>
                    </form>
                </div>
                <?php if (! empty($flashMessage)) : ?>
                    <div class='alert alert-<?= $flashMessage['type']; ?> mb-3 text-center'>
                        <?= $flashMessage['message']; ?>
                    </div>
                <?php endif ?>
                <table class='table'>
                    <thead>
                        <tr>
                            <th><input type='checkbox' id='select_all'></th>
                            <th>Capa</th>
                            <th>Título</th>
                            <th>Autor(es)</th>
                            <th>Gênero</th>
                            <th>Editora</th>
                            <th>Nº de Páginas</th>
                            <th style='width: 200px'>Descrição</th>
                            <th style='width: 200px'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($books) !== 0) : ?>
                            <?php foreach($books as $book): ?>
                                <?php $book['genre'] = implode(', ', explode('|', $book['genre'])); ?>
                                <tr>
                                    <td><input type='checkbox' class='select_item' value='<?= $book['id'] ?? ''; ?>'></td>
                                    <td><img src='../upload/<?= $book['cover']; ?>'></td>
                                    <td> <?= $book['name'] ?? ''; ?> </td>
                                    <td> <?= $book['author'] ?? ''; ?> </td>
                                    <td> <?= $book['genre'] ?? ''; ?> </td>
                                    <td> <?= $book['publisher'] ?? ''; ?> </td>
                                    <td> <?= $book['number_of_pages'] ?? ''; ?> </td>
                                    <td> <?= $book['description'] ?? ''; ?> </td>
                                    <td>
                                        <a href='./show.php?id=<?= $book['id']; ?>'>Ver</a>
                                        <a href='./edit.php?id=<?= $book['id']; ?>'>Editar</a>
                                        <a href='./remove.php?id=<?= $book['id']; ?>'>Remover</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan='9' class='text-center'>Nenhum livro encontrado.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
                <?php require '../partials/pagination.php'; ?>
            </div>
        </div>
    </div>
    <script src="../public/scripts/main.js"></script>
</body>
</html>
