<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Oficina Digital</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('logo.svg') ?>">

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

	<?= $customCSS ?>
</head>
<body class="d-flex flex-column bodyBackground">
	<div class="page page-center">
		<div class="container container-tight py-4">
			<div class="card card-md">
				<div class="text-center mt-5 d-flex flex-row justify-content-around align-items-center">
					<a href="<?= base_url() ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="100" alt=""></a>
				</div>

				<div class="card-body">
					<p class="text-muted mb-4">Insira o seu email para recuperar a palavra-passe.</p>
					<div class="mb-3">
						<input class="form-control" type="text" name="email" placeholder="email">
					</div>
					<div class="form-footer">
						<button type="button" class="btn btn-primary w-100 changePassword">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
							Enviar email
						</button>
					</div>
				</div>
			</div>
			<div class="text-center text-muted mt-3">
				<a href="<?= base_url() ?>">Voltar para a página de login</a>
			</div>
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