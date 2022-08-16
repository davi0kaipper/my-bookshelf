<?php

// 1. inicia a sessão
session_start();

require '../flash_message.php';

// 2. obtém a flashMessage
$flashMessage = getFlashMessage();

// 3. exibe a view da lista de livros
require 'index_view.php';