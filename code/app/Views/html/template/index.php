<?php
	$name = session()->get('name');
	$group = session()->get('group');
	$permissions = session()->get('permissions');
?>

<!doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title><?= "{$title} | " ?>Oficina Digital</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.svg') ?>">

	<!-- Libs CSS -->
	<link href="<?= base_url('assets/libs/notyf/css/notyf.min.css') ?>" rel="stylesheet"/>

	<link href="<?= base_url('assets/libs/datatables/dataTables.bootstrap5.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/datatables/responsive.dataTables.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/datatables/stateRestore.dataTables.min.css') ?>" rel="stylesheet"/>
	
	<link href="<?= base_url('assets/libs/tabler-icons/tabler-icons.min.css') ?>" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	
	<link href="<?= base_url('assets/libs/jquery-confirm/css/jquery-confirm.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/tom-select/css/tom-select.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/libs/jquery-ui/jquery-ui.min.css') ?>" rel="stylesheet"/>

	<!-- CSS files -->
	<link href="<?= base_url('assets/css/core/tabler.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-flags.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-payments.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-vendors.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/demo.min.css') ?>" rel="stylesheet"/>

	<!-- Webmóvel CSS -->
	<link href="<?= base_url('assets/css/custom/custom.css') ?>" rel="stylesheet"/>

	<!-- Custom CSS -->
	<?= $customCSS ?>
</head>
<body>

<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
 	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3 my-3">
				<a href="<?= base_url() ?>" class="text-decoration-none">
					<img src="<?= base_url('assets/img/logo.svg') ?>" width="110" height="32" alt="Oficina" class="navbar-brand-image">
					Oficina Digital
				</a>
			</h1>
			
          	<div class="collapse navbar-collapse" id="sidebar-menu">
            	<ul class="navbar-nav pt-lg-3">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-house-fill"></i>	
							</span>
							<span class="nav-link-title">INÍCIO</span>
						</a>
					</li>
					<?php if (in_array('ACCOUNT', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item <?= isset($menu) && $menu == 'ACCOUNT' ? 'active' : '' ?>">
						<a href="<?= base_url('users') ?>" class="nav-link">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-person-circle"></i>
							</span>
							<span class="nav-link-title">CONTA</span>
						</a>
					</li>
					<?php endif; ?>
					<?php if (in_array('VEHICLE', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= (isset($menu) && $menu == 'VEHICLE') ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-car-front-fill"></i>
							</span>
							<span class="nav-link-title">O MEU VEÍCULO</span>
						</a>
						<div class="dropdown-menu">
							
								<a class="dropdown-item <?= (isset($subMenu) && $subMenu == 'MY_VEHICLE') ? 'active' : '' ?>" href="<?= base_url('vehicles/myVehicle') ?>">
									O MEU VEÍCULO
								</a>
								<a class="dropdown-item <?= (isset($subMenu) && $subMenu == 'HISTORIC') ? 'active' : '' ?>" href="<?= base_url('vehicles/historic') ?>">
									HISTÓRICO DE REPARAÇÕES
								</a>
							
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('CLIENTS', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'CLIENTS' ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-people-fill"></i>
							</span>
							<span class="nav-link-title">CLIENTES</span>
						</a>
						<div class="dropdown-menu">
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'LIST' ? 'active' : '' ?>" href="<?= base_url('clients/list') ?>">LISTA CLIENTES</a>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CREATION' ? 'active' : '' ?>" href="<?= base_url('clients/create') ?>">CRIAR CLIENTE</a>
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('SCHEDULE', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'SCHEDULE' ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-calendar-event-fill"	></i>
							</span>
							<span class="nav-link-title">CALENDÁRIO</span>
						</a>
						<div class="dropdown-menu">
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CALENDAR' ? 'active' : '' ?>" href="<?= base_url('calendar/index') ?>">CALENDÁRIO</a>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'NEW' ? 'active' : '' ?>" href="<?= base_url('calendar/create') ?>">CRIAR EVENTO</a>
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('SERVICES', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'SERVICES' ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-file-earmark-text-fill"></i>
							</span>
							<span class="nav-link-title">SERVIÇOS</span>
						</a>
						<div class="dropdown-menu">
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CREATION' ? 'active' : '' ?>" href="<?= base_url('services/create') ?>">CRIAR SERVIÇO</a>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'LIST' ? 'active' : '' ?>" href="<?= base_url('services/index') ?>">LISTA SERVIÇOS</a>
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('STOCK', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'STOCK' ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-box-fill"></i>
							</span>
							<span class="nav-link-title">PRODUTOS</span>
						</a>
						<div class="dropdown-menu">
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'CREATION' ? 'active' : '' ?>" href="<?= base_url('stock/criarProduto') ?>">CRIAR PRODUTO</a>
								<a class="dropdown-item <?= isset($subMenu) && $subMenu == 'LIST' ? 'active' : '' ?>" href="<?= base_url('stock/index') ?>">STOCK</a>
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('PERSONALIZATION', $permissions) || in_array('ALL', $permissions)) : ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'PERSONALIZATION' ? 'active' : '' ?>">
						<a href="<?= base_url('personalization/index') ?>" class="nav-link" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-pencil-fill"></i>
							</span>
							<span class="nav-link-title">PERSONALIZAÇÃO</span>
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item dropdown <?= isset($menu) && $menu == 'SAIR' ? 'active' : '' ?>">
						<a href="<?= base_url('auth/logout') ?>" class="nav-link" >
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<i class="bi bi-door-open-fill"></i>
							</span>
							<span class="nav-link-title">SAIR</span>
						</a>
					</li>
            	</ul>
          	</div>

			<div class="navbar-nav flex-row justify-content-between py-3">
				<div class="nav-item">
					<span class="nav-link d-flex lh-1 text-reset p-0 ms-3 me-5">
						<?php
							$nameExplode = explode(" ", $name);
							$firstL = $nameExplode[0][0];
							$secondL = "";
							if (isset($nameExplode[1][0])) 
							{
								$secondL = $nameExplode[1][0];
							}
						?>
						<span class="avatar bg-orange-lt"><?= "{$firstL}{$secondL}" ?></span>
						<div class="d-none d-xl-block ps-2">
							<div><?= $name ?></div>
							<div class="mt-1 small text-muted"><?php echo $group ?></div>
						</div>
					</span>
				</div>
			</div>
        </div>
    </aside>
	
	<div class="page-wrapper">
		<?= $this->renderSection("content") ?>

		<div id="page-loader">
			<img src="<?= base_url('assets/img/logo.svg') ?>" alt="Logo">
		</div>

	</div>

	<!-- Tabler Core -->
	<script src="<?= base_url('assets/js/core/tabler.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/demo-theme.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/demo.min.js') ?>"></script>

	<!-- Libs JS -->
	<script src="<?= base_url('assets/libs/jquery/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/notyf/js/notyf.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.bootstrap5.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.stateRestore.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/jquery-confirm/js/jquery-confirm.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/tom-select/js/tom-select.complete.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/jquery-ui/jquery-ui.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/list.js/list.min.js') ?>"></script>
	
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

	<!-- Webmóvel JS -->
	<script src="<?= base_url('assets/js/custom/custom.js') ?>"></script>

	<!-- Custom JS -->
	<script> 
		const baseURL = "<?= base_url() ?>";
		const dataTables_StateSave = "<?php //$_ENV['DATATABLES_STATESAVE'] ?>";
	</script>

	<?= $customJS ?>

</body>
</html>