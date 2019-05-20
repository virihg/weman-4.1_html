<?php
require_once("./motores/interno/defs.php");
session_start();
$hayUsuario = (isset($_SESSION['Usuario']) && $_SESSION['Usuario']['rol'] != 't');
if (!$hayUsuario) {
	$_SESSION['Usuario'] = array("rol" => "t", "publica" => "invalida");
	?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= NOMBRE_APLICACION ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
		<meta charset="utf-8">
		<!-- SEO Meta Tags -->
		<meta name="description" content="Descripción" />
		<meta name="keywords" content="Palabras Clave" />
		<meta name="author" content="CarpathiaLab" />

		<!-- Mobile Specific Meta Tag -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Favicon Icon -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
		<link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
		<!-- CSS style Horizontal Nav-->
		<link href="css/layouts/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
		<!-- Custome CSS-->
		<link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
		<link rel="stylesheet" type="text/css" href="css/personalizado.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
		<link rel="stylesheet" href="js/jquery-ui.min.css" />
		<link rel="stylesheet" href="css/toastr.min.css">
		<script type="text/javascript">
			function firmado(event){
				//alert(event.keyCode);
				if(event.keyCode == 13 || event.keyCode == undefined){
					$.ajax({
						url : './motores/hanumat.php',
						type : 'post',
						dataType : 'JSON',
						data : {
							r : 'l',
							usr : $("#usuario").val(),
							pwd : $("#pwd").val()
						}
					}).done(function(r) {
						if (r.error == '0') {
							window.location.href = "./" + r.pagina;
						} else {
							console.log(r);
							toastr.error('Error de credenciales')
						}
					});
					return false;
				}
			}
		</script>
		<style type="text/css">
			form {
				color: #007aff;
			}
			.logo {
				background-color: #b2a8e88c;
				padding: 18px;
				border-radius: 50px;
				margin-top: 3%;
				color: floralwhite;
			}
			input[type=text], input[type=password]{
				display: block;
				width: 100%;
				height: 45px;
				padding: 0PX;
				font-size: 15px;
				line-height: 1.42857143;
				color: #2c3e50;
				background-color: #e2dfdf;
				background-image: none;
				border: 1px solid #b5b5b5;
				border-radius: 4px;
				-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
				box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
				-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
				-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
				transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body style="background-image: url(img/intro/intro-bg.jpg);max-height:100%;">
		<!-- Intro Section -->
		<section class="intro">
			<div class="gradient"></div>
			<div class="container">
				<div class="column-wrap">
					<!-- Middle Column-->
					<div class="column c-middle">
						<h1 class="logo"><img width="200" src="img/logo-big.png" alt="GaleaSystem"> <?= NOMBRE_APLICACION ?></h1>
						<form class="tab-pane transition scale fade in active whitebox col-md-6 offset-md-3" style="background: white; padding: 20px; border-radius: 21px; opacity: 0.8;" id="frmLogin" autocomplete="off"  onkeypress="firmado(event)">
							<input type="hidden" value="l" name="r" />
							<center>
								<h3>Iniciar Sesión</h3>
							</center>
							<div class="form-group space-top-2x">
								<label for="usuario" class="sr-only">Usuario</label>
								<input type="text" class="form-control" id="usuario" placeholder="Usuario" readonly onfocus="$(this).removeAttr('readonly');" required>
								<span class="error-label"></span>
								<span class="valid-label"></span>
							</div>
							<div class="form-group">
								<label for="password" class="sr-only">Contraseña</label>
								<input type="password" class="form-control" id="pwd" placeholder="Contraseña" readonly onfocus="$(this).removeAttr('readonly');" required>
								<span class="error-label"></span>
								<span class="valid-label"></span>
							</div>
							<div class="space-top-2x clearfix">
								<!--<button type="button" class="btn-round btn-ghost btn-danger pull-left" onclick="limpia()">
									<i class="flaticon-cross37"></i>
								</button>
								<button type="button" value="enviar" onclick="firmado(event)" class="btn-round btn-ghost btn-success pull-right">
									<i class="flaticon-correct7"></i>
								</button>-->
								<button type="button" value="enviar" onclick="firmado(event)" class="waves-effect waves-light btn-large blue-grey darken-3" style="width:100%;">ENTRAR</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section><!-- Intro Section End -->
		
		<!-- Footer -->
		<!-- Javascript (jQuery) Libraries and Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/plugins/bootstrap.min.js"></script>
		<script src="js/toastr.min.js"></script>
	</body><!-- Body End-->
	</body>
</html>

<?php
} else {
	header('Status: 301 Moved Permanently', false, 301);
	header('Location: ./' . $_SESSION['Usuario']['pag_inicial']);

}
?>
