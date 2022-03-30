<?php
	
	require_once "./modelo/vistaModelo.php";

	class vistaControlador extends vistaModelo{

		/*--------- Controlador obtener plantilla ---------*/
		public function obtener_plantilla_controlador(){
			return require_once "./vista/plantilla.php";
		}

		/*--------- Controlador obtener vistas ---------*/
		public function obtener_vista_controlador(){
			if(isset($_GET['views'])){
				$ruta=explode("/", $_GET['views']);
				$respuesta=vistaModelo::obtener_vista_modelo($ruta[0]);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}
	}