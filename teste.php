<?php
session_start();

$_SESSION['cpf'] = "";
$_SESSION['nome'] = "";
$_SESSION['usuario'] = "";
$_SESSION['email'] = "";
$_SESSION['data_nascimento'] = "";
$_SESSION['telefone'] = "";

header("Location: cadastro.php");
?>
