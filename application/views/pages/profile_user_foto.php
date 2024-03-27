<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"></h1>
      </div>

		<h1> Alterar a foto do perfil</h1>
		<br><br>
			<div class="col-md-12">
			<form action="<?= base_url() ?>index.php/users/upload_foto/<?= $users['id_user'] ?>" 	method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<input type="file" name="foto_usuario" placeholder="Escolha uma imagem.">	
					</div>
					<br><br>
					<div class="col-md-6">
						<button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Salvar</button>
						<a href="<?=base_url()?>index.php/users" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
					</div>
				</div>
			</form>
		</div>
    </main>
  </div>
</div>
