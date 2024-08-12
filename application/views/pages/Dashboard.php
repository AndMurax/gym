    <style>
        .ocultar {
            display: none;
            }
    </style>

    <script>
        function ValorAnual() {
            var valorAnual = document.getElementById("valor-anual");
            var toggleButton = document.getElementById("toggle-button");

            if (valorAnual.style.display === "none") {
                valorAnual.style.display = "block";
                toggleButton.textContent = "Ocultar Valor";
            } else {
                valorAnual.style.display = "none";
                toggleButton.textContent = "Mostrar Valor";
            }
        }

        function ValorMensal() {
            var valorMensal = document.getElementById("valor-mensal");
            var toggleButton = document.getElementById("toggle-button");

            if (valorMensal.style.display === "none") {
                valorMensal.style.display = "block";
                toggleButton.textContent = "Ocultar Valor";
            } else {
                valorMensal.style.display = "none";
                toggleButton.textContent = "Mostrar Valor";
            }
        }
    </script>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="<?= base_url() ?>index.php/membro" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus-square"></i> Membro </a>
			</div>
		</div>
		

	</div>
	<div class="row"> 
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ganhos (Mensais)
                                </div>
                                <div id="valor-mensal" class="h5 mb-0 font-weight-bold text-gray-800" style="display: none;">
                                    R$: <?= $valor_mensal['total'] ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <button id="toggle-button" class="btn btn-primary mt-3" onclick="ValorMensal()">Mostrar Valor</button>
                    </div>
                </div>
            </div>
<!-- Earnings (Anual) Card Example -->						
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Ganhos (Anual)
                                </div>
                                <div id="valor-anual" class="h5 mb-0 font-weight-bold text-gray-800" style="display: none;">
                                    R$: <?= $valor_anual['total'] ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <button id="toggle-button" class="btn btn-primary mt-3" onclick="ValorAnual()">Mostrar Valor</button>
                    </div>
                </div>
            </div>


	    <!-- Earnings (Membros ativos) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Membros Ativos</div>
                                            <div class="h5 mb-0 font-weight-bold text-green-800"><?=$total_membros['total']?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x green-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


	</div>
	    

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2"> Ultimos Membros </h2>
	</div>

	
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>CPF</th>
					<th>Data Inscrição</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($membros as $membro):?>
				<tr>
                    <td><?=$membro['MembroID'] ?></td>
                    <td><?=$membro['Nome'] ?></td>
                    <td><?=$membro['CPF'] ?></td>
					<td><?=date( 'd/m/Y' , strtotime($membro['DataInscricao']))?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
</main>