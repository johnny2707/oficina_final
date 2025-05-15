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

	<!-- ReCaptcha -->
	<!-- <script src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit" async defer></script> -->

	<?php #$customCSS ?>
</head>
<body  class=" d-flex flex-column bodyBackground">
	<div class="page page-center">
		<div class="container container-tight py-4">
			<div class="text-center mb-4">
				<a href="<?= base_url() ?>" class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="100" alt="logo"></a>
			</div>
			<div class="text-center">
				<div class="my-5">
					<p class="fs-h3 text-muted">
						enviámos um email para este endereço:
					</p>
					<h2 class="h1"><?= $email ?></h2>
				</div>

				<div class="text-center text-muted mt-3">
					Não encontra o email? Procure no spam!<br />
					Email errado? Por favor <a href="<?= base_url("auth/recoverPassword") ?>">insira o email correto</a>.
				</div>
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

<!-- <script> 
	const baseURL = "<?= base_url() ?>";

	let recaptchaReady = false;
	let recaptchaWidgetId;

	// Initialize reCAPTCHA
	function onRecaptchaLoad() {
		recaptchaWidgetId = grecaptcha.render('recaptcha-container', {
			sitekey: '<?= env('recaptcha.siteKey') ?>',
			size: 'invisible',
			badge: 'bottomright' // Position for invisible recaptcha
		});
		recaptchaReady = true;
	}
</script> -->

<script src="<?= base_url('assets/js/custom/auth.js?' . $_ENV['VERSION']) ?>"></script>

</body>
</html>