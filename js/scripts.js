const circulo_animacion_velocidad = 20;
const contacto_formulario_animacion_velocidad = 200;
const efecto_scroll_animacion_delay = 300;
const efecto_scroll_animacion_margen = 50;
const enlace_flecha_animacion_velocidad = 10;
const fachada_animacion_delay = 500;
const fachada_animacion_velocidad = 300;
const filtros_animacion_velocidad = 500;
const nav_animacion_margen = 19;
const nav_animacion_velocidad = 200;
const servicios_margen = 3;
const ultimos_trabajos_animacion_velocidad = 300;

const latitudGenerica = 39.4759616;
const longitudGenerica = -0.3795691;

var circulo_animacion_incremento_angulo = 3;
var circulo_animacion_timeout = null;
var enlace_flecha_animacion_bolas_parcial = 0;
var enlace_flecha_animacion_bolas_total = 5;
var enlace_flecha_animacion_flag = 0;
var enlace_flecha_animacion_timeout = null;
var nav_animacion_flag = 0;
var map = null;
var servicios_elementos = 3;

$(document).ready(function() {
	inicializar();
	load_script();
	redimensionar();

	$(window).on('focus',redimensionar);
	$(window).on('resize',redimensionar);
	$(window).on('scroll',detectar_scroll);
	$('nav ul li a').on('mouseleave',nav_animacion_ocultar);
	$('nav ul li a').on('mouseover',nav_animacion_mostrar);
	$('#fachada').on('mousemove',efecto_parallax);
	$('#footer-contenedor-principal-redes-sociales li a').on('mouseleave',circulo_animacion_ocultar);
	$('#footer-contenedor-principal-redes-sociales li a').on('mouseover',circulo_animacion_mostrar);
	$('.contacto-formulario-elemento input').on('blur',function(){contacto_formulario_elemento_comprobar($(this))});
	$('.contacto-formulario-elemento textarea').on('blur',function(){contacto_formulario_elemento_comprobar($(this))});
	$('.contacto-formulario-elemento-submit').on('click',contacto_formulario_validar);
	$('.efecto-placeholder').on('blur',efecto_texto_restaurar);
	$('.efecto-placeholder').on('focus',efecto_texto_limpiar);
	$('.footer-contenedor-principal-quienes-somos-enlace').on('mouseleave',enlace_flecha_animacion_ocultar);
	$('.footer-contenedor-principal-quienes-somos-enlace').on('mouseover',enlace_flecha_animacion_mostrar);
	$('.proyectos-filtros-contenido-enlace a').on('click',proyectos_filtrar);
	$('.servicios-elemento').on('click',servicios_elemento_check);
	$('.ultimos-trabajos-imagen a').on('mouseleave',ultimos_trabajos_animacion_ocultar);
	$('.ultimos-trabajos-imagen a').on('mouseover',ultimos_trabajos_animacion_mostrar);
});
function circulo_animacion_mostrar(event) {
	var circulo = $(event.currentTarget).children('span.footer-contenedor-principal-redes-sociales-circulo');

	if (circulo.css('opacity') == '0') {	
		circulo.css({'opacity':'1'});
		circulo_animacion_timeout = setTimeout(circulo_animacion_rotar,circulo_animacion_velocidad,circulo,circulo_animacion_incremento_angulo);
	};
}
function circulo_animacion_ocultar() {
	var circulo = $(event.currentTarget).children('span.footer-contenedor-principal-redes-sociales-circulo');

	if (circulo.css('opacity') == '1') {	
		circulo.css({'opacity':'0'});
		clearTimeout(circulo_animacion_timeout);
	};
}
function circulo_animacion_rotar(elemento,angulo) {
	elemento.css({'-webkit-transform':'rotate('+angulo+'deg)','-moz-transform':'rotate('+angulo+'deg)','-ms-transform':'rotate('+angulo+'deg)','-o-transform':'rotate('+angulo+'deg)','transform':'rotate('+angulo+'deg)'})
	circulo_animacion_timeout = setTimeout(circulo_animacion_rotar,circulo_animacion_velocidad,elemento,angulo+circulo_animacion_incremento_angulo);
}
function contacto_formulario_elemento_comprobar(elemento) {
	if (elemento.hasClass('contacto-formulario-elemento-requerido')) {
		if (elemento.val() == '' || elemento.val() == elemento.attr('data-value')) {
			elemento.addClass('contacto-formulario-elemento-seleccionado');
			return false;
		}
		else
		{
			elemento.removeClass('contacto-formulario-elemento-seleccionado');
		};
	};
	if (elemento.attr('data-tipo') == 'email') {
		var filtro_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9_+-])+\.)+([a-zA-Z0-9])+$/;

		if (!filtro_email.test(elemento.val())) {
			elemento.addClass('contacto-formulario-elemento-seleccionado');
			return false;
		}
		else
		{
			elemento.removeClass('contacto-formulario-elemento-seleccionado');
		};
	};
	return true;
}
function contacto_formulario_validar(event) {
	var resultado = true;
	var elemento = $(event.currentTarget);
	var formulario = elemento.parents('.contacto-formulario');

	formulario.find('.contacto-formulario-elemento').each(function(){
		var elemento_formulario = $(this).children(':first-child');

		if (!contacto_formulario_elemento_comprobar(elemento_formulario)) {
			resultado = false;
		};		
	});

	if (!resultado) {
		var mensaje = elemento.siblings('p');
		mensaje.css({'top':(elemento.parent().height() - mensaje.height()) / 2, 'right':(-1)*(mensaje.width() - 4)}).stop().animate({'opacity':'1'},contacto_formulario_animacion_velocidad);
		
		event.preventDefault();
	};
}
function detectar_scroll()
{
	if ($('.efecto-scroll').length > 0) {
		efecto_scroll();
	};
}
function efecto_parallax(event)
{
	var contenedor = $(event.currentTarget);
	var imagen = contenedor.children('img#fachada-fondo');

	if (contenedor.width() >= 980) {
		var contH = contenedor.height();
		var contW = contenedor.width();
		var imgH = imagen.height();
		var imgW = imagen.width();

		var difX = imgW - contW;
		var difY = imgH - contH;
		var pageX = event.pageX - contenedor.offset().left;
		var pageY = event.pageY - contenedor.offset().top;

		var posX = (-1 * pageX * difX) / contW;
		var posY = (-1 * pageY * difY) / contH;

		imagen.css({'left':posX + 'px','top':posY + 'px'});
	};
}
function efecto_scroll() {
	var elementos = $('.efecto-scroll');
	var elementos_visibles = [];
	var scroll_top = $(window).scrollTop() - efecto_scroll_animacion_margen;
	elementos.each(function() {
		if ($(this).offset().top - $(window).height() < scroll_top) {
			$(this).removeClass('efecto-scroll');
			elementos_visibles.push($(this));
		};
	});
	
	$.each(elementos_visibles,function(index) {
		setTimeout(efecto_scroll_animacion,index * efecto_scroll_animacion_delay,$(this));
	});
}
function efecto_scroll_animacion(elemento) {
	elemento.css({'-moz-transform':'scale(1)','-webkit-transform':'scale(1)','transform':'scale(1)'});
}
function efecto_texto_limpiar(event) {
	var elemento = $(event.currentTarget);

	if (elemento.val() == elemento.attr('data-value')) {
		elemento.val('');
	};
}
function efecto_texto_restaurar(event) {
	var elemento = $(event.currentTarget);

	if (elemento.val() == '') {
		elemento.val(elemento.attr('data-value'));
	};
}
function enlace_flecha_animacion(elemento, mostrar) {
	var contenedor = elemento.parent();
	var texto = elemento.children('.footer-contenedor-principal-quienes-somos-enlace-texto');
	var espacio = '&nbsp;'

	if (mostrar) {
		var cadena_split = texto.html().split('·');
		if (cadena_split[cadena_split.length - 1].length < (espacio.length * 2)) {
			texto.append(espacio);
		}
		else if (enlace_flecha_animacion_bolas_parcial < enlace_flecha_animacion_bolas_total) {
			enlace_flecha_animacion_bolas_parcial++;
			texto.append('·');
		}
		else {
			enlace_flecha_animacion_flag = 0;
			enlace_flecha_animacion_timeout = null;
			return;
		};
	}
	else {
		var cadena_cortada = texto.html();

		if (texto.html()[texto.html().length - 1] == '·') {
			enlace_flecha_animacion_bolas_parcial--;
			cadena_cortada = cadena_cortada.substring(0,cadena_cortada.length - 1);
			texto.html(cadena_cortada);

			if (enlace_flecha_animacion_bolas_parcial == 0) {
				enlace_flecha_animacion_flag = 0;
				enlace_flecha_animacion_timeout = null;
				return;
			};
		}
		else {
			cadena_cortada = cadena_cortada.substring(0,cadena_cortada.length - espacio.length);
			texto.html(cadena_cortada);
		};		
	};
	enlace_flecha_animacion_timeout = setTimeout(enlace_flecha_animacion,enlace_flecha_animacion_velocidad,elemento,mostrar);
}
function enlace_flecha_animacion_mostrar(event) {
	if (enlace_flecha_animacion_flag != 1) {
		enlace_flecha_animacion_flag = 1;
		clearTimeout(enlace_flecha_animacion_timeout);
		enlace_flecha_animacion_timeout = null;

		var elemento = $(event.currentTarget);
		enlace_flecha_animacion(elemento,1);
	};
}
function enlace_flecha_animacion_ocultar(event) {
	if (enlace_flecha_animacion_flag != -1) {
		enlace_flecha_animacion_flag = -1;
		clearTimeout(enlace_flecha_animacion_timeout);
		enlace_flecha_animacion_timeout = null;

		var elemento = $(event.currentTarget);
		enlace_flecha_animacion(elemento,0);
	};
}
function initialize() {
    var posicion = new google.maps.LatLng(latitudGenerica, longitudGenerica);
    var mapOptions = {
        zoom: 15,
        center: posicion,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var infowindow = new google.maps.InfoWindow({
        content: '<div id="infowindow"><h4>cajabaja</h4><p>Plza del Marqués de Busianos,</p><p>n2, Bajo Izquierda, 46001, </p><p>(Valencia)</p></div>'
    });

    var marker = new google.maps.Marker({
        position: posicion
    });
    marker.setIcon("imagenes/ubicacion.png");
    marker.setMap(map);

    infowindow.open(map, marker);
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}
function load_script() {
	if ($('#map-canvas').length > 0) {
    	var script = document.createElement("script");
    	script.type = "text/javascript";
    	script.src = "https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyDpnwbH9QSfxqYi95ydpBOchQAeXJP0MfI&sensor=false&callback=initialize";
    	document.body.appendChild(script);
	};
}
function proyectos_filtrar(event) {
	var elemento = $(event.currentTarget)
	var elemento_seleccionado = $('.proyectos-filtros-seleccionado');
	var categoria = elemento.attr('data-categoria');
	var elementos = $('#proyectos article');

	elemento_seleccionado.removeClass('proyectos-filtros-seleccionado');
	elemento.addClass('proyectos-filtros-seleccionado');

	elementos.each(function() {
		var proyecto = $(this);
		var altura_proyecto = parseInt(proyecto.css('border-top')) + parseInt(proyecto.css('padding-top')) + parseInt(proyecto.css('height')) + parseInt(proyecto.css('padding-bottom')) + parseInt(proyecto.css('border-bottom'));
		
		if (proyecto.hasClass(categoria) || categoria == 'proyectos-todos') {
			proyecto.css({'z-index':'0'}).stop().animate({'margin-top':0},filtros_animacion_velocidad);
		}
		else {
			proyecto.css({'z-index':'-10'}).stop().animate({'margin-top':(-1)*altura_proyecto},filtros_animacion_velocidad);
		};
	});

	event.preventDefault();
}
function redimensionar() {
	if ($('nav').length > 0) {
		redimensionar_nav();
	};
	if ($('#fachada').length > 0) {
		redimensionar_fachada();
	};
	if($('#map-canvas').length > 0) {
		redimensionar_mapa();
	};
	if ($('#servicios').length > 0) {
		redimensionar_servicios();
	};	
	if ($('#ultimos-trabajos').length > 0) {
		redimensionar_ultimos_trabajos();	
	};
}
function redimensionar_fachada() {
	var contenedor = $('#fachada');
	var borde = contenedor.children('div');
	var marca = contenedor.children('#fachada-marca');
	var fondo = contenedor.children('#fachada-fondo');
	
	borde.css({'width':contenedor.width() - parseInt(borde.css('margin-left')) - parseInt(borde.css('margin-right')) - parseInt(borde.css('border-left')) - parseInt(borde.css('border-right')),'height':contenedor.height() - parseInt(borde.css('margin-top')) - parseInt(borde.css('margin-bottom')) - parseInt(borde.css('border-top')) - parseInt(borde.css('border-bottom'))});
	marca.css({'left':(contenedor.width() - marca.width()) / 2,'top':(contenedor.height() - marca.height()) / 2});

	if (contenedor.width() < 980) {
		var contH = contenedor.height();
		var contW = contenedor.width();
		var imgH = fondo.attr('height');
		var imgW = fondo.attr('width');

		if (imgH && imgW) {
			var ratio = imgW / imgH;

			imgH = contH;
			imgW = imgH * ratio;

			if (contW > imgW) {
				imgW = contW;
				imgH = imgW / ratio;
			};
			fondo.css({'width':imgW,'height':imgH,'left':(imgW-contW)/-2,'top':(imgH-contH)/-2});
		};
	}
	else {
		fondo.css({'width':parseInt(fondo.attr('width')),'height':parseInt(fondo.attr('height')),'left':(parseInt(fondo.attr('width')) - contenedor.width())/-2,'top':(parseInt(fondo.attr('height')) - contenedor.height())/-2});
	};
}
function redimensionar_mapa() {
	if (typeof google != "undefined") {
		var posicion = new google.maps.LatLng(latitudGenerica, longitudGenerica);
		map.setCenter(posicion);
	};
}
function redimensionar_nav() {
	var contenedor = $('nav ul');
	var elementos = contenedor.children('li');

	var anchura = contenedor.width() / elementos.length;

	elementos.each(function(){
		var elemento = $(this);
		var enlace = $(this).children('a');

		if (enlace.children('.nav-img').is(':visible')) {
			elemento.css({'width':'80px'});
			enlace.css({'width':'auto'});
		}
		else {
			elemento.css({'width':anchura});
			enlace.css({'width':anchura});
		};
	});
}
function redimensionar_servicios() {
	var contenedor = $('#servicios');
	var servicios = contenedor.children('.servicios-elemento');
	var anchura_contenedor = contenedor.width();

	if (anchura_contenedor <= 480) {
		servicios_elementos = 1;
	}
	else if (anchura_contenedor <= 768) {
		servicios_elementos = 2;
	}
	else {
		servicios_elementos = 3;
	};

	var anchura_servicio = ($(window).width() - (servicios_elementos * servicios_margen * 2)) / servicios_elementos;
	var altura_servicio = 0;
	servicios.each(function (){
		$(this).width(anchura_servicio);
		if ($(this).height() > altura_servicio) {
			altura_servicio = $(this).height();
		};
	});
	servicios.each(function (){
		$(this).height(altura_servicio);
	});
}
function redimensionar_ultimos_trabajos() {
	var ultimos_trabajos_filas_simples = $('.ultimos-trabajos-contenido-fila-simple');
	var ultimos_trabajos_filas_dobles = $('.ultimos-trabajos-contenido-fila-doble');
	var ultimos_trabajos_imagenes_mitades= $('.ultimos-trabajos-imagen-mitad');
	var ultimos_trabajos_imagenes_completas = $('.ultimos-trabajos-imagen-completa');
	var ultimos_trabajos_cuadrado = $(window).width() / 5;

	ultimos_trabajos_filas_simples.each(function(){
		$(this).width('100%').height(ultimos_trabajos_cuadrado * 2);
	});
	ultimos_trabajos_filas_dobles.each(function(){
		$(this).width('100%').height(ultimos_trabajos_cuadrado);
	});
	ultimos_trabajos_imagenes_mitades.each(function(){
		$(this).width('50%').height($(this).parent().height());

		redimensionar_ultimos_trabajos_img($(this));
	});
	ultimos_trabajos_imagenes_completas.each(function(){
		$(this).width('100%').height($(this).parent().height());

		redimensionar_ultimos_trabajos_img($(this));
	});
}
function redimensionar_ultimos_trabajos_img(elemento)
{
	var ultimos_trabajos_contenedor_imagen = elemento.children('a');
	var ultimos_trabajos_imagen = ultimos_trabajos_contenedor_imagen.children('img');
	var contH = elemento.height();
	var contW = elemento.width();
	var imgH = ultimos_trabajos_imagen.attr('data-height');
	var imgW = ultimos_trabajos_imagen.attr('data-width');

	if (imgH && imgW) {
		var ratio = imgW / imgH;

		imgH = contH;
		imgW = imgH * ratio;

		if (contW > imgW) {
			imgW = contW;
			imgH = imgW / ratio;
		}
		ultimos_trabajos_contenedor_imagen.css({'width':contW,'height':contH});
		ultimos_trabajos_imagen.css({'width':imgW,'height':imgH,'margin-left':(imgW-contW)/-2,'margin-top':(imgH-contH)/-2});
	}
}
function inicializar() {
	var contenedor = $('body');
	var pie = $('footer');

	contenedor.css({'padding-bottom':pie.height()});

	if ($('#fachada-marca').length > 0) {
		var fachada = $('#fachada');
		var marca = fachada.children('#fachada-marca');

		marca.css({'left':(fachada.width() - marca.width()) / 2,'top':(fachada.height() - marca.height()) / 2, 'display':'block'}).stop().delay(fachada_animacion_delay).animate({'opacity':'1'},fachada_animacion_velocidad, 'linear');
	};

	if ($('.efecto-scroll').length > 0) {
		efecto_scroll();
	};
}
function nav_animacion_mostrar(event) {
	if (nav_animacion_flag == 0) {
		nav_animacion_flag = 1;

		var elemento = $(event.currentTarget);

		if (!elemento.hasClass('nav-seleccionado') && elemento.children('.nav-img').is(':visible')) {
			elemento.stop().animate({'margin-top':'0'},nav_animacion_velocidad);
		};
	};
}
function nav_animacion_ocultar(event) {
	if (nav_animacion_flag == 1) {
		nav_animacion_flag = 0;
		
		var elemento = $(event.currentTarget);

		if (!elemento.hasClass('nav-seleccionado') && elemento.children('.nav-img').is(':visible')) {
			elemento.stop().animate({'margin-top':nav_animacion_margen},nav_animacion_velocidad);
		}
	};
}
function servicios_elemento_check(event) {
	var elemento = $(event.currentTarget);

	if (!elemento.hasClass('servicios-elemento-seleccionado')) {
		elemento.addClass('servicios-elemento-seleccionado');
	}
	else {
		elemento.removeClass('servicios-elemento-seleccionado');
	};
}
function ultimos_trabajos_animacion_mostrar(event) {
	var contenedor = $(event.currentTarget);
	var imagen = contenedor.children('img');

	if (contenedor.children('div').length == 0) {
		contenedor.append('<div style="width:'+imagen.width()+'px;height:'+imagen.height()+'px;display:block"><p style="line-height:'+contenedor.height()+'px">VER MÁS</p></div>').children('div').stop().animate({'opacity':'0.9'},ultimos_trabajos_animacion_velocidad);
	};
}
function ultimos_trabajos_animacion_ocultar(event) {
	var contenedor = $(event.currentTarget);

	if (contenedor.children('div').length > 0) {
		contenedor.children('div').stop().animate({'opacity':'0'},ultimos_trabajos_animacion_velocidad).queue(function(next) {
			$(this).remove();
			next();
		});
	};
}