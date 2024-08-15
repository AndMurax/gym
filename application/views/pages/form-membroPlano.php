<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>

			<div class="col-md-12">
			<?php if(isset($membroPlano['DataPagamento'])) : ?>
			 <form action="<?= base_url() ?>index.php/MembroPlano/update/<?= $membro['MembroID'] ?>" method="post" onsubimit="return ValidarCampos()">
			<?php else : ?>
			 <form  action="<?= base_url() ?>index.php/MembroPlano/store/<?= $membro['MembroID'] ?>" method="post" onsubimit="return ValidarCampos()">
			<?php endif ?>
				<h1> Membro Plano de <?= $membro['Nome'];?></h1>
					<div class="col-md-6">
						<div class="form-group" id="cpfForm">
							<label for="cpf">CPF:</label>
							<input  name="cpf" id="cpf" type="text" min="14" class="form-control" required readonly
							 value="<?=$membro["CPF"]?>">
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="DataPagamento">Data de Pagamento:</label>
							<input type="date" class="form-control" name="DataPagamento" id="DataPagamento" placeholder="Data de Pagamento" value="<?= isset($membroPlano) ? $membroPlano["DataPagamento"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="DiaPagamento">Dia de Pagamento:</label>
							<select class="form-control" name="DiaPagamento" id="DiaPagamento">
								<option value="selecione">Selecione o dia</option>
								<?php for($i = 1; $i <= 31; $i++): ?>
									<option value="<?= $i ?>" <?= isset($membroPlano) && $membroPlano["DiaPagamento"] == $i ? 'selected' : '' ?>>
										<?= $i ?>
									</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label for="StatusPagamento">Status:</label>
							<select class="form-control" id="statusPagamento" name="statusPagamento">
						<?php if (isset($membro)) {
								// Extrai o valor de 'Ativo' da primeira linha do resultado
								$statusPagamento = $membro['statusPagamento'];
								// Verifica se $ativo é igual a 1 ou 0 e define 'selected' para a opção correspondente
								$pagoSelecionado = ($statusPagamento == 1) ? 'selected' : '';
								$vencidoSelecionado = ($statusPagamento == 0) ? 'selected' : '';
							// Cria as opções do select com os valores do banco de dados
								echo '<option value="1" ' . $pagoSelecionado . '>Pago</option>';
								echo '<option value="0" ' . $vencidoSelecionado . '>Vencido</option>';
							} else {
								echo '<option seleted value="selecione">..Selecione..</option>';
								echo '<option value="1">Pago</option>';
								echo '<option value="0">Vencido</option>';
							}
						?>
							</select>
						</div>
					</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="Planos">Planos:</label>
						<select class="form-control" id="planoID" name="PlanoID" readonly>
							<option value="" selected>Selecione:</option>
							<?php foreach ($planostreinos as $planostreino) : ?>
								<?php 
									$planoID = $planostreino["PlanoID"];
									$nomePlano = $planostreino["NomePlano"];
									$selected = isset($membro["PlanoID"]) && $membro["PlanoID"] == $planoID ? 'selected': '';
								?>
								<option value="<?= $planoID ?>" <?= $selected ?>><?= $nomePlano ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				

					<div class="col-md-6">
						<div class="form-group">
							<label for="Status">Status:</label>
							<select class="form-control" id="Ativo" name="Ativo" readonly>
						<?php if (isset($membro)) {
								// Extrai o valor de 'Ativo' da primeira linha do resultado
								$ativo = $membro['Ativo'];
								// Verifica se $ativo é igual a 1 ou 0 e define 'selected' para a opção correspondente
								$ativoSelecionado = ($ativo == 1) ? 'selected' : '';
								$inativoSelecionado = ($ativo == 0) ? 'selected' : '';
							// Cria as opções do select com os valores do banco de dados
								echo '<option value="1" ' . $ativoSelecionado . '>Ativo</option>';
								echo '<option value="0" ' . $inativoSelecionado . '>Inativo</option>';
							} else {
								echo '<option seleted value="selecione">..Selecione..</option>';
								echo '<option value="1">Ativo</option>';
								echo '<option value="0">Inativo</option>';
							}
						?>
							</select>
						</div>
					</div>

				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/membro" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
				</div>
			</form>
			</div>
    </main>
  </div>
</div>

<script type="text/Javascript">

	// function ValidarCampos(){
	// 	if(document.form-control.DataPagamento.value == "selecione"){
	// 		alert('Por favor, preencha o campo');
	// 		document.form-control.DataPagamento.focus();
	// 	}
	// }

	function ValidarCampos(){
	  let DataPagamento = $('#DataPagamento').val();

	  if (DataPagamento == 'selecione'){
		$('#DataPagamento').focus();
	  }

	}

	
</script>