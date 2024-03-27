<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"></h1>
	</div>

	
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<?php ?>
			<tbody>
			<?php foreach($usuarios as $usuario):?>
				<tr>
					<td><?= $usuario['id_user'] ?></td>
					<td><?= $usuario['nome'] ?></td>
					<td><?= $usuario['email'] ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</main>
  
