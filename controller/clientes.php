<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 09:04
 */

include_once "class/Clientes.php";
include_once "class/Endereco.php";

$cli = new Clientes();
$end = new Endereco();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //cliente
    $idCliente = $_POST['id'];
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $fone = $_POST['fone'];
    // endereço
    $cep   = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $n = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['estado'];

    $now = date('Y-m-d H:i:s');
    if (!$idCliente){
        $data = $cli->savarClente($nome,$nasc,$cpf,$rg,$fone,$now);
        $end->savarEndereco($logradouro, $n, $bairro, $cidade,$uf, $cep, $data);
    }else{
        $data = $cli->alterarCliente($nome,$nasc,$cpf,$rg,$fone,$idCliente);
        $end->alterarEndereco($logradouro, $n, $bairro, $cidade,$uf, $cep, $idCliente);
    }

    if($data){
        echo "<script>location.href='../clientes.php?s=1';</script>";
    }else{
        echo "<script>location.href='../clientes.php?s=0';</script>";
    }
    exit();
} else {
    $clientes = $cli->getTodosClientes();

}

