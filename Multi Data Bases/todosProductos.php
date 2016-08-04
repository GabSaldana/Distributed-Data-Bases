<?php
	include 'config/databases.php';
    include 'config/conexion_oxxo.php';  
	$query = "select idProducto,nombre, categoria, cantidad,precio
				from producto p, inventario_producto ip
				where p.idInventario_producto=ip.idInventario_producto";
	
	$result = mysqli_query($conn, $query);
	
	while($arr = mysqli_fetch_array($result))
		$arreglo[] = $arr;
	
	mysqli_close($conn);
		
	include 'config/conexion_tienda.php';  
	$query = "select idProducto,nombre, categoria, cantidad, precio from producto";	
	
	$result = mysqli_query($conn, $query);
	
	while($arr = mysqli_fetch_array($result))
		$arreglo2[] = $arr;
	
	mysqli_close($conn);
	
	include 'config/conexion_optica.php';  
	$query = "select p.id_producto as idProducto, p.nombre,p.categoria,dp.cantidad,dp.precio
					from cat_producto p, detalle_pedido dp 
					where p.id_producto=dp.id_producto 
					group by p.nombre
					order by p.nombre";
	
	$result = mysqli_query($conn, $query);
	
	while($arr = mysqli_fetch_array($result))
		$arreglo3[] = $arr;
	
	mysqli_close($conn);
	
	include 'config/conexion_fp.php';  
	$query = "select idMedicine as idProducto, name as nombre, categoria,quantityPresentation as cantidad, 		
				price as precio
				from medicine m, presentation p 
				where m.idMedicine=p.Medicine_idMedicine";
		
	$result = mysqli_query($conn, $query);
		
	while($arr = mysqli_fetch_array($result))
		$arreglo4[] = $arr;
	
	mysqli_close($conn);
		
	$resultado = array_merge($arreglo, $arreglo2,$arreglo3,$arreglo4);
	?>
	<html>
	<head>
		<title>Productos</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> 
	<script src="bootstrap-3.3.6/js/bootstrap.js"></script>	
	</head>
	<body>
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
      				 <a class="navbar-brand" href="#">Index</a>
    			</div>
  			</div>
		</nav>
		<div class="container">
			<div class="jumbotron">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Id producto</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Cantidad</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
				<?php 
				$cont1 = count($arreglo);
				$cont2 = $cont1 + count($arreglo2);
				$cont3 = $cont2 + count($arreglo3);
				
				for($i=0;$i<count($resultado);$i++){
					echo "<tr>";
					echo "<td>".$resultado[$i][0]."</td>";
					echo "<td>".$resultado[$i][1]."</td>";
					echo "<td>".$resultado[$i][2]."</td>";
					echo "<td>".$resultado[$i][3]."</td>";
					echo "<td>".$resultado[$i][4]."</td>";
					echo "</tr>";
				}
		
				?>
					</tbody>
				</table>
				<a class="btn btn-primary" href="index.php">Regresar</a>
			</div>
		</div>
	</body>
</html>