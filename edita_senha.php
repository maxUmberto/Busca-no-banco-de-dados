<?php
//inicializa a sessão
session_start();

if(!isset($_SESSION['cpf']))
  header("Location: login.php");

//chama o formulário de login
require 'forms/form_edita_senha.php';
?>
