<?php

require '../database.php';
require '../flash_message.php';
require '../redirect.php';
require '../validation.php';

// 1. inicia a sessão
session_start();

// 2. obtém os dados da requisição
$data = $_POST;
$data['cover'] = $_FILES['cover'];

// 3. normaliza os dados para inserção na base de dados
$data = cleanData($data);

// 4. valida os dados do formulário
$validationError = validateCreate($data);

// 5. caso os dados não sejam válidos, redireciona para
// a tela de cadastro com mensagens de erro e os dados já preenchidos
if (! empty($validationError)) {
    $_SESSION['data'] = $data;
    $_SESSION['validation'] = $validationError;
    redirect('./create.php');
}

// 6. realiza o upload da imagem
$extension = explode('.', $data['cover']['name'])[1];
$hash = md5(rand());
$filename = $hash . '.' . $extension;
move_uploaded_file($data['cover']['tmp_name'], '../upload/' . $filename);
$data['filename'] = $filename;

// 7. normaliza os dados para salvar no banco de dados
$data = normalize($data);

// 8. adiciona o livro na base dados
createBook($data);

// 9. redireciona para a página de listagem com mensagem de sucesso
setFlashMessage('success', 'Livro cadastrado com sucesso!', './index.php');

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
