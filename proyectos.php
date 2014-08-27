<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Proyectos graficos y tecnológicos | Cajabaja</title>
	<link rel="shortcut icon" type="image/x-icon" href="./imagenes/favicon.ico">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<div id="cuerpo">
		<div id="cuerpo-contenedor">
			<section id="proyectos-introduccion">
				<article id="proyectos-introduccion-contenido">
					<h1 class="columna-unica">Mira como trabajamos</h1>
					<p class="columna-unica">Comprueba por ti mismo la calidad y la personalización de los proyectos que desarrollamos. Trabajamos cada detalle para asegurarnos de que nuestros clientes siempre quedan satisfechos.</p>
					<p>¡Esperamos que te gusten!</p>
				</article>
			</section>
			<section id="proyectos-filtros">
				<ul id="proyectos-filtros-contenido">
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-todos" class="proyectos-filtros-seleccionado">Todos (3)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-branding">Branding (3)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-design">Diseño (0)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-ilustracion">Ilustración (0)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-web">Web (1)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-app">App (1)</a></li>
					<li class="proyectos-filtros-contenido-separador">·</li>
					<li class="proyectos-filtros-contenido-enlace"><a href="#" data-categoria="proyectos-ecommerce">Ecommerce (0)</a></li>
				</ul>
			</section>
			<section id="proyectos">
				<?php $listaProyectos = glob("./proyectos/*.php"); 
				foreach ($listaProyectos as $key => $value){
					include $value;
					include 'includes/proyecto-resumen.php';
				}?>
			</section>
		</div>
	</div>
	<?php include ('includes/footer.php'); ?>
	<script src="./js/jquery-1.9.1.js"></script>
	<script src="./js/scripts.js"></script>
</body>
</html>