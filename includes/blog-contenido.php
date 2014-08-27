			<section id="entrada">
				<article id="entrada-articulo">
					<h1><?=$titulo?></h1>
					<p class="entrada-informacion-adicional"><span class="blog-entrada-fecha"><?=$fecha?></span> - <span class="blog-entrada-etiquetas"><?php $cad=''; foreach( $tags as $key => $value ){ $cad .= $value . ', '; } echo substr($cad,0,-2); ?></span></p>
					<figure>
						<img src="imagenes/blog/<?=$imagen?>" alt="imagen de la entrada <?=$titulo?>" width="<?=$imgWidth?>" height="<?=$imgHeight?>">
					</figure>
					<?=$contenido?>
					<a href="/blog.php" class="entrada-volver">Volver...</a>
				</article>
			</section>