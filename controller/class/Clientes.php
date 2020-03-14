<?php

/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 11/03/2020
 * Time: 08:43
 */
include_once "Conexao.php";
class Clientes extends Conexao
{
    private $con;

    public function __construct() {
        $this->con = parent::getConnection();
    }

    public function savarClente($nome ,$dataNasc, $cpf, $rg, $fone, $now){
        $status = 1;
        try{
            $query = "INSERT INTO clientes ( nome, nascimento, cpf, rg, fone, status, cadastro) VALUES (?,?,?,?,?,?,?)";
            $sql = $this->con->prepare($query);
            $sql->bind_param(
                'sssssis',
                $nome,
                $dataNasc,
                $cpf,
                $rg,
                $fone,
                $status,
                $now
            );

            $sql->execute();
            $data = $sql->insert_id;
        } catch (Exeception $e){
            print_r($e);
            $data = false;
        }
        return $data;
    }

    public function savarEnderecoClente(){

    }

    public function alterarCliente ($nome,$nasc,$cpf,$rg,$fone, $idCliente){
        try{
            $query = "UPDATE clientes 
                    SET nome=?, nascimento=?, cpf=?, rg=?, fone=? 
                    where id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('sssssi',
                $nome,
                $nasc,
                $cpf,
                $rg,
                $fone,
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

    public function removerCliente($id){
        $status = 0;
        try{
            $query = "UPDATE clientes 
                    SET status = ? 
                    where id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('ii',
                $status,
                $id
            );
            $data =$sql->execute();
        }
        catch(Exception $Erro){
            print_r($Erro->getMessage());
            $data=false;
        }
        return $data;

    }

    public function getCliente($id){
        try{
            $query = "SELECT c.id, c.nome, c.nascimento, c.cpf, c.rg, c.fone,e.id as end_id, e.logradouro, e.n, e.bairro,
                          e.cidade, e.uf, e.cep, e.id_cliente 
                          FROM clientes as c
                          LEFT JOIN endereco as e ON (c.id = e.id_cliente) 
                          WHERE c.id = ?";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i',$id);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }
        catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;

    }

    public function getTodosClientes(){
        $status = 1;
        try{
            $query = "SELECT c.id,c.nome,c.nascimento,c.cpf,c.rg,c.fone 
                    FROM clientes as c 
                    WHERE c.status = ?
                    ORDER BY c.id DESC";
            $sql = $this->con->prepare($query);
            $sql->bind_param('i',$status);
            $sql->execute();
            $result = $sql->get_result();
            $dados = $result->fetch_all(MYSQLI_ASSOC);

        }
        catch (Exception $Erro){
            print_r($Erro->getMessage());
            $dados = null;
        }
        return $dados;

    }
}