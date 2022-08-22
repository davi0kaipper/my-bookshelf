<?php

require '../flash_message.php';

// 1. inicia a sessão
session_start();

// 2. obtém a flashMessage
$flashMessage = getFlashMessage();

// 3. exibe a view da lista de livros
require 'index_view.php';