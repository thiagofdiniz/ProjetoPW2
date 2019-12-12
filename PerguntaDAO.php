<?php

require 'config.php';

class PerguntaDAO
{
    public $pergunta;
    public $tipo;
    private $id;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM questoes WHERE idPergunta=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: questoes');
        } else {
            echo $this->con->error;
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO questoes VALUES (0, '$this->pergunta', '$this->tipo')";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: \questoes");
        } else {
            echo $this->con->error;
        }
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
    public function buscarPorId()
    {
        $sql = "SELECT * FROM questoes WHERE idPergunta=$this->id";
        $rs = $this->con->query($sql);
        if ($linha = $rs->fetch_object()) {
            $this->texto = $linha->texto;
            $this->tipo = $linha->tipo;
        }
    }
}
