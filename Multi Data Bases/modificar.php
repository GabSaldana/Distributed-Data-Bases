<?php
	
	$base = $_GET["base"];
	$id = $_GET["id"];
	$nombre = $_GET["nombre"];
	$categoria = $_GET["categoria"];
	$cantidad = $_GET["cantidad"];
	$precio = $_GET["precio"];
	
	include 'operacionesBase.php';
	$query = modificarProducto($base, $id, $nombre, $categoria, $cantidad, $precio);
	if($query==true){
		echo "<script type='text/javascript'>alert ('Se realizo la modificacion');
				window.location='todosProductosAdmi.php'</script>";
	}else{
		echo "<script type='text/javascript'>
				alert ('No se realizo la modificacion');
				window.location='todosProductosAdmi.php'
				</script>";
	}
?>

