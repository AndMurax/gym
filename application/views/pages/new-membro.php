<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
	
	function validarCPF() {
		$('#Salvar').click(function () { 
				
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
							// alert('CPF válido');
							return true;			
			
			});				
	}

	function verificarMembro(){
        var form = $("#membro");
        form.submit(function (e) {
            e.preventDefault();

			$.ajax({
            	type: form.attr('method'),
                url: "<?= base_url('/membro/ajaxVerificarMembro') ?>",
                data: form.serialize(),
                success: function (data) {
                var response = JSON.parse(data);
                if (response === 'nao'){
                    window.location.href = "<?= base_url('/membro/new') ?>";
                } else {
                    window.location.href = "<?= base_url('/membro/edit/') ?>" + response;
                        }
                },
                error: function(data){
                	console.log('Um erro foi encontrado!');
                    console.log(data);
                        }
                });
            });   
	}

	$(document).ready(function () {
		validarCPF();
		verificarMembro();
	});
		
</script>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2"><?=$title?></h1>
		</div>
			<div class="col-md-12">
				<form id="membro" method="post" >
							<div class="col-md-6">
								<div class="form-group" >
									<label >CPF:</label>
									<input  name="CPF" id="cpfForm" type="text" placeholder="000.000.000-00" maxlength="14" minlength="14" class="form-control" required>
								</div>
							</div>
						<div class="col-md-6">
								<button id="Salvar" class="btn btn-success btn-xs" ><i class="fas fa-check" ></i> Salvar</button>
								<a href="<?=base_url()?>index.php/membro" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancelar</a>
						</div>
						</div>
				</form>
			</div>
		</div>
	</div>
    </main>

