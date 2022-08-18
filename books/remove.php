<?php

// 1. inicia a sessão
session_start();

require '../database.php';
require '../flash_message.php';

// 2. obtém o id do livro a ser removido
$id = $_GET['id'];

// 3. remove o livro do banco
removeBook($id);

// 4. redireciona para a página inicial com aviso de remoção com sucesso
setFlashMessage('success', 'Livro removido com sucesso!', './index.php');
