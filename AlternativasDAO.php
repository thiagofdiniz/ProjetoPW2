<?php

require 'config.php';

class AlternativasDAO
{
    public $id;
    public $texto;
    public $idPergunta;
    public $correta;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function apagar($id, $idPergunta)
    {
        $sql = "DELETE FROM alternativas WHERE idAlternativa=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: \alternativas?questao=$idPergunta");
        } else {
            echo $this->con->error;
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO alternativas VALUES (0, $this->idPergunta, '$this->texto', '$this->correta')";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: \alternativas?questao=$this->idPergunta");
        } else {
            echo $this->con->error;
        }
    }

    public function editar()
    {
        $sql = "UPDATE alternativas SET texto='$this->texto', correta='$this->correta' WHERE idAlternativa=$this->id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: \alternativas?questao=$id");
        } else {
            echo $this->con->error;
        }
    }

    public function buscar()
    {
        $sql = "SELECT * FROM alternativas WHERE idPergunta=$this->idPergunta";
        $rs = $this->con->query($sql);
        $lista = array();
        while ($linha = $rs->fetch_object()) {
            $lista[] = $linha;
        }

        return $lista;
    }
}