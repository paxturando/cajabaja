<?php require_once 'includes/utils.php';
	$postResult = false;
	if( $_POST ){
		$postResult = checkDatosFormServicios( $_POST );
	}
	if( $postResult === true ){
		require_once 'includes/mailing.php';
		$mailResult = sendServiciosEmail( $_POST );
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Servicios gráficos y tecnológicos | Cajabaja</title>
	<link rel="shortcut icon" type="image/x-icon" href="./imagenes/favicon.ico">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include ('includes/header.php'); ?>
	<div id="cuerpo">
		<div id="cuerpo-contenedor">
			<?php if( $postResult !== false ): ?>
			<section id="servicios-formulario-mensaje">
				<article id="servicios-formulario-mensaje-contenido" class="contenido-estandar">
					<?php if( $postResult === true ): ?>
					<p class="columna-unica">Su solicitud se ha enviado correctamente.</p>
					<p class="columna-unica">Nos hemos puesto a procesarla inmediatamente y pronto recibirá su presupuesto.</p>
					<?php else: 
						echo $postResult;
					endif; ?>
				</article>
			</section>
			<?php endif; ?>
			<section id="servicios-introduccion" class="contenido-estandar">
				<article id="servicios-introduccion-contenido">
					<h1 class="columna-unica">¡Diseña tu negocio!</h1>
					<p class="columna-unica">¡¡¡¡¡Falta el texto explicando que hemos seleccionado los servicios mas molones y las instrucciones para seleccionarlos!!!!! He dejado las filas con tres servicios, si hicieran falta mas ya lo veré a la vuelta.</p>
				</article>
			</section>
			<section id="servicios-tipos" class="contenido-estandar">
				<article>
					<span id="servicios-tipos-amarillo" class="servicios-tipos-icono"></span>
					<div>
						<h2>SERVICIOS DE DISEÑO</h2>
						<p>Servicios que toda empresa debe tener para su correcto funcionamiento inicial en el mercado.</p>
					</div>
				</article><article>
					<span id="servicios-tipos-verde" class="servicios-tipos-icono"></span>
					<div>
						<h2>SERVICIOS EN INTERNET</h2>
						<p>Servicios que toda empresa debe tener para su correcto funcionamiento inicial en el mercado.</p>
					</div>
				</article>
			</section>
			<section id="servicios">
				<article class="servicios-amarillo servicios-elemento">
					<h3>BRANDING</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eiusmod tempor incididunt esta aplicacion va a molar.</p>
				</article><article class="servicios-amarillo servicios-elemento">
					<h3>DISEÑO</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eiusmod tempor incididunt esta aplicacion va a molar.</p>
				</article><article class="servicios-amarillo servicios-elemento">
					<h3>ILUSTRACIÓN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eiusmod tempor incididunt esta aplicacion va a molar.</p>
				</article><article class="servicios-verde servicios-elemento">
					<h3>WEB</h3>
					<p>La web incluye:</p>
					<ul>
						<li>Hosting gratuito</li>
						<li>Responsive design</li>
						<li>Mantenimiento</li>
						<li>Asistencia</li>
					</ul>
				</article><article class="servicios-verde servicios-elemento">
					<h3>ECOMMERCE</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eiusmod tempor incididunt esta aplicacion va a molar.</p>
				</article><article class="servicios-verde servicios-elemento">
					<h3>APP</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, eiusmod tempor incididunt esta aplicacion va a molar.</p>
				</article>
			</section>
			<section id="servicios-contacto" class="contenido-estandar">
				<article id="servicios-contacto-contenido">		
					<h4 class="columna-unica">Déjanos tus datos de contacto</h1>
					<p class="columna-unica">A continuación indíque su información de contacto y en un tiempo muy breve recibirá el presupuesto en su buzón de correo.</p>
				</article>
			</section>
			<form class="contacto-formulario" action="servicios.php" method="post">
				<div class="contacto-formulario-fila contacto-formulario-fila-primera contenido-estandar">
					<div class="contacto-formulario-elemento">
						<input type="text" value="Escribe tu nombre" class="efecto-placeholder contacto-formulario-elemento-requerido" data-tipo="nombre" data-value="Escribe tu nombre" name="nombre">
					</div><div class="contacto-formulario-elemento elemento-central">
						<input type="text" value="Escribe tu email" class="efecto-placeholder contacto-formulario-elemento-requerido" data-tipo="email" data-value="Escribe tu email" name="email">
					</div><div class="contacto-formulario-elemento">
						<input type="text" value="Escribe tu teléfono" class="efecto-placeholder" data-tipo="telefono" data-value="Escribe tu teléfono" name="telefono">
					</div>
				</div>
				<div class="contacto-formulario-fila contenido-estandar">
					<div class="contacto-formulario-elemento contacto-formulario-elemento-unico contacto-formulario-elemento-textarea">
						<textarea rows="10" class="efecto-placeholder" data-tipo="comentario" data-value="Información adicional" name="adicional">Información adicional</textarea>
					</div>
				</div>
				<div class="contacto-formulario-fila contenido-estandar">
					<div class="contacto-formulario-elemento contacto-formulario-elemento-unico">
						<input type="submit" value="¡LISTO!" class="boton contacto-formulario-elemento-submit">
						<p>Corrige los errores para continuar</p>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include ('includes/footer.php'); ?>
	<script src="./js/jquery-1.9.1.js"></script>
	<script src="./js/scripts.js"></script>
</body>
</html>