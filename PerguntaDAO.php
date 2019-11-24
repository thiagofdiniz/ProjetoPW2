<?php
require 'config.php';

class PerguntaDAO
{
    public $pergunta;
    public $tipo;

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
            header('Location: questoes.php');
        } else {
            echo $this->con->error;
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO questoes VALUES (0, '$this->pergunta', '$this->tipo')";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: questoes.php');
        } else {
            echo $this->con->error;
        }
    }

    public function buscar()
    {
        $sql = 'SELECT * FROM questoes';
        $rs = $this->con->query($sql);
        $listaDeUsuarios = array();
        while ($lista = $rs->fetch_object()) {
            $listaDeUsuarios[] = $lista;
        }

        return $listaDeUsuarios;
    }

    
}
