--	1	Dar de alta a un socio y asignarlo a un club determinado.
	delimiter $
		create procedure s1(in id int, in n varchar(50), 
							in d varchar(100), in t varchar(15),
							in nc varchar(45))
			begin
				insert into socio
				values (id, n, d, t);
				
				insert into socioclub
				values (id, (select idclub from club where nombre like concat(nc, "%")));
				
				select count(*) from socio;
				
				select s.*, c.nombre
				from socio s, club c, socioclub sc
				where s.idsocio = sc.idsocio
				and sc.idclub = c.idclub
				and s.idsocio = id;
				
			end $
	delimiter;

	call s1(3001, "Ricardo", "Calle 1", "552102772", "Pachuca");
	
--	2	Dar de alta a un gerente y asignarlo a un club determinado.
	delimiter $
		create procedure s2(in id int, in ng varchar(50), 
							in nc varchar(45))
			begin
				insert into gerente
				values (id, ng, (select idclub from club where nombre = nc) );
				
				
				
				select count(*) from gerente;
				
				select g.*, c.idclub, c.nombre
				from gerente g, club c
				where g.idclub = c.idclub
				and g.idgerente = id;
				
			end $
	delimiter;
	
	call s2(2000, "Ricardo", "Hermosillo");
	
--	3	Modificar el teléfono de un club determinado.
	delimiter $
		create procedure s3(in nc varchar(50), 
							in t varchar(15))
			begin
				select nombre, tel from club where nombre = nc;
				
				update club
				set tel = t
				where nombre = nc;
				
				select nombre, tel from club where nombre = nc;
				
			end $
	delimiter;

	call s3("Toluca", "44554423324");

--	4	Modficar el 20% a los precios de los productos suministrados por un proveedor determinado.

	delimiter #
		create procedure s4(in p varchar(45), in ashe int)
			begin
				select x.nombre, x.preciounitario
				from producto x, proveedor r
				where x.idproveedor = r.idproveedor
				and r.nombre like concat(p, "%")
				order by x.preciounitario;
				
				update producto
				set preciounitario = preciounitario + (preciounitario * (ashe / 100))
				where idproveedor = (select idproveedor from proveedor
									where nombre like concat(p, "%"));
				
				select x.nombre, x.preciounitario
				from producto x, proveedor r
				where x.idproveedor = r.idproveedor
				and r.nombre like concat(p, "%")
				order by x.preciounitario;
			end #
	delimiter ;
	
	call s4("Sabritas", 20);
	
--	5	Actualizar la dirección de un socio determinado.
	delimiter #
		create procedure s5()
		
--	6	Actualizar el 15% al precio unitario de aquellos producto que son 
--		suministrados a los clubes existentes en la CDMX (antes DF)

--	7	Para los socios que tienen un apellido determinado, actualizar su dirección 
--		quedando "DOMICILIO CONOCIDO"

--	8	 Que permita dar de alta a un nuevo servicio.

--	9	Cambiar el teléfono de un proveedor determinado.

--	10	Eliminar a los socios que tienen un apellido paterno determinado.

--