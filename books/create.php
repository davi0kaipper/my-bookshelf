<?php

session_start();
require '../redirect.php';

$user = $_SESSION['user'] ?? [];

if (empty($user)) {
    redirect('../login/index.php');
}

$saveButton = "Cadastrar";

require 'form_view.php';
