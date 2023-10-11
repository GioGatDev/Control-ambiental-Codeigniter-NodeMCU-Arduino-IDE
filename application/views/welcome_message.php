<script language="javascript" type="text/javascript">
	//VARIABLES PARA IDENTIFICAR LOS SENSORES
	var RequestObject = false;		//temperatura
	var RequestObject2 = false;		//humedad
	var RequestObject3 = false;		//gas
	var RequestObject4 = false;		//fuego
	var RequestObject5 = false;		//fuego

	/*DIRECTORIO DE LAS CLASES DE DONDE SE TOMAN LOS DATOS*/
	var temperatura = 'ip-servidor/sensores/temp.php';
	var humedad = 'ip-servidor/sensores/hum.php';
	var gas = 'ip-servidor/sensores/gas.php';
	var fuego = 'ip-servidor/sensores/fuego.php';
	var luz = 'ip-servidor/sensores/luz.php';
	//SEGMENTO DE PETICIÓN DE DATOS
	window.setInterval("actualizacion_reloj()", 2000); //FUNCIÓN PARA EL TIEMPO DE RECARGA
	if (window.XMLHttpRequest) RequestObject = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject = new ActiveXObject("Microsoft.XMLHTTP");
	if (window.XMLHttpRequest) RequestObject2 = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject2 = new ActiveXObject("Microsoft.XMLHTTP");
	if (window.XMLHttpRequest) RequestObject3 = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject3 = new ActiveXObject("Microsoft.XMLHTTP");
	if (window.XMLHttpRequest) RequestObject4 = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject4 = new ActiveXObject("Microsoft.XMLHTTP");
	if (window.XMLHttpRequest) RequestObject5 = new XMLHttpRequest();
	if (window.ActiveXObject) RequestObject5 = new ActiveXObject("Microsoft.XMLHTTP");
	function ReqChange() {
		// Si se ha recibido la información correctamente
		if (RequestObject.readyState == 4) {
			// si la información es válida
			if (RequestObject.responseText.indexOf('invalid') == -1) {
				// Buscamos la div con id online
				document.getElementById("online").innerHTML = RequestObject.responseText;
				document.getElementById("humedad").innerHTML = RequestObject2.responseText;
				document.getElementById("gas").innerHTML = RequestObject3.responseText;
				document.getElementById("fuego").innerHTML = RequestObject4.responseText;
				document.getElementById("luz").innerHTML = RequestObject5.responseText;
			} else {
				// MENSAJE DE ERROR EN CASO DE QUE ALGO SALGA MAL
				document.getElementById("online").innerHTML = "Error llamando";
			}
		}
	}
	function llamadaAjax() {
		// Mensaje a mostrar mientras se obtiene la información remota...
		document.getElementById("online").innerHTML = "";
		document.getElementById("humedad").innerHTML = "";
		// Preparamos la obtención de respuesta de datos
		RequestObject.open("GET", "ip-servidor/sensores/temp.php", true);		//temperatura
		RequestObject2.open("GET", "ip-servidor/sensores/hum.php", true);	//humedad
		RequestObject3.open("GET", "ip-servidor/sensores/gas.php", true);	//gas
		RequestObject4.open("GET", "ip-servidor/sensores/fuego.php", true);	//fuego
		RequestObject5.open("GET", "ip-servidor/sensores/luz.php", true);	//fuego
		RequestObject.onreadystatechange = ReqChange;
		RequestObject2.onreadystatechange = ReqChange;
		RequestObject3.onreadystatechange = ReqChange;
		RequestObject4.onreadystatechange = ReqChange;
		RequestObject5.onreadystatechange = ReqChange;
		// Envio de los datos
		RequestObject.send();
		RequestObject2.send();
		RequestObject3.send(null);
		RequestObject4.send(null);
		RequestObject5.send(null);
	}
	//ejecución de la función para refrescar los datos
	function actualizacion_reloj() {
		llamadaAjax();
	}
</script>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<input type="hidden" id="contextPath" name="contextPath" value="<?php echo base_url(); ?>">
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Control Ambiental NodeMCU</title>
	<!--CARGA DE ARCHIVOS DE ESTILOS, PLUGINS Y LIBRERIAS -->
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- Toastr style -->
	<link href="<?php echo base_url(); ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<!-- Gritter -->
	<link href="<?php echo base_url(); ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/plugins/steps/jquery.steps.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper wrapper-content">
		<!-- BARRA DE INFORMACION GENERAL ESTATUS DE SENSORES  -->
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-6">
					<div class="ibox float-e-margins"> <!--CONTENEDOR DE TEMPERATURA-->
						<div class="ibox-title">
							<span class="label label-success pull-right">ºC </span>
							<h5>Temperatura</h5>
						</div>
						<div id="online" class="ibox-content"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ibox float-e-margins"><!--CONTENEDOR DE HUMEDAD-->
						<div id="online" class="ibox-title">
							<span class="label label-info pull-right">%</span>
							<h5>Humedad</h5>
						</div>
						<div id="humedad" class="ibox-content"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ibox float-e-margins"> <!--CONTENEDOR DE GAS-->
						<div class="ibox-title">
							<span class="label label-primary pull-right">!</span>
							<h5>Gas</h5>
						</div>
						<div id="gas" class="ibox-content"> </div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ibox float-e-margins"> <!--CONTENEDOR DE FUEGO-->
						<div class="ibox-title">
							<span class="label label-danger pull-right">!</span>
							<h5>Fuego</h5>
						</div>
						<div id="fuego" class="ibox-content"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="ibox float-e-margins"><!--CONTENEDOR DE LUZ DE JARDÍN-->
						<div class="ibox-title">
							<span class="label label-primary pull-right">*</span>
							<h5>Luz de jardín</h5>
						</div>
						<div id="luz" class="ibox-content"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div><!-- Cierra el contenedor de todo el panel -->