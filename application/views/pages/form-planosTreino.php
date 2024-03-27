<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($planostreino)) : ?>
			 <form action="<?= base_url() ?>index.php/planosTreino/update/<?= $planostreino['PlanoID'] ?>" method="post">
			<?php else : ?>
			 <form action="<?= base_url() ?>index.php/planosTreino/store" method="post">
			<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="NomePlano">Nome do Plano:</label>
							<input type="text" class="form-control" name="NomePlano" id="NomePlano" placeholder="Nome do plano" required value="<?= isset($planostreino) ? $planostreino["NomePlano"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="DescricaoPlano">Descrição do plano:</label>
							<input type="text" class="form-control" name="DescricaoPlano" id="DescricaoPlano" placeholder="Descrição do plano" required value="<?= isset($planostreino) ? $planostreino["DescricaoPlano"] : null ?>">
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group">
							<label for="DuracaoMeses">Duracao de Meses:</label>
							<input type="number" class="form-control" name="DuracaoMeses" id="DuracaoMeses" placeholder="Duração de Meses" required value="<?= isset($planostreino) ? $planostreino["DuracaoMeses"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="PrecoPlano">Preço Plano:</label>
							<input type="number" class="form-control" name="PrecoPlano" id="PrecoPlano" placeholder="Preço do Plano" required value="<?= isset($planostreino) ? $planostreino["PrecoPlano"] : null ?>">
						</div>
					</div>
	
				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/planostreino" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
				</div>
			</form>
			</div>
    </main>
  </div>
</div>
