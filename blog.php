<?php
	$nomPost = false;
	if( isset( $_GET['articulo'] )){
		$nomPost = str_replace( ['/','\\','<','>','.'], '', $_GET['articulo'] );
		if( !file_exists( "blog/{$nomPost}.php" )){ $nomPost = false; }
		else{ include "blog/{$nomPost}.php"; }
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if( $nomPost != false ):	?>
	<title>Blog: <?=$titulo?> | Cajabaja</title>
	<?php else: ?>
	<title>Articulos sobre diseño y desarrollo web | Cajabaja</title>
	<?php endif; ?>
	<link rel="shortcut icon" type="image/x-icon" href="./imagenes/favicon.ico">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include ('includes/header.php'); ?>
	<div id="cuerpo">
		<div id="cuerpo-contenedor">
			<?php //Cuando no mostramos ningún post mostramos la lista de entradas
			if( $nomPost === false ):	?>
			<section id="blog-introduccion">
				<article id="blog-introduccion-contenido">
					<h1 class="columna-unica">Disfruta de nuestros articulos</h1>
					<p class="columna-unica">¿Quieres ver un poco de nuestro trabajo? Aquí te mostramos los últimos trabajos que hemos realizado. ¡Esperamos que te gusten!</p>
				</article>
			</section>
			<section id="blog-entradas">
			<?php $listaEntradas = glob("./blog/*.php");
				$listaEntradas = array_reverse( $listaEntradas );
				foreach ($listaEntradas as $key => $value){
					include $value;
					$urlPost = basename( $value , '.php' );
					include 'includes/blog-resumen.php';
				}?>
			</section>
			<?php else: //Mostramos una entrada 
				include 'includes/blog-contenido.php';
			endif;?>
		</div>
	</div>
	<?php include ('includes/footer.php'); ?>
	<script src="./js/jquery-1.9.1.js"></script>
	<script src="./js/scripts.js"></script>
</body>
</html>