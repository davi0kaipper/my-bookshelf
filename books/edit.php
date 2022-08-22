<?php

require '../redirect.php';
require '../database.php';
require '../checking_functions.php';

// 1. inicia a sessão
session_start();

// 2. verifica se o usuário está logado
$user = $_SESSION['user'] ?? [];

// 3. caso o usuário não esteja logado, redireciona para a tela de login
if (empty($user)) {
    redirect('../login/index.php');
}

// 4. obtém o id do livro a ser alterado
$id = $_GET['id'];

// 5.
$hasSessionData = ! empty($_SESSION['data']);
$data = $hasSessionData ? $_SESSION['data'] : getBook($id);
$validation = $hasSessionData ? $_SESSION['validation'] : [];

if (empty($_SESSION['data'])) {
    // 5. obtém os dados do livro
    $data = getBook($id);
    $validation = [];

    // 7. organiza os dados para apresentação
    // 6. caso não exista o livro com id informado, redireciona à listagem
    if (! $hasSessionData && empty($data)) {
        redirect('../books/index.php');
    }

}else{
    $data = $_SESSION['data'];
    $validation = $_SESSION['validation'] ?? [];

    unset($_SESSION['data']);
    unset($_SESSION['validation']);
}

// 9. define formulário e texto do botão de submissão
$formAction = './update.php';
$formSubmit = 'Alterar';
$page = 'edit';

// 10. exibe a view da alteração de um livro
require 'edit_view.php';
