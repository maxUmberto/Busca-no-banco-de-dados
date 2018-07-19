<?php
//inicializa a sessão
session_start();

//destroi a variável que armazena o cpf
unset($_SESSION['cpf']);

//destroi toda a sessão
session_destroy();

//redireciona para a página de login
header('Location: login.php');
?>
