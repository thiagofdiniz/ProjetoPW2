  <?php
	include "AlternativasDAO.php";
	include "PerguntaDAO.php";
	include "cabecalho.php";
	include "menu.php";
	include "verificarLogin.php";
	include "alertas.php";
	$idPergunta = $_GET["pergunta"];
	$alternativas = new AlternativasDAO();
	$alternativas->idPergunta = $idPergunta;
	$lista = $alternativas->buscar();
	$questoes = new PerguntaDAO();
	$questoes->id = $idPergunta;
	$questoes->buscarPorId();

	?>
  <div class="container">

  	<h2><?= $questoes->pergunta ?></h2>

  	<ul class="list-group lista-alternativas">
  		<?php foreach ($lista as $alternativa) : ?>
  			<li class="list-group-item d-flex justify-content-between align-items-center">
  				<?= $alternativa->texto ?>
  				<span class="badge">
  					<button class="btn btn-correta"><i class="fas fa-<?= ($alternativa->correta) ? 'check' : 'times' ?>"></i></button>
  					<a href="AlternativasController.php?acao=apagar&id=<?= $alternativa->idAlternativa ?>&idPergunta=<?= $idPergunta ?>" class="btn btn-danger"><i class="fas fa-trash text-white"></i></a>
  				</span>
  			</li>
  		<?php endforeach ?>
  	</ul>
  	<button class="btn btn-primary" data-toggle="modal" data-target="#modalnovo"><i class="fas fa-plus"></i></button>
  </div>
  <!-- Modal Novo -->
  <div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h5 class="modal-title" id="exampleModalLabel">Nova Alternativa</h5>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form action="AlternativasController.php?acao=inserir" method="POST">
  					<input type="hidden" name="idPergunta" value="<?= $idPergunta ?>">
  					<div class="form-group">
  						<label for="pergunta">Texto</label>
  						<input type="text" name="pergunta" class="form-control" id="pergunta" placeholder="resposta da alternativa">
  					</div>
  					<div class="form-group">
  						<div class="form-check">
  							<input class="form-check-input" type="checkbox" value="" id="correta" name="correta">
  							<label class="form-check-label" for="correta">
  								Correta
  							</label>
  						</div>
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>