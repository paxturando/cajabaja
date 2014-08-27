<?php
$BASEURL = './';
$BLOG_BASEURL = $BASEURL . 'articulos/';
$PROYECTOS_BASEURL = $BASEURL . 'proyectos/';

function curPageURL() {
	$pageURL = 'http';
	if (isset( $_SERVER["HTTPS"] )&&( $_SERVER["HTTPS"] == "on" )){
		$pageURL .= "s";
	}
	$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80") {
  		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 	} 
 	else {
  		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	$arrpageURL = explode('/',$pageURL);
	return $arrpageURL;
}

function checkDatosFormServicios( $datosPost ){
	$result = false;
	if( isset( $datosPost )&&count( $datosPost ) > 0 ){
		$result = true;
		foreach ($datosPost as $key => $value) {
			switch( $key ){
				case 'nombre':
					if( count( $value ) == 0 ){
						$result = '<p class="columna-unica">No se ha podido enviar la solicitud.</p><p class="columna-unica">Hay algún error en el campo nombre, por favor revise que está completo.</p>';
					}
					break;
				case 'email':
					if( !preg_match( '/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9])+$/', $value )){
						$result = '<p class="columna-unica">No se ha podido enviar la solicitud.</p><p class="columna-unica">Hay algún error en el campo email, por favor revise que es correcto.</p>';
					}
					break;
			}
		}
	}
	return $result;
}

function checkDatosFormContacto( $datosPost ){
	$result = false;
	if( isset( $datosPost )&&count( $datosPost ) > 0 ){
		$result = true;
		foreach ($datosPost as $key => $value) {
			switch( $key ){
				case 'nombre':
					if( count( $value ) == 0 ){
						$result = '<p class="columna-unica">No se ha podido enviar la solicitud.</p><p class="columna-unica">Hay algún error en el campo nombre, por favor revise que está completo.</p>';
					}
					break;
				case 'email':
					if( !preg_match( '/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9])+$/', $value )){
						$result = '<p class="columna-unica">No se ha podido enviar la solicitud.</p><p class="columna-unica">Hay algún error en el campo email, por favor revise que es correcto.</p>';
					}
					break;
			}
		}
	}
	return $result;
}
?>