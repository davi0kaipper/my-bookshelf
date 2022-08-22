<?php

require '../database.php';
require '../flash_message.php';
require '../redirect.php';
require '../validation.php';

// 1. inicia a sessão
session_start();

// 2. obtém os dados da requisição
$data = $_POST;

// 3. normaliza os dados para inserção na base de dados
$data = cleanData($data);

// 4. valida os dados do formulário
$validationError = validateEdit($data);

// 5. caso os dados não sejam válidos, redireciona para
// a tela de cadastro com mensagens de erro e os dados já preenchidos
if (! empty($validationError)) {
    $_SESSION['data'] = $data;
    $_SESSION['validation'] = $validationError;
    redirect('./edit.php');
}

// 6. normaliza os dados para atualizar  no banco de dados
$data = normalize($data);

// 7. adiciona o livro na base dados
editBook($data);

// 8. redireciona para a página de listagem com mensagem de sucesso
setFlashMessage('success', 'Livro alterado com sucesso!', './index.php');

function cleanData(array $data): array
{
    $data['genre'] = isset($data['genre']) ? $data['genre'] : [];
    return $data;
}

function normalize(array $data): array
{
    $data['genre'] = isset($data['genre']) ? implode('|', $data['genre']) : '';
    $data['is_national'] = $data['is_national'] ?? '0';
    return $data;
}
