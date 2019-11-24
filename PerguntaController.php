<?php

include 'PerguntaDAO.php';
$acao = $_GET['acao'];

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
}
