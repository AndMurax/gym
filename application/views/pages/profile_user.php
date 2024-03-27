<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>


			<div class="col-md-12">
			<?php if(isset($users)) : ?>
			 <form action="<?= base_url() ?>index.php/users/update/<?= $users['id_user'] ?>" method="post" enctype="multipart/form-data">
			<?php else : ?>
			 <form action="<?= base_url() ?>index.php/users/store" method="post" enctype="multipart/form-data">
			<?php endif ?>

					<div class="col-md-6">
						<div class="form-group">
							<label for="Nomeusers">Nome do Usuário:</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required value="<?= isset($users) ? $users["nome"] : null ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="E-mail do usuário" required value="<?= isset($users) ? $users["email"] : null ?>">
						</div>
			</div>
				
	
				<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
						<a href="<?=base_url()?>index.php/users" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
				</div>
				</div>
				
			</form>
		
			</div>
    </main>
  </div>
</div>
