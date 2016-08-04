<?php
    
    include 'config/databases.php';
    

	$base = $_GET["base"];
	if($base == 1){
        
        include 'config/conexion_oxxo.php';    
		$query = "select idProducto,nombre, categoria, cantidad,precio
					from producto p, inventario_producto ip
					where p.idInventario_producto=ip.idInventario_producto";
	}
	elseif ($base == 2){
		
        include 'config/conexion_tienda.php';
		$query = "select idProducto,nombre, categoria, cantidad, precio from producto";	
        
	}
	elseif ($base == 3){
		
        include 'config/conexion_optica.php';
		$query = "select p.id_producto as idProducto, p.nombre,p.categoria,dp.cantidad,dp.precio
					from cat_producto p, detalle_pedido dp 
					where p.id_producto=dp.id_producto 
					group by p.nombre
					order by p.nombre";
	}
	else{
        
		include 'config/conexion_fp.php';
		$query = "select idMedicine as idProducto, name as nombre, categoria,quantityPresentation as cantidad, 		
					price as precio
					from medicine m, presentation p 
					where m.idMedicine=p.Medicine_idMedicine";
	}
	
	
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
	?>
<html>
	<head>
		<title>Tabla de Productos</title>
	<link rel="stylesheet" href="bootstrap-3.3.6/css/bootstrap.min.css">
	<script src="bootstrap-3.3.6/js/bootstrap.js"></script>	
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>    
	</head>
	<body>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <a class="navbar-brand" href="index.php"><--</a>
        <?php if($base==1){
      		echo "<a href='productoPorBase.php?base=2'>Tienda</a>";
      		echo "<a href='productoPorBase.php?base=3'>Optica</a>";
      		echo "<a href='productoPorBase.php?base=4'>Farmacia</a>";
      }
      elseif ($base==2){
      		echo "<a href='productoPorBase.php?base=1'>Oxxo</a>";
      		echo "<a href='productoPorBase.php?base=3'>Optica</a>";
      		echo "<a href='productoPorBase.php?base=4'>Farmacia</a>";
      }
      elseif ($base==3){
      		echo "<a href='productoPorBase.php?base=1'>Oxxo</a>";
      		echo "<a href='productoPorBase.php?base=2'>Tienda</a>";
      		echo "<a href='productoPorBase.php?base=4'>Farmacia</a>";
      }else{
      		echo "<a href='productoPorBase.php?base=1'>Oxxo</a>";
      		echo "<a href='productoPorBase.php?base=2'>Tienda</a>";
      		echo "<a href='productoPorBase.php?base=3'>Optica</a>";
      }
      ?>
    </ul>
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
					while ($registros = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>$registros[idProducto]</td>";
						echo "<td>$registros[nombre]</td>";
						echo "<td>$registros[categoria]</td>";
						echo "<td>$registros[cantidad]</td>";
						echo "<td>$registros[precio]</td>";
						echo "</tr>";
				}
				
				mysqli_close($conn);
                ?>
			</tbody>
		</table>
		</div>
		</div>
	</body>
</html>