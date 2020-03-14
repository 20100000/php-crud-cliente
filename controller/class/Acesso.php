<?php

/**
 * Created by IntelliJ IDEA.
 * User: tiago
 * Date: 19/12/2019
 * Time: 10:55
 */
include_once "Conexao.php";
class Acesso extends Conexao
{
    private $con;

    public function __construct() {
        $this->con = parent::getConnection();
    }

    public function login($us, $pw){
        $query = "SELECT id, nome FROM login WHERE usuario = ? AND senha = ?";
        $sql = $this->con->prepare($query);
        $sql->bind_param('ss', $us, $pw);
        $sql->execute();
        $result = $sql->get_result();
        $dados = $result->fetch_all();
        $this->con->close();
        return $dados;
    }

    function closeConection(){
        $this->con->close();
        $this->con = Null;
    }
}