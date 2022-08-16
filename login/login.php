<?php

// 1. inicia a sessão
session_start();

include '../flash_message.php';
include '../database.php';

// 2. obtém os dados do login
$data = $_POST;

// 3. limpa os dados de email e senha
$email = clean($data['email']);
$password = clean($data['password']);

// 4. verifica se o email está vazio. caso sim, redireciona à tela de login com mensagem de erro
if (empty($email)) {
    setFlashMessage('danger', 'Informe um email para realização do login.', './index.php');
}

// 5. verifica se a senha está vazia. caso sim, redireciona à tela de login com mensagem de erro
if (empty($password)) {
    setFlashMessage('danger', 'Informe uma senha para realização do login.', './index.php');
}

// 6. verifica credenciais
$user = verifyLogin($email, $password);

if (empty($user)) {
    setFlashMessage('danger', 'As credenciais utilizadas são inválidas.', './index.php');
}

// 7. guarda os dados do user na sessão e redireciona para a tela de listagem
$_SESSION['user'] = $user;
header('Location: ../books/index.php');
