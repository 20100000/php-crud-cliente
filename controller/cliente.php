<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 16:19
 */

include_once "class/Clientes.php";

$cli = new Clientes();

$id = $_GET['id'];

$dados = $cli->getCliente($id);

echo json_encode(array('success' => true, 'data'=>$dados));