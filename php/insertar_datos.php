<?php

$conexion = mysql_connect ("mysql.hostinger.es","u155657675_proye","proyecto");



if(!$conexion){
	die("No he podido conectar por la siguiente razon".mysql_error());
	}
	
mysql_select_db("u155657675_proye",$conexion);

// ******************************************
// **COMIENZA EL INSERTADO DE DATOS USUARIO**
// ******************************************

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Super fuerza', 'Super', 'superfuerza@gmail.com','','Madrid', 'Leganes','0','0','../img/avatar.jpg','','super inteligencia, que te follen superfuerza','10/12/1990','H','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Roberto Sanchez Perez', 'Roberto', 'robertos@gmail.com','','Madrid', 'Getafe','0','0','../img/avatar.jpg','','sevilla sity vamoh alla','10/12/1990','H','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Marina Lopez Reverte', 'Marina', 'lokitah@gmail.com','','Madrid','Leganes','0','0','../img/avatar.jpg','','ey nigga','19/11/1994','M','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Beatriz Sotomonte Veraz', 'Beatriz', 'beatriz@gmail.com','345678989','Madrid','Fuenlabrada','0','0','../img/avatar.jpg','','Con los dedos de la mano, los dedos de los pies...','14/02/1991','M','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Juan Perez Perez', 'Juan', 'juanito@gmail.com','','Madrid', 'Madrid','0','0','../img/avatar.jpg','','mmm 64 lonchas de queso americano','18/10/1992','H','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Luisa Gonzalez Martin', 'Luisa', 'luisinha@gmail.com','','Madrid', 'Getafe','0','0','../img/avatar.jpg','','Nos fuimos a pescar gambas... buaa','05/02/1989','M','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Marta Garcia Rodriguez', 'Marta', 'martita@gmail.com','','Madrid', 'Fuenlabrada','0','0','../img/avatar.jpg','','Ebrios patanes del jurado','11/11/1991','M','twiter','0')");

mysql_query("INSERT INTO usuario (nombre, pass, correo, telefono, provincia, municipio, peticiones, privados, avatar, gustos, estado, fecna, sexo, sesion) VALUES('Miguel Reverte de la Fuente', 'Miguel', 'mdelafuente@gmail.com','','Madrid', 'Leganes','0','0','../img/avatar.jpg','','baauuula baaauuula','07/06/1993','H','twiter','0')");

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

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Los mejores coches', 'Aqui se hablará de cuales son los mejores coches del mercado.', '01/01/2012', 'Roberto Sanchez Perez','../img/agt_announcements.png', 'Motor','11')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Rock and roll', 'En este grupo se hablará de los mejores grupos de rock de la historia.', '21/01/2012', 'Marina Lopez Reverte','../img/agt_announcements.png', 'Musica','18')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('que miedo!', 'En este grupo se hablara de los mejores relatos y peliculas de horror', '14/03/2012', 'Beatriz Sotomonte Veraz','../img/agt_announcements.png', 'Varios','23')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Los mejores campings', 'Podreis dar vuestra opinion sobre los diferentes campings del mundo donde hayais estado.', '07/06/2009', 'Marta Garcia Rodriguez','../img/agt_announcements.png', 'Turismo','112')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Warhammer Fantasy', 'Se hablara del rico mundo del warhammer.', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'frikeo','9')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('kebabis', 'Se hablara del rico mundo del doble kebab doble solo carne y salsa.', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'Varios','356')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('pico y pala', 'Estrategias para pico-palear de sol a sol', '20/10/2012', 'Roberto Sanchez Perez','../img/agt_announcements.png', 'Varios','63')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Al duro banco', 'Los jugadores de futbol mas malos', '20/10/2012', 'Super fuerza','../img/agt_announcements.png', 'Varios','20')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Turismo rural', 'Las mejores ofertas de casas rurales', '20/10/2012', 'Marina Lopez Reverte','../img/agt_announcements.png', 'Turismo','51')");

