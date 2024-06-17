

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

$(document).ready(function () {
	
	$('#Altura').blur(function() {
		this.value = parseFloat(this.value).toFixed(3);
	});

	$('#Peso').blur(function() {
		this.value = parseFloat(this.value).toFixed(3);
	});	
	
});
function validarCPF() {
			$('#membro').click(function(e) {
                    var cpf = $('#cpfForm').val().replace(/[^\d]+/g,''); // remove caracteres não numéricos

                    if(cpf == '' || cpf.length != 11) {
                        alert('CPF inválido');
                        return false;
                    }

                    // Verifica se todos os dígitos são iguais, o que torna o CPF inválido
                    var digits = cpf.split('').map(Number);
                    if (new Set(digits).size === 1) {
                        alert('CPF inválido');
                        return false;
                    }

                    // Validação dos dígitos verificadores
                    var sum = 0;
                    var mod;
                    for (var i = 1; i <= 9; i++) {
                        sum += parseInt(cpf.substring(i-1, i)) * (11 - i);
                    }
                    mod = (sum * 10) % 11;
                    if (mod === 10 || mod === 11) {
                        mod = 0;
                    }
                    if (mod !== parseInt(cpf.substring(9, 10))) {
                        alert('CPF inválido');
						$('#cpfForm').focus();
                        return false;
                    }

                    sum = 0;
                    for (var i = 1; i <= 10; i++) {
                        sum += parseInt(cpf.substring(i-1, i)) * (12 - i);
                    }
                    mod = (sum * 10) % 11;
                    if (mod === 10 || mod === 11) {
                        mod = 0;
                    }
                    if (mod !== parseInt(cpf.substring(10, 11))) {
                        alert('CPF inválido');
						$('#cpfForm').focus();
                        return false;
                    }

                    // Se chegou até aqui, o CPF é válido
                    //alert('CPF válido');
					return true;
                });
				
		}

</script>
		
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2"><?=$title?></h1>
		</div>

			<div class="col-md-12">
			<?php if(isset($membro)) : ?>
			<form id="membro" action="<?= base_url() ?>index.php/membro/update/<?= $membro['MembroID'] ?>" method="post">
				<?php else : ?>
				<form action="<?= base_url() ?>index.php/membro/store" method="post">
				<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" class="form-control" name="Nome" id="Nome" placeholder="Nome" required value="<?= isset($membro) ? $membro["Nome"] : null ?>">
						</div>
					</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Sobrenome">Sobrenome:</label>
								<input  name="Sobrenome" id="Sobrenome" type="text" placeholder="Sobrenome" class="form-control" required
								value="<?= isset($membro) ? $membro["Sobrenome"] : null ?>">
								
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group" >
								<label >CPF:</label>
								<input  name="CPF" id="cpfForm" type="text" placeholder="000.000.000-00" maxlength="14" minlength="14" class="form-control" required
								value="<?= isset($membro) ? $membro["CPF"] : null ?>">
								
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="DataNascimento">Data de Nascimento:</label>
								<input type="date" class="form-control" name="DataNascimento" id="DataNascimento" placeholder="Data de Nascimento" value="<?= isset($membro) ? $membro["DataNascimento"] : null ?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Genero">Gênero:</label>
								<select class="form-control" id="Genero" name="Genero">
								<?php if (isset($membro)) {
									// Extrai o valor de 'Ativo' da primeira linha do resultado
									$ativo = $membro['Genero'];
									// Verifica se $ativo é igual a 1 ou 0 e define 'selected' para a opção correspondente
									$masculinoSelecionado = ($genero == 'masculino') ? 'selected' : '';
									$femininoSelecionado = ($genero == 'feminino') ? 'selected' : '';
								// Cria as opções do select com os valores do banco de dados
									echo '<option value="masculino" ' . $masculinoSelecionado . '>Masculino</option>';
									echo '<option value="feminino" ' . $femininoSelecionado . '>Feminino</option>';
								} else {
									echo '<option seleted value="selecione">..Selecione..</option>';
									echo '<option value="masculino">Masculino</option>';
									echo '<option value="feminino">Feminino</option>';
								}
							?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Peso">Peso:</label>
								<input  name="Peso" id="Peso" type="number"  step="000.01" placeholder="00.00" class="form-control" required
								value="<?= isset($membro) ? $membro["Peso"] : null ?>">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Altura">Altura:</label>
								<input  name="Altura" id="Altura" type="number" step="0.01" placeholder="0.00"class="form-control" required
								value="<?= isset($membro) ? $membro["Altura"] : null ?>">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="Endereco">Endereço:</label>
								<input  name="Endereco" id="Endereco" type="textArea" class="form-control" required
								value="<?= isset($membro) ? $membro["Endereco"] : null ?>">		
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="Telefone">Telefone:</label>
								<input  name="Telefone" id="Telefone" type="number" placeholder="999999-9999"class="form-control" required
								value="<?= isset($membro) ? $membro["Telefone"] : null ?>">	
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label for="DataInscricao">Data de Inscrição:</label>
								<input type="date" class="form-control" name="DataInscricao" id="DataInscricao" placeholder="Data de Inscrição" value="<?= isset($membro) ? $membro["DataInscricao"] : null ?>" required>
							</div>
						</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="Planos">Planos:</label>
							<select class="form-control" id="PlanoID" name="PlanoID">
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
								<select class="form-control" id="Ativo" name="Ativo">
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
							<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check" onclick="validarCPF()"></i> Salvar</button>
							<a href="<?=base_url()?>index.php/membro" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
					</div>
					</div>
				
				
			</form>
			</div>
		</div>
	</div>
    </main>

