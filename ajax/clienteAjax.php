<?php
	$peticionAjax=true;
	require_once "../config/APP.php";

	if(isset($_POST['cliente_dni_reg'])){

		/*--------- Instancia al controlador ---------*/
		require_once "../controlador/clienteControlador.php";
		$ins_cliente = new clienteControlador();


		/*--------- Agregar un usuario ---------*/
		if(isset($_POST['cliente_dni_reg']) && isset($_POST['cliente_nombre_reg'])){
			echo $ins_cliente->agregar_cliente_controlador();
		}

		
	}else{
		session_start(['name'=>'SPM']);
		session_unset();
		session_destroy();
		header("Location: ".SERVERURL."login/");
		exit();
	}