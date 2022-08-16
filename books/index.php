<?php

// 1. inicia a sessão
session_start();
require '../redirect.php';

// 2. verifica se existe um usuário logado na página
$user = $_SESSION['user'] ?? [];

if (empty($user)) {
    redirect('../login/index.php');
}

// 3. obtém a flashMessage
require '../flash_message.php';
$flashMessage = getFlashMessage();

// 4. exibe a view da lista de livros
require 'index_view.php';