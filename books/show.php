<?php

require '../redirect.php';
require '../database.php';

// 1. inicia a sessão
session_start();

// 2. obtém os dados do usuário da sessão
$user = $_SESSION['user'] ?? [];

// 3. caso o usuário não esteja logado, redireciona para a listagem
if (empty($user)) {
    redirect('../login/index.php');
}

// 4. obtém o id do livro selecionado
$id = $_GET['id'];

// 5. consulta os dados do livro no banco
$book = getBook($id);

// 6. caso não exista o livro com id informado, redireciona à listagem
if (empty($book)) {
    redirect('../books/index.php');
}

// 7. transforma os dados para apresentação
$book['genre'] = implode(', ', $book['genre']);

// 8. apresenta a view da apresentação do livro
require 'show_view.php';