<?php
/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 10:46
 */
include_once "class/Clientes.php";
$id = $_GET['id'];
$status = false;
if(isset($_GET['id'])){
    $cli = new Clientes();
    $res = $cli->removerCliente($id);
    if($res){
        $status = true;
    }
    echo json_encode(array('success' => $status, 'data'=>$res));
}
