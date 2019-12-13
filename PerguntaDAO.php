<?php

require 'config.php';

class PerguntaDAO
{
    public $pergunta;
    public $tipo;
    public $id;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM questoes WHERE idPergunta=$id";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão excluida";
        } else {
            $_SESSION["danger"] = "Erro ao excluir questão";
        }
        header("Location: \questoes");
    }

    public function buscar()
    {
        $sql = 'SELECT * FROM questoes';
        $rs = $this->con->query($sql);
        $lista = array();
        while ($linha = $rs->fetch_object()) {
            $lista[] = $linha;
        }

        return $lista;
    }

    public function inserir()
    {
        $sql = "INSERT INTO questoes VALUES (0, '$this->pergunta', '$this->tipo')";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão inserida";
        } else {
            $_SESSION["danger"] = "Erro ao inserir questão";
        }
        header("Location: \questoes");
    }


    public function buscarPorId()
    {
        $sql = "SELECT * FROM questoes WHERE idPergunta=$this->id";
        $rs = $this->con->query($sql);
        if ($linha = $rs->fetch_object()) {
            $this->pergunta = $linha->pergunta;
            $this->tipo = $linha->tipo;
        }
    }
    public function editar()
    {
        $sql = "UPDATE questoes SET pergunta='$this->texto', tipo='$this->tipo' WHERE idPergunta=$this->id";
        $rs = $this->con->query($sql);
        echo $sql;
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão editada";
        } else {
            $_SESSION["danger"] = "Erro ao editar questão";
        }
        header("Location: \questoes");
    }
}
