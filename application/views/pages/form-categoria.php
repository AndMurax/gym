<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($categoria)) : ?>
			 <form action="<?= base_url() ?>index.php/categoria/update/<?= $categoria['categoria_id'] ?>" method="post">
			<?php else : ?>
			 <form action="<?= base_url() ?>index.php/categoria/store" method="post">
			<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="Nome">Categoria:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome categoria" required value="<?= isset($categoria) ? $categoria["nome"] : null ?>">
						</div>
					</div>

	
				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/categoria" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
				</div>
			</form>
			</div>
    </main>
  </div>
</div>
