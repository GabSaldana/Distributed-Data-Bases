<?php

    include 'config/databases.php';
	
	$nombre = $_GET["nombre"];
	$categoria = ucfirst($_GET["categoria"]);
	$precio = $_GET["precio"];
	$cantidad = $_GET["cantidad"];
	$otraCategoria = rand(1,2);
	$id = rand();
	
	if (strcmp($categoria, "Optica") == 0){
        
		include 'config/conexion_optica.php';
		mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
		$query = "insert into cat_producto values('$id','$nombre','$categoria')";
		if(mysqli_query($conn, $query)===true){
			$query = "insert into  detalle_pedido values('$id','$otraCategoria','$id','$precio','$cantidad')";
			if (mysqli_query($conn, $query)===true){
				mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
				echo "<script type='text/javascript'>alert ('Se registro el producto');
				window.location='index.php'</script>";
			}else{
				echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
			}
		}else{
			echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
		}
		mysqli_close($conn);
	}
	elseif (strcmp($categoria, "Medicina") == 0){
        
		include 'config/conexion_fp.php';
		mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
		$query = "insert into medicine values('$id','$nombre','$precio','$otraCategoria','$categoria')";
		if(mysqli_query($conn, $query)===true){
			$query = "insert into presentation values('$id',',gr','$cantidad',10,'$id','$otraCategoria');";
			if (mysqli_query($conn, $query)===true){
				mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
				echo "<script type='text/javascript'>alert ('Se registro el producto');
				window.location='index.php'</script>";
			}else{
				echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
			}
		}else{
			echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
		}
		mysqli_close($conn);
		}
	elseif ($otraCategoria==1){
        
		include 'config/conexion_tienda.php';
		
		$query = "insert into producto values('$id','$nombre','$precio','$categoria','$cantidad')";
		if(mysqli_query($conn, $query)===true){
			echo "<script type='text/javascript'>alert ('Se registro el producto');
				window.location='index.php'</script>";
		}else{
			echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
		}
		mysqli_close($conn);
		
	}
	elseif($otraCategoria==2){
        
		include 'config/conexion_oxxo.php';
		mysqli_query($conn,"SET FOREIGN_KEY_CHECKS=0");
		$query = "insert into producto values('$id','$nombre','','Otra','$precio',0,1234,'$id')";
		if(mysqli_query($conn, $query)===true){
			$query = "insert into inventario_producto values('$id','$categoria','$cantidad',1)";
			if (mysqli_query($conn, $query)===true){
				mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
				echo "<script type='text/javascript'>alert ('Se registro el producto');
				window.location='index.php'</script>";
			}else{
				echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
			}
		}else{
			echo "<script type='text/javascript'>
				alert ('No se registro el producto');
				window.location='index.php'
				</script>";
		}
		mysqli_close($conn);
		}
?>