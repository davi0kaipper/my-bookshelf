<?php

require '../database.php';
require '../flash_message.php';

// 1. inicia a sessão
session_start();

// 2. obtém os ids dos livros a serem removidos
$selected = $_POST['selected'];

// 3. transforma a lista de ids (string) em um array
$selectedItems = explode(',', $selected);

// 4. remove os livros selecionados da base de dados
removeAll($selectedItems);

// 5. redireciona para a tela de listagem com mensagem de sucesso
setFlashMessage('success', 'Livro(s) removido(s) com sucesso!', './index.php');
