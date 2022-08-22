<?php

require '../redirect.php';
require '../checking_functions.php';

// 1. inicia a sessão
session_start();

// 2. verifica se o usuário está logado
$user = $_SESSION['user'] ?? [];

// 3. caso o usuário não esteja logado, redireciona para a tela de login
if (empty($user)) {
    redirect('../login/index.php');
}

// 4. obtém os dados do formulário e as mensagens de validação, caso haja erro
$data = $_SESSION["data"] ?? [];
$validation = $_SESSION["validation"] ?? [];

unset($_SESSION["data"]);
unset($_SESSION["validation"]);

// 5. define formulário e texto do botão de submissão
$formAction = "./store.php";
$formSubmit = "Cadastrar";
$page = 'create';

// 6. exibe a view do cadastro de um livro
require 'create_view.php';
