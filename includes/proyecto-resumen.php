						<article class="<?php foreach( $catProy as $key => $value ){ echo "proyectos-".strtolower( $value )." "; } ?>">
							<div class="proyectos-columna">
								<figure class="proyectos-icono">
									<img src="imagenes/trabajos/<?=$fichLogo?>" alt="logotipo de <?=$nombreProy?>" width="<?=$widthLogo?>" height="<?=$heightLogo?>">
								</figure>
							</div><div class="proyectos-columna elemento-central">
								<h2><?= $nombreProy ?></h2>
								<?= $descProy ?>
								<p class="proyectos-etiquetas"><span>Categorias:</span> <?php $cad=''; foreach( $catProy as $key => $value ){ $cad .= ucfirst ( strtolower( $value )). ', '; } echo substr($cad,0,-2); ?></p>
							</div><div class="proyectos-columna">
								<figure class="proyectos-imagen">
									<img src="imagenes/trabajos/<?=$fichImg?>" alt="imagen proyecto <?=$nombreProy?>" width="<?=$widthImg?>" height="<?=$heightImg?>">
								</figure>
							</div>
						</article>