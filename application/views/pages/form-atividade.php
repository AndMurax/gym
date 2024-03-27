<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($atividade)) : ?>
			 <form action="<?= base_url() ?>index.php/atividade/update/<?= $atividade['AtividadeID'] ?>" method="post">
			<?php else : ?>
			 <form action="<?= base_url() ?>index.php/atividade/store" method="post">
			<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="NomeAtividade">Nome Atividade:</label>
							<input type="text" class="form-control" name="NomeAtividade" id="NomeAtividade" placeholder="Nome Atividade" required value="<?= isset($atividade) ? $atividade["NomeAtividade"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="DescricaoAtividade">Descrição Atividade:</label>
							<input type="text" class="form-control" name="DescricaoAtividade" id="DescricaoAtividade" placeholder="Descrição Atividade" required value="<?= isset($atividade) ? $atividade["DescricaoAtividade"] : null ?>">
						</div>
					</div>
	
				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/atividade" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
				</div>
			</form>
			</div>
    </main>
  </div>
</div>
