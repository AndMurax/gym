<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($instrutor)) : ?>
			 <form action="<?= base_url() ?>index.php/instrutor/update/<?= $instrutor['instrutorID'] ?>" method="post">
			<?php else : ?>
			 <form action="<?= base_url() ?>index.php/instrutor/store" method="post">
			<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" class="form-control" name="Nome" id="Nome" placeholder="Nome" required value="<?= isset($instrutor) ? $instrutor["Nome"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="cpf">CPF:</label>
							<input  name="CPF" id="CPF" type="text" min="14" class="form-control" required
							 value="<?= isset($instrutor) ? $instrutor["CPF"] : null ?>">
							
						</div>
					</div>


				
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="Email">E-mail:</label>
							<input  name="Email" id="Email" type="textArea" class="form-control" required
							 value="<?= isset($instrutor) ? $instrutor["Email"] : null ?>">		
						</div>
					</div>

	
				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/instrutor" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
				</div>
				</div>
			</form>
			</div>
    </main>
  </div>
</div>
