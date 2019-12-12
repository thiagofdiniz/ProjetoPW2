<?php

include 'PerguntaDAO.php';
$acao = $_GET['acao'];

switch ($acao) {
    case 'inserir':
        $pergunta = new PerguntaDAO();
        $pergunta->pergunta = $_POST['pergunta'];
        $pergunta->tipo = $_POST['tipo'];
        $pergunta->resposta = $_POST['resposta'];
        $pergunta->inserir();
        break;
    case 'apagar':
        $pergunta = new PerguntaDAO();
        $id = $_GET['id'];
        $pergunta->apagar($id);
        break;
    case 'editar':
        $pergunta = new PerguntaDAO();
        $pergunta->id = $_POST['id'];
        $pergunta->texto = $_POST['texto'];
        $pergunta->tipo = $_POST['tipo'];
        $pergunta->editar();
        break;
}
