<?php
session_start();
include_once "class/Acesso.php";
$con = new Acesso();

if(empty($_POST['us']) || empty($_POST['pw'])) {
	header('Location: ../index.php');
	exit();
}
$us = trim($_POST['us']);
$pw = trim($_POST['pw']);
$row = $con->login($us,$pw);
if($row) {
	$_SESSION['id'] = $row[0][0];
	$_SESSION['nome'] = $row[0][1];

	header('Location: ../clientes.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}