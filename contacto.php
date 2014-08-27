<?php require_once 'includes/utils.php';
	$postResult = false;
	if( $_POST ){
		$postResult = checkDatosFormContacto( $_POST );
	}
	if( $postResult === true ){
		require_once 'includes/mailing.php';
		$mailResult = sendContactoEmail( $_POST );
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Contacta con nosotros | Cajabaja</title>
	<link rel="shortcut icon" type="image/x-icon" href="./imagenes/favicon.ico">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include ('includes/header.php'); ?>
	<div id="cuerpo">
		<div id="cuerpo-contenedor">
			<?php if( $postResult !== false ): ?>
			<section id="contacto-formulario-mensaje">
				<article id="contacto-formulario-mensaje-contenido">
					<?php if( $postResult === true ): ?>
					<p class="columna-unica">Su mensaje se ha enviado correctamente.</p>
					<p class="columna-unica">Nos hemos puesto a procesarlo inmediatamente y pronto recibirá una respuesta.</p>
					<?php else: 
						echo $postResult;
					endif; ?>
				</article>
			</section>
			<?php endif; ?>
			<div id="map-canvas"></div>
			<section id="contacto-introduccion">
				<article id="contacto-introduccion-contenido" class="contenido-estandar">		
					<h1 class="columna-unica">Déjanos unas líneas</h1>
					<p class="columna-unica">Si deseas contratar nuestros servicios, necesitas que te resolvamos alguna duda o simplemente te apetece saludarnos, escríbenos. Estaremos encantados de recibir noticias tuyas.</p>
				</article>
			</section>
			<form class="contacto-formulario" action="contacto.php" method="post">
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
						<textarea rows="10" class="efecto-placeholder contacto-formulario-elemento-requerido" data-tipo="comentario" data-value="Escribe tu comentario" name="adicional">Escribe tu comentario</textarea>
					</div>
				</div>
				<div class="contacto-formulario-fila contenido-estandar">
					<div class="contacto-formulario-elemento contacto-formulario-elemento-unico">
						<input type="submit" value="ENVIAR" class="boton contacto-formulario-elemento-submit">
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