<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Membros</h1>
		<div class="btn-group mr-4">
			<a href="<?=base_url()?>index.php/membro/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Membro</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
                <?php foreach($membros as $membro):?>
				<tr>
				<td><?=$membro['MembroID'] ?></td>
                    <td><?=$membro['Nome'] ?></td>
                    <td><?=$membro['CPF'] ?></td>
                 
					<td>
						<a href="<?= base_url()?>index.php/membro/edit/<?= $membro['MembroID']?>" class= "btn btn-warning">
							<i class= "fas fa-pencil-alt "></i>
						</a>
						<a href="<?= base_url()?>index.php/membro/membroPlano/<?= $membro['MembroID']?>" class= "btn btn-success">
							<i class= "fas fa-solid fa-user"></i>
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
													<a class="btn btn-primary" href="<?= base_url()?>index.php/membro/delete/<?= $membro['MembroID']?>">Sim</a>
										</div>
							</div>
						</div>
					</div>
					</td>

          		</tr>
                </tr>

                <?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>

