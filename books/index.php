<?php

require '../redirect.php';
require '../database.php';
require '../pagination.php';

// 1. inicia a sessão
session_start();

// 2. verifica se existe um usuário logado na página
$user = $_SESSION['user'] ?? [];

// 3. caso o usuário não esteja logado, redireciona para a tela de login
if (empty($user)) {
    redirect('../login/index.php');
}

// 4. obtém a flash message
require '../flash_message.php';
$flashMessage = getFlashMessage();

// 5. obtém os dados da paginação
$page = $_GET['page'] ?? 1;
$size = $_GET['size'] ?? 10;
$total = getTotal();

// 6. obtém os dados da tabela
$books = getBooks($page, $size);

// 7. obtém os dados utilizados na paginação
$pagination = pagination($page, $size, $total);

// 8. exibe a view da lista de livros
require 'index_view.php';
