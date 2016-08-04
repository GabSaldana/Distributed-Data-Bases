<?php
    include 'config/databases.php';

	function seleccionBaseProducto($base,$id){
		if($base == 1){
			
	       include 'config/conexion_oxxo.php';
			$query = "select idProducto,nombre, categoria, cantidad,precio
			from producto p, inventario_producto ip
			where p.idInventario_producto=ip.idInventario_producto and p.idProducto=$id";
		}
		elseif ($base == 2){
			include 'config/conexion_tienda.php';
			$query = "select idProducto,nombre, categoria, cantidad, precio
			from producto
			where idProducto=$id";
		}
		elseif ($base == 3){
			include 'config/conexion_optica.php';
			$query = "select p.id_producto as idProducto, p.nombre,p.categoria,dp.cantidad,dp.precio
			from cat_producto p, detalle_pedido dp
			where p.id_producto=dp.id_producto and p.id_producto like '$id'
			group by p.nombre
			order by p.nombre";
		}
		else{
			include 'config/conexion_fp.php';
			$query = "select idMedicine as idProducto, name as nombre, categoria,quantityPresentation as cantidad,
			price as precio
			from medicine m, presentation p
			where m.idMedicine=p.Medicine_idMedicine and m.idMedicine=$id";
		}
		
		$result = mysqli_query($conn, $query);
		$registros = mysqli_fetch_array($result);
		mysqli_close($conn);
		
		return $registros;
	}
	
	function modificarProducto($base,$id,$nombre,$categoria,$cantidad,$precio){
		if ($base==1) {
			include 'config/conexion_oxxo.php';
			$query = "update producto p,inventario_producto ip set nombre='$nombre',categoria='$categoria',cantidad='$cantidad',precio='$precio' 
						where p.idInventario_producto='$id' and ip.idInventario_producto='$id'";
		}
		elseif ($base==2) {
			include 'config/conexion_tienda.php';
			$query = "update producto set nombre='$nombre',categoria='$categoria',cantidad='$cantidad',precio='$precio' where idProducto='$id'";
		}
		elseif ($base==3) {
			include 'config/conexion_optica.php';
			$query = "update cat_producto c, detalle_pedido dp set categoria='$categoria', 
						nombre='$nombre', cantidad='$cantidad', precio='$precio' where dp.id_producto='$id' and c.id_producto='$id'";
		}
		else{
			include 'config/conexion_fp.php';
			$query = "update medicine m, presentation p set name='$nombre', categoria='$categoria', quantityPresentation='$cantidad', price='$precio' 
						where m.idMedicine='$id' and p.Medicine_idMedicine='$id'";
		}
		
		$resul = mysqli_query($conn, $query); 
		mysqli_close($conn);
		if($resul==true){
			return  true;
		}
		else{
			return false;
		}
	}
	
	function eliminarProducto($id,$base){
		if ($base==1) {
			include 'config/conexion_oxxo.php';
			$query = "delete producto, inventario_producto from producto, inventario_producto 
						where producto.idInventario_producto='$id' and inventario_producto.idInventario_producto= '$id'";
		}
		elseif ($base==2) {
			include 'config/conexion_tienda.php';
			$query = "delete from  producto where idProducto='$id';";
		}
		elseif ($base==3) {
			include 'config/conexion_optica.php';
			$query = "delete cat_producto,detalle_pedido from cat_producto, detalle_pedido 
						where cat_producto.id_producto='$id' and detalle_pedido.id_producto='$id'";
		}
		else{
			include 'config/conexion_fp.php';
			$query = "delete medicine, presentation from medicine, presentation where idMedicine='$id' and Medicine_idMedicine='$id'";
		}
		$resul = mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
		$resul = mysqli_query($conn, $query);
		$resul = mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
		mysqli_close($conn);
		if($resul==true){
			return  true;
		}
		else{
			return false;
		}
	}