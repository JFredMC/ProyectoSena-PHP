<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY; ?></title>

	
	
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
<!-- https://material.io/resources/icons/?style=outline -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined"
      rel="stylesheet">
<!-- https://material.io/resources/icons/?style=round -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round"
      rel="stylesheet">
<!-- https://material.io/resources/icons/?style=sharp -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp"
      rel="stylesheet">
<!-- https://material.io/resources/icons/?style=twotone -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone"
      rel="stylesheet">
	<?php include "./vista/include/Link.php"; ?>
</head>
<body>
	<?php
		$peticionAjax=false;
		require_once "./controlador/vistaControlador.php";
		$IV = new vistaControlador();

		$vistas=$IV->obtener_vista_controlador();

		if($vistas=="login" || $vistas=="404"){
			require_once "./vista/contenido/".$vistas."-view.php";

		}else{
			session_start(['name'=>'SPM']);

			$pagina=explode("/", $_GET['views']);

			require_once "./controlador/loginControlador.php";
			$lc = new loginControlador();

			if(!isset($_SESSION['token_spm']) || !isset($_SESSION['usuario_spm']) || !isset($_SESSION['privilegio_spm']) || !isset($_SESSION['id_spm'])){
				echo $lc->forzar_cierre_sesion_controlador();
				exit();

			}
	?>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<?php include "./vista/include/NavLateral.php"; ?>

		<!-- Page content -->
		<section class="full-box page-content">
			<?php 
				include "./vista/include/NavBar.php";

				include  $vistas;
			?>
		</section>
	</main>
	<?php
		include "./vista/include/LogOut.php";
		}
		include "./vista/include/Script.php"; 
	?>
</body>
</html>