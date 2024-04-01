<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"></h1>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Atividades</h1>
		<div class="btn-group mr-2">
			<a href="<?=base_url()?>index.php/atividade/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Atividade</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome Atividade</th>
					<th>Descrição Atividade</th>
					<th> Ações </th>
				</tr>
			</thead>
			<?php ?>
			<tbody>
			<?php foreach($atividadees as $atividade):?>
				<tr>
					<td><?= $atividade['AtividadeID'] ?></td>
					<td><?= $atividade['NomeAtividade'] ?></td>
					<td><?= $atividade['DescricaoAtividade'] ?></td>
					<td><a href="<?= base_url()?>index.php/atividade/edit/<?= $atividade['AtividadeID']?>" class= "btn btn-warning">
							<i class= "fas fa-pencil-alt "></i>
						</a>
						<a href="#deleteModal" class= "btn btn-danger" data-toggle="modal" data-target="#deleteModal">
							<i class= "fas fa-trash-alt "></i>
						</a>

						<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" 		aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Excluir?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
									<div class="modal-body">Você tem certeza de que deseja deletar este item?</div>
										<div class="modal-footer">
													<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
													<a class="btn btn-primary" href="<?= base_url()?>index.php/atividade/delete/<?= $atividade['AtividadeID']?>">Sim</a>
										</div>
							</div>
						</div>
					</div>
				</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>
  
