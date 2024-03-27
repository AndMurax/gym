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
						<a href="<?= base_url()?>index.php/membro/delete/<?= $membro['MembroID']?>" class= "btn btn-danger">
							<i class= "fas fa-trash-alt "></i>
						</a>
					</td>

          		</tr>
                </tr>
                <?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>

