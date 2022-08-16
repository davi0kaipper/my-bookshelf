<?php

session_start();
require '../redirect.php';

$user = $_SESSION['user'] ?? [];

if (empty($user)) {
    redirect('../login/index.php');
}

$saveButton = "Voltar";

require 'show_view.php';