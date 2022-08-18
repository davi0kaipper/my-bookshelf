<?php

// 1. inicia a sessão
session_start();
require '../redirect.php';

// 2. verifica se o usuário está logado
$user = $_SESSION['user'] ?? [];

// 3. caso o usuário não esteja logado, redireciona para a tela de login
if (empty($user)) {
    redirect('../login/index.php');
}

$saveButton = "Cadastrar";

// 4. exibe a view do cadastro de um livro
require 'form_view.php';