mysql_query("INSERT INTO grupos (nom_grup, descripcion_g, fecha_creacion, nombre_mod, imagen, seccion, visitas) VALUES('Pezuneo', 'Se hablara de los reyes de la Pezuña, los mas topejos', '20/10/2012', 'Miguel Reverte de la Fuente','../img/agt_announcements.png', 'frikeo','2')");

// *******************************************
// **COMIENZA EL INSERTADO DE DATOS MENSAJES**
// *******************************************

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('1', 'Para mi uno de los mejores coches es el skoda octavia', '2012-05-13', 'Miguel Reverte de la Fuente', 'Los mejores coches')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('2', 'Estoy de acuerdo, es uno de los mejores coches en cuanto a relacion calidad precio', '2012-08-15', 'Beatriz Sotomonte Veraz', 'Los mejores coches')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('3', 'El camping de Cuenca me parece un buen camping, tiene buenas parcelas y piscina', '2009-11-03', 'Marta Garcia Rodriguez', 'Los mejores campings')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('4', 'A mi me parece que los campings de barcelona dejan mucho que desear', '2008-06-13', 'Juan Perez Perez', 'Los mejores campings')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('5', 'A mi el 407 me parece un coche muy aerodinamico y con un aspecto muy bueno', '2011-01-06', 'Luisa Gonzalez Martin', 'Los mejores coches')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('6', 'Yo creo que los mejores camping son los de Gandia Shore', '2012-02-16', 'Beatriz Sotomonte Veraz', 'Los mejores campings')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('7', 'Me encanta la musica Rock and Roll', '2005-07-11', 'Super fuerza', 'Rock and roll')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('8', 'El mejor cantante ha sido el rey Elvis', '2012-12-12', 'Roberto Sanchez Perez', 'Rock and roll')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('9', 'El mejor grupo de todos los tiempos es Iron Maiden', '2012-12-10', 'Marina Lopez Reverte', 'Rock and roll')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('10', 'Teneis que ver la pelicula de Rec3', '2012-03-03', 'Juan Perez Perez', 'que miedo!')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('11', 'El proyecto de la bruja de Blair da mas miedo', '2012-04-04', 'Luisa Gonzalez Martin', 'que miedo!')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('12', 'Lo que mas miedo da es encontrarte con tu madre a las 5 de la mañana', '2012-05-05', 'Marta Garcia Rodriguez', 'que miedo!')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('13', 'Apuntaos al proximo campeonato de Warhammer Fantasy http://campeonato2013.com', '2012-06-06', 'Beatriz Sotomonte Veraz', 'Warhammer Fantasy')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('14', 'La mejor raza es la de lo humanos. ¡Human Power!', '2012-07-07', 'Miguel Reverte de la Fuente', 'Warhammer Fantasy')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('15', 'La raza de los humanos es la mas GAY de todo Warhammer', '2012-08-08', 'Super fuerza', 'Warhammer Fantasy')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('16', 'Yo todos los findes me como 2 kedab solo carne y salsas', '2012-09-09', 'Roberto Sanchez Perez', 'kebabis')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('17', 'Esta muy rico hechar picante al durum', '2012-10-10', 'Marina Lopez Reverte', 'kebabis')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('18', 'Ir al kebab Varela II esta todo muy weno', '2012-01-02', 'Beatriz Sotomonte Veraz', 'kebabis')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('19', 'Pues yo utilizo la pala para todo', '2012-02-03', 'Juan Perez Perez', 'pico y pala')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('20', 'Lo mejor es el Pico', '2012-03-04', 'Luisa Gonzalez Martin', 'pico y pala')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('21', 'Yo prefiero utilizar el pico y la pala', '2012-04-05', 'Marta Garcia Rodriguez', 'pico y pala')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('22', 'Creo que despues de 25 años en el banquillo me van a poner de titular', '2012-05-06', 'Miguel Reverte de la Fuente', 'Al duro banco')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('23', 'Hoy he metido en mi propia puerta, es que con el cambio de campo me lio', '2012-06-07', 'Super fuerza', 'Al duro banco')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('24', 'Pues yo estoy muy comodo en el banquillo', '2012-07-08', 'Roberto Sanchez Perez', 'Al duro banco')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('25', 'El camino de Santigao es precioso', '2012-08-09', 'Marina Lopez Reverte', 'Turismo rural')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('26', 'El pueblo de Herreruela de Oropesa es un buen sitio para hacer turismo', '2012-09-10', 'Beatriz Sotomonte Veraz', 'Turismo rural')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('27', 'La posada INN es muy buena para descansar', '2012-10-11', 'Juan Perez Perez', 'Turismo rural')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('28', 'A alguien le ha pasado lo de 0 es capicua?', '2012-11-12', 'Luisa Gonzalez Martin', 'Pezuneo')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('29', 'si pulsais alt+F4 os dan un nuevo avatar muy chulo', '2012-05-31', 'Marta Garcia Rodriguez', 'Pezuneo')");

