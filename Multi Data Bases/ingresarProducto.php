<html>
	<head>
		<title>PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> 
	<script src="bootstrap-3.3.6/js/bootstrap.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-inverse">

</nav>
	
		<div class="container">

				<div class="title">
                <h1> Ingresar Productos</h1>
            </div>

				<form action="ingresar.php" role="form" class="form-horizontal">
				    <div class="form-group">
      					<label for="nombreProducto" class="control-label col-sm-1">Nombre:</label>
				        <div class="col-sm-10">
        					<input type="text" name="nombre" id="nombreProducto" class="form-control" required="required" placeholder="Ingresa el nombre del producto">	
      					</div>
      				</div>
      				<br>
      				 <div class="form-group">
      					<label for="categoria" class="control-label col-sm-1">Categoria:</label>
				        <div class="col-sm-10">
        					<input type="text" name="categoria" id="categoria" class="form-control" required="required" placeholder="Ingresa la categoria de este producto">	
      					</div>
      				</div>
      				<br>
      				 <div class="form-group">
      					<label for="precio" class="control-label col-sm-1">Precio:</label>
				        <div class="col-sm-10">
        					<input type="text" name="precio" id="precio" class="form-control" required="required" placeholder="Ingresa el precio de este producto">	
      					</div>
      				</div>
      				<br>
      				 <div class="form-group">
      					<label for="cantidad" class="control-label col-sm-1">Cantidad:</label>
				        <div class="col-sm-10">
        					<input type="text" name="cantidad" id="cantidad" class="form-control" required="required" placeholder="Ingresa la cantidad de este producto">	
      					</div>
      				</div>
    				<br><br>
    				<div class="row">
    					<div class="col-sm-10"></div>
    					<input type="submit" >
    				</div>
				</form>

		</div>
	</body>
</html>
