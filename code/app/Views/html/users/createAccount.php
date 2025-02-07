<!doctype html>
<html lang="pt-PT">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>criação conta | oficina digital</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.svg') ?>">

	<!-- Libs CSS -->
	<link href="<?= base_url('assets/libs/notyf/css/notyf.min.css') ?>" rel="stylesheet"/>

	<!-- Tabler CSS -->
	<link href="<?= base_url('assets/css/core/tabler.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-flags.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-payments.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/tabler-vendors.min.css') ?>" rel="stylesheet"/>
	<link href="<?= base_url('assets/css/core/demo.min.css') ?>" rel="stylesheet"/>

	<!-- Custom CSS -->
	<link href="<?= base_url('assets/css/custom/custom.css') ?>" rel="stylesheet"/>

	<!-- Custom CSS -->
	<?= $customCSS ?>
	
</head>
<body class="border-top-wide border-primary d-flex flex-column custom-bg">
	<div class="page page-center">
		<div class="container container-tight py-4">
			<form class="card card-md">
				<div class="text-center mt-5 d-flex flex-row justify-content-around align-items-center">
					<div class="flex flex-column justify-content-start text-start">
						<h1 class="mb-2">Oficina Digital</h1>
						<span class="text-primary">
							<b>
								Gestão Inteligente, 
								Oficina Eficiente!
							</b>
						</span>
					</div>
					<img src="<?=base_url('assets/img/logo.svg')?>" height="100" alt="logo" class="navbar-brand navbar-brand-autodark">
				</div>

				<div class="card-body">
					<div class="mb-3">
						<label class="form-label">palavra-passe</label>
						<input type="password" class="form-control" placeholder="palavra-passe" name="accountCreationPassword">
					</div>
					<div class="mb-2">
						<label class="form-label">confirmar palavra-passe</label>
						<input type="password" class="form-control" placeholder="confirmar palavra-passe" name="accountCreationPasswordConfirmation">
					</div>
					<div class="form-footer">
						<button type="button" class="btn btn-primary w-100 createAccountButton" data-token="<?= $token ?>">criar conta</button>

						<span class="form-label-description mt-4">
							<a href="<?= base_url() ?>">já tem uma conta?</a>
						</span>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Libs JS -->
	<script src="<?= base_url('assets/libs/jquery/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/notyf/js/notyf.min.js') ?>"></script>

	<!-- Tabler Core -->
	<script src="<?= base_url('assets/js/core/tabler.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/demo.min.js') ?>"></script>

	<!-- Custom JS -->
	<script src="<?= base_url('assets/js/custom/custom.js') ?>"></script>

	<script> 
		const baseURL = "<?= base_url() ?>";
	</script>

	<?= $customJS ?>

</body>
</html>