mysql_query("INSERT INTO mensajes (cod_men, texto, fecha, nombre, nom_grup) VALUES('30', 'He metido el portatil en la ducha y se ha apagado', '2012-12-01', 'Miguel Reverte de la Fuente', 'Pezuneo')");


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

// *************************************************
// ****COMIENZA EL INSERTADO DE DATOS PETICIONES****
// *************************************************

mysql_query("INSERT INTO peticiones (texto, env, rec) VALUES('Hola cachonda quedamos para frungiiiiir?', 'Juan Perez Perez', 'Marta Garcia Rodriguez')");

mysql_query("INSERT INTO peticiones (texto, env, rec) VALUES('hola soy SUPERFUERZA!!', 'Super fuerza', 'Marta Garcia Rodriguez')");

// *********************************************
// ****COMIENZA EL INSERTADO DE DATOS AMIGOS****
// *********************************************

mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Super fuerza', 'Roberto Sanchez Perez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Super fuerza', 'Marina Lopez Reverte')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Super fuerza', 'Beatriz Sotomonte Veraz')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Super fuerza', 'Juan Perez Perez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Super fuerza', 'Luisa Gonzalez Martin')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Roberto Sanchez Perez', 'Marina Lopez Reverte')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Roberto Sanchez Perez', 'Beatriz Sotomonte Veraz')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Roberto Sanchez Perez', 'Juan Perez Perez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Roberto Sanchez Perez', 'Luisa Gonzalez Martin')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Roberto Sanchez Perez', 'Marta Garcia Rodriguez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marina Lopez Reverte', 'Beatriz Sotomonte Veraz')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marina Lopez Reverte', 'Juan Perez Perez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marina Lopez Reverte', 'Luisa Gonzalez Martin')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marina Lopez Reverte', 'Marta Garcia Rodriguez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marina Lopez Reverte', 'Miguel Reverte de la Fuente')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Beatriz Sotomonte Veraz', 'Juan Perez Perez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Beatriz Sotomonte Veraz', 'Luisa Gonzalez Martin')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Beatriz Sotomonte Veraz', 'Marta Garcia Rodriguez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Beatriz Sotomonte Veraz', 'Miguel Reverte de la Fuente')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Juan Perez Perez', 'Luisa Gonzalez Martin')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Juan Perez Perez', 'Marta Garcia Rodriguez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Juan Perez Perez', 'Miguel Reverte de la Fuente')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Luisa Gonzalez Martin', 'Marta Garcia Rodriguez')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Luisa Gonzalez Martin', 'Miguel Reverte de la Fuente')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marta Garcia Rodriguez', 'Miguel Reverte de la Fuente')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Marta Garcia Rodriguez', 'Super fuerza')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Miguel Reverte de la Fuente', 'Super fuerza')");
mysql_query("INSERT INTO amigos (amigo1, amigo2) VALUES('Miguel Reverte de la Fuente', 'Roberto Sanchez Perez')");

// **********************************************
// **FIN DE LA CREACION E INTRODUCCION DE DATOS**
// **********************************************

mysql_close($conexion);
?>