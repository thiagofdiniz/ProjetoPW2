<?php

include 'UsuarioDAO.php';
$acao = $_GET['acao'];

switch ($acao) {
    case 'inserir':
        $usuario = new UsuarioDAO();
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        $usuario->inserir();
        break;
    case 'apagar':
        $usuario = new UsuarioDAO();
        $id = $_GET['id'];
        $usuario->apagar($id);
        break;

    case 'trocarsenha':
        $usuario = new UsuarioDAO();
        $id = $_POST['id'];
        $senha = $_POST['senha'];
        $usuario->trocarsenha($id, $senha);
        break;

    case 'trocarnome':
        $usuario = new UsuarioDAO();
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $usuario->trocarnome($id, $nome);
        break;
    case 'logar':
        $usuario = new UsuarioDAO();
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        $usuario->logar();
        break;

    case 'sair':
        $usuario = new UsuarioDAO();
        $usuario->sair();
        break;

    default:
        echo 'Erro!!';
        break;
}
