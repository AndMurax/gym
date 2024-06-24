

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>


</script>
		
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2"><?=$title?></h1>
		</div>

			<div class="col-md-12">
			<?php if(isset($pessoa)) : ?>
			<form id="pessoa" action="<?= base_url() ?>index.php/pessoa/update/<?= $pessoa['pessoa_id'] ?>" method="post">
				<?php else : ?>
				<form action="<?= base_url() ?>index.php/pessoa/store" method="post">
				<?php endif ?>

						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome:</label>
								<input type="text" class="form-control" name="nome" id="Nome" placeholder="Nome" required value="<?= isset($pessoa) ? $pessoa["Nome"] : null ?>">
							</div>
						</div>
				
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">E-mail:</label>
								<input  name="email" id="email" type="email" class="form-control" required
								value="<?= isset($pessoa) ? $pessoa["email"] : null ?>">		
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Telefone">Telefone:</label>
								<input  name="Telefone" id="Telefone" type="number" placeholder="999999-9999"class="form-control" required
								value="<?= isset($pessoa) ? $pessoa["Telefone"] : null ?>">	
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="tipo_cliente_id">Tipo Cliente:</label>
								<select class="form-control" id="tipo_cliente_id" name="tipo_cliente_id">
									<option value="" selected>Selecione:</option>
									<?php foreach ($tipo_clientes as $tipo_cliente) : ?>
										<?php 
											$tipo_cliente_id = $tipo_cliente["tipo_cliente_id"];
											$nome = $tipo_cliente["nome"];
											$selected = isset($pessoa["tipo_cliente_id"]) && $pessoa["tipo_cliente_id"] == $tipo_cliente_id ? 'selected': '';
										?>
										<option value="<?= $tipo_cliente_id ?>" <?= $selected ?>><?= $nome ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Observacao">Observação:</label>
								<textarea type="text" class="form-control" name="obs" maxlength='1000' id="Observacao" placeholder="Observação" required value="<?= isset($pessoa) ? $pessoa["obs"] : null ?>"> 

								</textarea>
							</div>
						</div>

					<div class="col-md-6">
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check" onclick="validarCPF()"></i> Salvar</button>
							<a href="<?=base_url()?>index.php/pessoa" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
					</div>
					</div>
				
				
			</form>
			</div>
		</div>
	</div>
    </main>

