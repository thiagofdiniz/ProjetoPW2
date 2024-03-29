<?php
include 'UsuarioDAO.php';
include 'alertas.php';
include 'verificarLogin.php';

$usuarioDAO = new UsuarioDAO();
$lista = $usuarioDAO->buscar();

include 'cabecalho.php';
include 'menu.php';

?>  
            <div class="col-10">
				<?php
                    mostrarAlerta('success');
                    mostrarAlerta('danger');
                ?>

                <h3>Usuários</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalnovo">
                    <i class="fas fa-user-plus"></i>
                    Novo Usúario
                </button>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($lista as $usuario): ?>
                    <tr>
                        <td><?= $usuario->idUsuario; ?></td>
                        <td><?= $usuario->nome; ?></td>
                        <td><?= $usuario->email; ?></td>
                        <td>
                            <a class="btn btn-danger"
                                href="UsuarioController.php?acao=apagar&id=<?= $usuario->idUsuario; ?>">
                                <i class="fas fa-times"></i>
                            </a>
                            <button type="button" class="btn btn-warning alterar-nome" data-toggle="modal"
                                data-target="#modalnome" data-id="<?= $usuario->idUsuario; ?>">
                                <i class="fas fa-user-edit"></i>
                            </button>
                            <button type="button" class="btn btn-info alterar-senha" data-toggle="modal"
                                data-target="#modalsenha" data-id="<?= $usuario->idUsuario; ?>">
                                <i class="fas fa-key"></i>
                            </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="UsuarioController.php?acao=inserir" method="POST">
                        <div class="form-group">

                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="E -mail">
                        </div>
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
                    <form action="UsuarioController.php?acao=trocarsenha" method="POST">
                        <input type="hidden" name="id" id="campo-id">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" id="trocar-senha" placeholder="Senha">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="trocarSenha">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- trocar nome -->
    <div class="modal fade" id="modalnome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Nome</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="UsuarioController.php?acao=trocarnome" method="POST">
                        <input type="hidden" name="id" id="campo">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="name" name="nome" class="form-control" id="trocar-nome" placeholder="Nome">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="trocarnome">Salvar</button>
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

<script type="text/javascript">
var botao = document.querySelector(".alterar-nome");
botao.addEventListener("click", function() {
    var campo = document.querySelector("#campo");
    campo.value = botao.getAttribute("data-id");
});
</script>
<html>