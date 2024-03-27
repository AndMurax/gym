<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?= $title?> </h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="<?=base_url()?>index.php/games/new " class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Beneficiário</a>
			</div>
		</div>
	</div>

	<div class="table-responsive">
	<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>CPF</th>
					<th>Tipo de Muda</th>
					<th>QTD Mudas</th>
					<th>Município</th>
					<th>Data Entrega</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($result as $cidadao):?>
				<tr>
                    <td><?=$cidadao['id_beneficiario'] ?></td>
                    <td><?=$cidadao['nome'] ?></td>
                    <td><?=$cidadao['cpf'] ?></td>
					<td><?=$cidadao['mudas'] ?></td>
                    <td><?=$cidadao['qtd_mudas'] ?></td>
					<td><?=$cidadao['municipio'] ?></td>
                    <td><?=$cidadao['data_entrega'] ?></td>
					<td>XXX</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</main>
