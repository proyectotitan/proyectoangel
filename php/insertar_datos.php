<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");

if(!$conexion){
	die("No he podido conectar por la siguiente razon".mysql_error());
	}
	
mysql_select_db("proyecto",$conexion);

// ******************************************
// **COMIENZA EL INSERTADO DE DATOS USUARIO**
// ******************************************

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Super fuerza', 'Super', 'superfuerza@gmail.com','','Madrid', 'Leganes','0','0','avatar','','super inteligencia, que te follen superfuerza','10/12/1990','H','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Roberto Sanchez Perez', 'Roberto', 'robertos@gmail.com','','Madrid', 'Getafe','0','0','avatar','','sevilla sity vamoh alla','10/12/1990','H','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Marina Lopez Reverte', 'Marina', 'lokitah@gmail.com','','Madrid','Leganes','0','0','avatar','','ey nigga','19/11/1994','M','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Beatriz Sotomonte Veraz', 'Beatriz', 'beatriz@gmail.com','345678989','Madrid','Fuenlabrada','0','0','avatar','','Con los dedos de la mano, los dedos de los pies...','14/02/1991','M','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Juan Perez Perez', 'Juan', 'juanito@gmail.com','','Madrid', 'Madrid','0','0','avatar','','mmm 64 lonchas de queso americano','18/10/1992','H','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Luisa Gonzalez Martin', 'Luisa', 'luisinha@gmail.com','','Madrid', 'Getafe','0','0','avatar','','Nos fuimos a pescar gambas... buaa','05/02/1989','M','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Marta Garcia Rodriguez', 'Marta', 'martita@gmail.com','','Madrid', 'Fuenlabrada','0','0','avatar','','Ebrios patanes del jurado','11/11/1991','M','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Miguel Reverte de la Fuente', 'Miguel', 'mdelafuente@gmail.com','','Madrid', 'Leganes','0','0','avatar','','baauuula baaauuula','07/06/1993','H','0')");

// *******************************************
// **COMIENZA EL INSERTADO DATOS CATEGORIAS**
// *******************************************

mysql_query("INSERT INTO sections (nom_sec) VALUES('Motor')");
mysql_query("INSERT INTO sections (nom_sec) VALUES('Musica')");
mysql_query("INSERT INTO sections (nom_sec) VALUES('Varios')");
mysql_query("INSERT INTO sections (nom_sec) VALUES('Turismo')");
mysql_query("INSERT INTO sections (nom_sec) VALUES('frikeo')");

// *****************************************
// **COMIENZA EL INSERTADO DE DATOS GRUPOS**
// *****************************************

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Los mejores coches', 'Aqui se hablará de cuales son los mejores coches del mercado.', '01/01/2012', 'Roberto Sanchez Perez','../img/agt_announcements.png', 'Motor','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Rock and roll', 'En este grupo se hablará de los mejores grupos de rock de la historia.', '21/01/2012', 'Marina Lopez Reverte','../img/agt_announcements.png', 'Musica','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('que miedo!', 'En este grupo se hablara de los mejores relatos y peliculas de horror', '14/03/2012', 'Beatriz Sotomonte Veraz','../img/agt_announcements.png', 'Varios','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Los mejores campings', 'Podreis dar vuestra opinion sobre los diferentes campings del mundo donde hayais estado.', '07/06/2009', 'Marta Garcia Rodriguez','../img/agt_announcements.png', 'Turismo','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Warhammer Fantasy', 'Se hablara del rico mundo del warhammer.', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'frikeo','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('kebabis', 'Se hablara del rico mundo del doble kebab doble solo carne y salsa.', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'Varios','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('pico y pala', 'Estrategias para pico-palear de sol a sol', '20/10/2012', 'Roberto Sanchez Perez','../img/agt_announcements.png', 'Varios','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Al duro banco', 'Los jugadores de futbol mas malos', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'Varios','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Turismo rural', 'Las mejores ofertas de casas rurales', '20/10/2012', 'Marina Lopez Reverte','../img/agt_announcements.png', 'Turismo','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Pezuneo', 'Se hablara de los reyes de la Pezuña, los mas topejos', '20/10/2012', 'Miguel Reverte de la Fuente','../img/agt_announcements.png', 'frikeo','20')");

// *******************************************
// **COMIENZA EL INSERTADO DE DATOS MENSAJES**
// *******************************************

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('1', 'Para mi uno de los mejores coches es el skoda octavia', '02/02/2012', 'Miguel Reverte de la Fuente', 'Los mejores coches')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('2', 'Estoy de acuerdo, es uno de los mejores coches en cuanto a relacion calidad precio', '03/02/2012', 'Beatriz Sotomonte Veraz', 'Los mejores coches')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('3', 'El camping de Cuenca me parece un buen camping, tiene buenas parcelas y piscina', '12/06/2009', 'Marta Garcia Rodriguez', 'Los mejores campings')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('5', 'A mi me parece que los campings de barcelona dejan mucho que desear', '13/06/2009', 'Juan Perez Perez', 'Los mejores campings')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('7', 'A mi el 407 me parece un coche muy aerodinamico y con un aspecto muy bueno', '05/02/2012', 'Luisa Gonzalez Martin', 'Los mejores coches')");

// *********************************************
// **COMIENZA EL INSERTADO DE DATOS PERTENECEN**
// *********************************************

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Roberto Sanchez Perez', 'Los mejores coches')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Miguel Reverte de la Fuente', 'Los mejores coches')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Beatriz Sotomonte Veraz', 'Los mejores coches')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Luisa Gonzalez Martin', 'Los mejores coches')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Marta Garcia Rodriguez', 'Los mejores campings')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Juan Perez Perez', 'Los mejores campings')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Marina Lopez Reverte', 'Rock and roll')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Beatriz Sotomonte Veraz', 'que miedo!')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Super fuerza', 'Warhammer Fantasy')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Super fuerza', 'kebabis')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Roberto Sanchez Perez', 'pico y pala')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Super fuerza', 'Al duro banco')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Marina Lopez Reverte', 'Turismo rural')");

mysql_query("INSERT INTO pertenecen (nombre, nom_grup) VALUES('Miguel Reverte de la Fuente', 'Pezuñeo')");

// ************************************************
// **COMIENZA EL INSERTADO DE DATOS MENS_ENVIADOS**
// ************************************************

mysql_query("INSERT INTO mens_enviado (contenido, fechen, emisor, receptor) VALUES('Me podrias decir donde esta el camping de cuenca?', '17/06/2009', 'Juan Perez Perez', 'Marta Garcia Rodriguez')");

// *************************************************
// **COMIENZA EL INSERTADO DE DATOS MENS_RECIBIDOS**
// *************************************************

mysql_query("INSERT INTO mens_recibido (contenido, fechen, emisor, receptor) VALUES('Me podrias decir donde esta el camping de cuenca?', '17/06/2009', 'Marta Garcia Rodriguez', 'Juan Perez Perez')");

// **********************************************
// **FIN DE LA CREACION E INTRODUCCION DE DATOS**
// **********************************************

mysql_close($conexion);
?>