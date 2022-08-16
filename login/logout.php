<?php

// 1. inicia uma sessão
session_start();

// 2. remove os dados do usuário da sessão
session_destroy();

// 3. direciona a uma página
header("Location: index.php");
