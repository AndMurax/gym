

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('index.php/dashboard')?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-solid fa-dumbbell"></i>
    </div>
    <div class="sidebar-brand-text mx-4"><?=$title?></div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-900"> <strog><?= $_SESSION['Logged_user']['nome']?></strog></span>
                                <img class="img-profile rounded-circle" src="<?=base_url($_SESSION['Logged_user']['foto_usuario'])?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?=base_url('index.php/users/edit/'.$_SESSION['Logged_user']['id_user'])?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?=base_url('index.php/users/alterar_foto/'.$_SESSION['Logged_user']['id_user'])?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Alterar Foto
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#logoutModal" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?=base_url('index.php/dashboard')?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-user"></i>
        <span>Admistração</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="<?=base_url()?>index.php/membro">Membros</a>
                        <a class="collapse-item" href="<?=base_url()?>index.php/users">Usuários</a>
                        <a class="collapse-item" href="<?=base_url()?>index.php/instrutor">Instrutores</a>
                        <a class="collapse-item" href="<?=base_url()?>index.php/atividade">Atividades</a>
                        <a class="collapse-item" href="<?=base_url()?>index.php/planosTreino">Planos</a>
                    </div>
    </div>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Finançãs</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
</li>
<div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
<!-- Divider -->
<!-- Sidebar Message -->
</ul>
<!-- End of Sidebar -->


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para você sair do usuário.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?=base_url()?>index.php/login/logout">Sair</a>
                </div>
            </div>
        </div>
    </div>