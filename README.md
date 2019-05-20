# HTML, identificación de elementos.

Uno de los retos del HTML es el hecho de que frecuentemente lo vamos a encontrar mezclado con lenguajes de programación e incluso con hojas de estilos. Si bien es cierto que últimamente se han hecho esfuerzos por parte de algunas empresas de separar y diferenciar en diferentes archivos estilos, scripts y controladores, en la realidad sigue siendo habitual (e incluso bastante práctico) encontrar todo dentro de archivos HTML.

## Ejercicios:

* A partir del archivo index.html, se deben separar los estilos, los scripts de front-end y los scripts que no se identifiquen (posíblemente back-end) en archivos separados.

* Abajo del archivo donde se concentre el HTML, se deberán listar las etiquetas (o tags), y los atributos que se encuentren.

* Respecto al presunto código "back-end", hay que intentar identificar de qué lenguaje se trata.

* Cuando se encuentren estilos dentro de un atributo "style" en un elemento, pueden escribirlo en el archivo usando el selector "#" o bien escribiendo tal cual "estilo_inline_anonimo_" y un número secuencial

## Ejemplo:

El siguente código generaría como respuesta lo siguiente:

```
<html>
	<head>
		<title>Es un ejemplo</title>
		<script type="text/javascript">
			function hazAlgo() {
				console.log("Se supone que haga algo");
			}
			</script>
			<style type="text/css">
				.barra {
					background-color: red;
				}
			</style>
		</head>
	<body>
		<div class="titulo" style="width: 100%; padding: 20px;">
			 <h1 id="hdr">Abajo aparecerá la barra</h1>
		</div>
		<div class="barra">
			 <?php
			 for ($i = 0; $i < 10; $i++) {
			 	 echo "Agregando el elemento {$i} a la barra";
			 }
			 ?>
		</div>
	</body>
</html>
```

elhtml.html
```
<html>
	<head>
		<title>Es un ejemplo</title>
		<script type="text/javascript">
			</script>
			<style type="text/css">
			</style>
		</head>
	<body>
		<div class="titulo">
			 <h1 id="hdr">Abajo aparecerá la barra</h1>
		</div>
		<div class="barra">
		</div>
	</body>
</html>
<!-- Etiquetas encontradas
<html>
<head>
<title>
<script>
<body>
<div>
<h1>

-- Atributos encontrados:
type, class, id
-->
```

eljavascript.js
```
function hazAlgo() {
	console.log("Se supone que haga algo");
}
```
elestilo.css
```
.barra {
	background-color: red;
}
inline_anonimo_1 {
	width: 100%; padding: 20px;
}
```

lodesconocido.txt
```
<?php
for ($i = 0; $i < 10; $i++) {
	echo "Agregando el elemento {$i} a la barra";
}
?>
Y yo creo que es... 
```
