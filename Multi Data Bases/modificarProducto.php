<?php
	
	$base = $_GET["base"];
	$id = $_GET["id"];
	
	include 'operacionesBase.php';
	$registros = seleccionBaseProducto($base,$id);
	?>
		<html>
			<head>
				<title>Modificar Producto</title>
			<link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css">
			<script src="bootstrap-3.3.6/js/bootstrap.js"></script>
			</head>
			<body>
			<div class="container">
				<div class="jumbotron">
				<h1>Modifica los datos del producto</h1>
				<br>
				<br>
				<br>
				<form action="modificar.php" role="form" class="form-horizontal">
				    <input type="hidden" name="base" value="<?php echo $base;?>">
					<input type="hidden" name="id" value="<?php echo "$registros[idProducto]";?>">	
				    <div class="form-group">
      					<label for="nombreProducto" class="control-label col-sm-1">Nombre:</label>
				        <div class="col-sm-10">
        					<input type="text" name="nombre" id="nombreProducto" class="form-control" value="<?php echo "$registros[nombre]"; ?>">	
      					</div>
    				</div>
					<div class="form-group">
      					<label for="categoriaProducto" class="control-label col-sm-1">Categoria:</label>	
				        <div class="col-sm-10">
        					<input type="text" name="categoria" id="categoriaProducto" class="form-control" value="<?php echo "$registros[categoria]"; ?>">		
      					</div>
    				</div>
					<div class="form-group">
      					<label for="cantidadProducto" class="control-label col-sm-1">Cantidad:</label>
				        <div class="col-sm-10">
        					<input type="text" name="cantidad" id="cantidadProducto" class="form-control"  value="<?php echo "$registros[cantidad]"; ?>">
      					</div>
    				</div>
					<div class="form-group">
      					<label for="precioProducto" class="control-label col-sm-1">Precio:</label>
				        <div class="col-sm-10">
        					<input type="text" name="precio" id="precioProducto" class="form-control"  value="<?php echo "$registros[precio]"; ?>">
      					</div>
    				</div>
    				<br>
    				<div class="row">
    					<div class="col-sm-10"></div>
    					<input type="submit" class="btn btn-default btn btn-primary col-sm-2">
    				</div>
				</form>
				</div>
				</div>
			</body>
		</html>