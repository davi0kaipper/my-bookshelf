<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        th,td {
            text-align:center;
        }
    </style>
    <title>Títulos</title>
</head>
<body>
    <?php require '../nav.php'; ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="mb-3">
                    <a href="./create.php" class="btn btn-primary">Cadastrar</a>
                    <a href="#" class="btn btn-secondary">Remover selecionados</a>
                </div>
                <div class="alert alert-success mb-3 text-center" role="alert">
                    Título cadastrado com sucesso!
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td><input type="checkbox" class="select_all_items"></td>
                            <th>Capa</th>
                            <th>Título</th>
                            <th>Autor(es)</th>
                            <th>Gênero</th>
                            <th>Editora</th>
                            <th>Nº de Páginas</th>
                            <th style="width: 200px">Descrição</th>
                            <th style="width: 200px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="item_id" option_id="1"></td>
                            <td><img src="../images/example-cover.png"></td>
                            <td>Rio de Memórias</td>
                            <td>Wan Shi Tang</td>
                            <td>Fantasia</td>
                            <td>Valhalla</td>
                            <td>413</td>
                            <td>A história do velejar mais instigante já descrito.</td>
                            <td>
                                <a href="./show.php">Ver</a>
                                <a href="./edit.php">Editar</a>
                                <a href="#">Remover</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link">Anterior</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Próxima</a>
            </li>
        </ul>
        </nav>
    </div>
</body>
</html>

