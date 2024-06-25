<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"></h1>
	</div>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Categorias</h1>
		<div class="btn-group mr-2">
			<a href="<?=base_url()?>index.php/categoria/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Categoria</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Categoria</th>
					<th>Ações</th>
				</tr>
			</thead>
			<?php ?>
			<tbody>
			<?php foreach($categorias as $categoria):?>
				<tr>
					<td><?= $categoria['categoria_id'] ?></td>
					<td><?= $categoria['nome'] ?></td>
					<td><a href="<?= base_url()?>index.php/categoria/edit/<?= $categoria['categoria_id']?>" class= "btn btn-warning">
							<i class= "fas fa-pencil-alt "></i>
						</a>
						<a href="<?= base_url()?>index.php/categoria/delete/<?= $categoria['categoria_id']?>" class= "btn btn-danger">
							<i class= "fas fa-trash-alt "></i>
						</a>

				</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>
  
