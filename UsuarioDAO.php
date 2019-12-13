<?php

require 'config.php';
class UsuarioDAO
{
    public $id;
    public $nome;
    public $email;
    public $senha;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    public function apagar($id)
    {
        $sql = "DELETE FROM usuario WHERE idUsuario=$id";
        $rs = $this->con->query($sql);
        if ($rs) {
            session_start();
            $_SESSION['success'] = 'Usuário excluído';
            header('Location: /usuarios');
        } else {
            session_start();
            $_SESSION['danger'] = 'Erro ao excluir.';
            header('Location: /usuarios');
        }
    }

    public function inserir()
    {
        $sql = "INSERT INTO usuario VALUES (0, '$this->nome', '$this->email', md5('$this->senha'))";
        $rs = $this->con->query($sql);
        if ($rs) {
            session_start();
            $_SESSION['success'] = 'Sucesso';
            header('Location: /usuarios');
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
        $sql = "UPDATE usuario SET senha=md5('$senha')WHERE idUsuario=$id";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Senha alterada";
        } else {
            $_SESSION["danger"] = "Erro ao alterar senha";
        }
        header("Location: \usuarios");
    }

    public function trocarnome($id, $nome)
    {
        $sql = "UPDATE usuario SET nome='$nome' WHERE idUsuario=$id";
        echo $sql;
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Nome alterado";
        } else {
            $_SESSION["danger"] = "Erro ao alterar nome";
        }
        header("Location: \usuarios");
    }

    public function logar()
    {
        $sql = "SELECT * FROM usuario WHERE email='$this->email' AND senha=md5('$this->senha')";
        echo $sql;
        $rs = $this->con->query($sql);
        echo $sql;
        if ($rs->num_rows > 0) {
            session_start();
            $_SESSION['logado'] = true;

            header('Location: /usuarios');
        } else {
            //header('Location: /?erro');
        }
    }

    public function sair()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }
}
