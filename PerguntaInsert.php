<?php

class PerguntaInsert
{
    public $pergunta;
    public $tipo;

    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', '', 'projetopw');
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
        $sql = "INSERT INTO questoes VALUES (0, '$this->pergunta', '$this->tipo','$this->resposta')";
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
