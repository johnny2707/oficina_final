<!doctype html>
<html lang="pt-PT">
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

	<!-- Custom CSS -->
	<?= $customCSS ?>
	
</head>
<body class="d-flex flex-column">
	<div class="page page-center">
		<div class="container container-tight py-4">
			<form class="card card-md" autocomplete="off">
				<div class="text-center mt-5 d-flex flex-row justify-content-around align-items-center">
					<a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/logo.svg') ?>" height="100" alt=""></a>
				</div>

				<div class="card-body">
					<div class="mb-3">
						<label class="form-label">password</label>
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					<div class="mb-2">
						<label class="form-label">confirm password</label>
						<input type="password" class="form-control" placeholder="confirm password" autocomplete="off" name="passwordConfirm">
					</div>
					<div class="form-footer">
						<button type="button" class="btn btn-primary w-100 saveNewPassword">save</a>
					</div>
				</div>
			</form>
			<div class="text-center text-muted mt-3">
				<a href="<?= base_url() ?>">go back to the login page</a>
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
	
        $(document).ready(function() {
            $(document).on('click', '.saveNewPassword', function(e){
				$(this).attr('disabled', 'disabled');
				let element = $(this);
				setTimeout(function() {
					element.removeAttr('disabled');
				}, 1000);

				let password = $('input[name=password]').val();
				let passwordConfirm = $('input[name=passwordConfirm]').val();
				let email = '<?= $email ?>';

				if(password === passwordConfirm) {
					$.ajax({
						url: `${baseURL}auth/updatePassword`,
						method: "POST",
						dataType: 'json',
						data : {
							email,
							password,
							passwordConfirm
						},
						success: function(data) {
							if (data.error == true) {
								$.each( data.popUpMessages, function( key, value ) {
									notyf.error(value);
								});
							} else {
								notyf.success(data.popUpMessages[0]);
								window.location.href = baseURL;
							}
						},
						error: function(xhr, status, error){
							console.log(xhr);
							console.log(status);
							console.log(error);

							notyf.error('Ocorreu um erro. Atualize a página e tente novamente!');
						}
					});
				}
				else {
					notyf.error('Ocorreu um erro. As passwords não coincidem!');
				}
			});
        });
    </script>
</body>
</html>