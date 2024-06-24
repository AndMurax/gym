<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Pessoas</h1>
		<div class="btn-group mr-4">
			<a href="<?=base_url()?>index.php/pessoa/new" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Pessoa</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Tipo Cliente</th>
				</tr>
			</thead>
			<tbody>
             <?php foreach ($pessoas as $pessoa) { ?>
				<tr>
					<td><?=$pessoa['pessoa_id'] ?></td>
                    <td><?=$pessoa['nome'] ?></td>
					<td><?=$pessoa['tipo_cliente'] ?></td>
                </tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</main>

