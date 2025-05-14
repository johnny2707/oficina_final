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
	<script src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit" async defer></script>

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

				<div class="mb-5">
					<p class="fs-h3 text-muted w-100">
						por favor insira o código de verificação que enviamos para o seu email:
					</p>
							
					<div class="d-flex flex-col w-100 justify-content-around px-5 gap-5 mb-3">
						<input name="code1" class="form-control w-25 py-3 text-center" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						<input name="code2" class="form-control w-25 py-3 text-center" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						<input name="code3" class="form-control w-25 py-3 text-center" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
						<input name="code4" class="form-control w-25 py-3 text-center" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
					</div>

					<div id="recaptcha-container" class="g-recaptcha"
						data-sitekey="<?= env('recaptcha.siteKey') ?>"
						data-size="invisible">
					</div>

					<button class="btn btn-primary w-50 btnValidar" type="button" name="btnValidar">validar</button>
				</div>

				<div class="text-center text-muted mt-3">
					não encontra o email? procure no spam!<br />
					email errado? por favor <a href="<?= base_url("auth/recoverPassword") ?>">insira o email correto</a>.
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

<script> 
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
</script>

<script src="<?= base_url('assets/js/custom/auth.js?' . $_ENV['VERSION']) ?>"></script>

</body>
</html>