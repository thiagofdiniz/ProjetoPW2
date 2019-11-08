<?php

class UsuarioDAO
{
    public $nome;
    public $email;
    public $senha;

    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect('localhost', 'root', 'etecia', 'projetopw');
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM usuario WHERE idUsuario=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: usuarios.php');
        } else {
            echo $this->con->error;
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO usuario VALUES (0, '$this->nome', '$this->email', md5('$this->senha'))";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: usuarios.php');
        } else {
            echo $this->con->error;
        }
    }

    public function buscar()
    {
        $sql = 'SELECT * FROM usuario';
        $rs = $this->con->query($sql);
        $listaDeUsuarios = array();
        while ($lista = $rs->fetch_object()) {
            $listaDeUsuarios[] = $lista;
        }

        return $listaDeUsuarios;
    }

    public function trocarsenha($id, $senha)
    {
        $sql = "UPDATE usuario SET senha=md5($senha)WHERE idUsuario=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: usuarios.php');
        } else {
            echo $this->con->error;
        }
    }

    public function trocarnome($id, $nome)
    {
        $sql = "UPDATE usuario SET nome='$nome' WHERE idUsuario=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            header('Location: usuarios.php');
        } else {
            echo $this->con->error;
        }
    }
}
