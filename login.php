<?php
//inicializa a sessão
session_start();

if(isset($_SESSION['cpf']))
  header("Location: index.php");

//chama o formulário de login
require 'forms/form_login.php';
?>
