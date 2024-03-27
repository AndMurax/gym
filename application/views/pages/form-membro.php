

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($membro)) : ?>
			 <form action="<?= base_url() ?>index.php/membro/update/<?= $membro['MembroID'] ?>" method="post">
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
							<label for="sobrenome">Sobrenome:</label>
							<input  name="sobrenome" id="sobrenome" type="text" class="form-control" required
							 value="<?= isset($membro) ? $membro["Sobrenome"] : null ?>">
							
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" id="cpfForm">
							<label for="cpf">CPF:</label>
							<input  name="cpf" id="cpf" type="text" min="14" class="form-control" required
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
							<label for="genero">Genero:</label>
							<select class="form-control" id="genero" name="genero">
							<option selected value= "<?= isset($membro) ? $membro["Genero"] : null ?>" selected>Selecione:</option>
							<option value="masculino">Masculino</option>
							<option value="feminino">Feminino</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="Peso">Peso:</label>
							<input  name="Peso" id="Peso" type="number"  step="00.01" class="form-control" required
							 value="<?= isset($membro) ? $membro["Peso"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="Altura">Altura:</label>
							<input  name="Altura" id="Altura" type="number" step="00.01" class="form-control" required
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
							<input  name="Telefone" id="Telefone" type="number" class="form-control" required
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
							<select class="form-control" id="planoID" name="planoID">
							<option selected value="<?= isset($planostreinos["NomePlano"]) ? $planostreinos["NomePlano"] : null ?>"> Selecione: </option>
							<?php foreach ($planostreinos as $planostreino) : ?>
								<option selected value="<?=$planostreino["PlanoID"]?>"><?= $planostreino["NomePlano"]?></option>
							<?php endforeach; ?>
			
							</select>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label for="genero">Ativo:</label>
							<select class="form-control" id="Ativo" name="Ativo">
							<option selected value= "<?= isset($membro) ? $membro["Ativo"] : null ?>" selected>Selecione:</option>
							<option value="1">Ativo</option>
							<option value="0">Inativo</option>
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
