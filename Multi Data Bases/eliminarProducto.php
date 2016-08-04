<?php
	
	$base = $_GET["base"];
	$id = $_GET["id"];

	include 'operacionesBase.php';
	$query = eliminarProducto($id, $base);
if($query==true){
		echo "<script type='text/javascript'>alert ('Se realizo la eliminacion');
				window.location='todosProductosAdmi.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert ('No se realizo la eliminacion');
				window.location='todosProductosAdmi.php'</script>";
	}
?>