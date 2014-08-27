				<article class="blog-entrada">
					<h2><a href="/blog.php?articulo=<?=$urlPost?>"><?=$titulo?></a></h2>
					<p class="blog-entrada-informacion-adicional"><span class="blog-entrada-fecha"><?=$fecha?></span> - <span class="blog-entrada-etiquetas"><?php $cad=''; foreach( $tags as $key => $value ){ $cad .= $value . ', '; } echo substr($cad,0,-2); ?></span></p>
					<?=$resumen?>
					<a href="/blog.php?articulo=<?=$urlPost?>" class="blog-entrada-ver-mas">Leer más...</a>
					<figure>
						<a href="/blog.php?articulo=<?=$urlPost?>"><img src="imagenes/blog/<?=$imagen?>" alt="imagen de la entrada <?=$titulo?>" width="<?=$imgWidth?>" height="<?=$imgHeight?>"></a>
					</figure>
				</article>