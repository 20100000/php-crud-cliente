<?php

/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 16:45
 */
include_once "Conexao.php";

class Endereco extends Conexao
{
    private $con;

    public function __construct() {
        $this->con = parent::getConnection();
    }

    public function alterarEndereco($logradouro, $numero, $bairro, $cidade, $uf, $cep, $idCliente){
        try{
            $query = "UPDATE endereco 
                    SET logradouro=?,n=?,bairro=?,cidade=?,uf=?,cep=? 
                    where id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('ssssssi',
                $logradouro,
                $numero,
                $bairro,
                $cidade,
                $uf,
                $cep,
                $idCliente
            );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            print_r($Erro->getMessage());
            $data=false;
        }
        return $data;
    }
    public function savarEndereco($logradouro, $numero, $bairro, $cidade, $uf, $cep, $idCliente){

        try{
            $query = "INSERT INTO endereco (logradouro, n, bairro, cidade, uf, cep, id_cliente) VALUES (?,?,?,?,?,?,?)";
            $sql = $this->con->prepare($query);
            $sql->bind_param(
                'ssssssi',
                $logradouro,
                $numero,
                $bairro,
                $cidade,
                $uf,
                $cep,
                $idCliente
            );

            $sql->execute();
            $data = $sql->insert_id;
        } catch (Exeception $e){
            print_r($e);
            $data = false;
        }
        return $data;
    }

}