<header>
	<?php
		require_once ('utils.php');
		$pageURL = curPageURL();
		$page = $pageURL[count($pageURL) - 1];
		$dir = $pageURL[count($pageURL) - 2];
		$miliseconds = microtime(true);
	?>
	<div id="header-contenedor">
		<a href="<?=$BASEURL?>index.php" id="logotipo"><img src="<?=$BASEURL?>imagenes/logotipo.gif?<?=$miliseconds?>" alt="logotipo de cajabaja" width="229" height="48"></a>
		<nav>
			<ul>
				<li>
					<a href="<?=$BASEURL?>index.php"<?php if($page == 'index.php') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-inicio"></span><span class="nav-txt">INICIO</span></a>
				</li><li>
					<a href="<?=$BASEURL?>servicios.php"<?php if($page == 'servicios.php') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-servicios"></span><span class="nav-txt">SERVICIOS</span></a>
				</li><li>
					<a href="<?=$BASEURL?>proyectos.php"<?php if($page == 'proyectos.php') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-proyectos"></span><span class="nav-txt">PROYECTOS</span></a>
				</li><li>
					<a href="<?=$BASEURL?>equipo.php"<?php if($page == 'equipo.php') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-equipo"></span><span class="nav-txt">EQUIPO</span></a>
				</li><li>
					<a href="<?=$BASEURL?>blog.php"<?php if($page == 'blog.php' || $dir == 'articulos') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-blog"></span><span class="nav-txt">BLOG</span></a>
				</li><li>
					<a href="<?=$BASEURL?>contacto.php"<?php if($page == 'contacto.php') {echo ' class="nav-seleccionado"';}?>><span class="nav-img nav-img-contacto"></span><span class="nav-txt">CONTACTO</span></a>
				</li>
			</ul>
		</nav>
	</div>
</header>