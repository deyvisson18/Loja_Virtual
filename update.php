<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])):
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$preco = mysqli_escape_string($connect, $_POST['preco']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE clientes SET nome = '$nome', descricao = '$descricao', email = '$email', preco = '$preco' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	endif;
endif;