<?php
include 'PerguntaDAO.php';

$PerguntaDAO = new PerguntaDAO();
$lista = $PerguntaDAO->buscar();

include "cabecalho.php";
include "menu.php";
?>
<!DOCTYPE html>


        <div class="col-10">
            <h3>Questões</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnovo">
                Insira uma pergunta
            </button>
            <table class="table">
                <tr>
                    <th>Nº Questão</th>
                    <th>Pergunta</th>
                    <th>Seu Tipo</th>
                    <th>Ações</th>

                </tr>
                <?php foreach ($lista as $pergunta): ?>
                    <td><?= $pergunta->idPergunta; ?></td>
                    <td><?= $pergunta->pergunta; ?></td>
                    <td><?= $pergunta->tipo; ?></td>
                    <td>

                        
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-align-justify"></i>
                        </button>
                        <button type="button" class="btn btn-warning">
                            <i class="far fa-edit"></i>
                        </button>


                        <a class="btn btn-danger"
                        href="PerguntaController.php?acao=apagar&id=<?= $pergunta->idPergunta; ?>">
                        <i class="fas fa-times"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</div>




<!-- inserir -->
<div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Questão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="PerguntaController.php?acao=inserir" method="POST">
                <div class="form-group">
                    <label for="pergunta">Faça a pergunta:</label>
                    <input type="text" name="pergunta" class="form-control" id="pergunta" placeholder="Digite">
                </div>
                <div class="form-group">
                    <label for="tipo">Insira o tipo da pergunta:</label>
                    <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Ex: preencher, alternativa, multipla escolha etc...">
                </div>
                <div class="form-group">
                    <label for="pergunta">Resposta(s)</label>
                    <input type="text" name="resposta" class="form-control" id="resposta" placeholder="Digite a resposta ">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- trocar senha -->
<div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="PerguntaController.php?acao=trocarSenha" method="POST">
                <input type="hidden" name="id" id="campo-id">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript">
    var botao = document.querySelector(".alterar-senha");
    botao.addEventListener("click", function() {
        var campo = document.querySelector("#campo-id");
        campo.value = botao.getAttribute("data-id");
    });
</script>

<html>