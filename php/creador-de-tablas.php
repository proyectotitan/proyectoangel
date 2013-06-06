<?php

$conexion = mysql_connect ("localhost","proyecto","proyecto");


mysql_select_db("proyecto",$conexion);
$sql = "CREATE TABLE usuario
(nombre varchar(30),
PRIMARY KEY (nombre),
pass varchar (15) not null,
correo varchar (30) not null,
telefono int(9),
provincia varchar (20),
municipio varchar (20),
peticiones int,
privados int,
avatar varchar (50),
gustos varchar (50),
estado varchar (50),
fecna date,
sexo varchar (1),
twiter varchar (50),
sesion varchar (1)
)";

mysql_query($sql,$conexion);


$sql2= "CREATE TABLE sections
(
nom_sec varchar(20),
PRIMARY KEY (nom_sec)
)";
 
 mysql_query($sql2,$conexion);


$sql3= "CREATE TABLE grupos
(
nom_grup varchar (30),
PRIMARY KEY (nom_grup),
descripcion_g text not null,
fecha_creacion date,
nombre_mod varchar (30),
FOREIGN KEY (nombre_mod) REFERENCES usuario (nombre) ON DELETE CASCADE,
imagen varchar (50),
seccion varchar (20),
FOREIGN KEY (seccion) REFERENCES sections (nom_sec) ON DELETE CASCADE,
visitas int
)";

mysql_query($sql3,$conexion);


$sql4= "CREATE TABLE mensajes
(

cod_men int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (cod_men),
texto text not null,
fecha date,
nombre varchar (30),
FOREIGN KEY (nombre) REFERENCES usuario (nombre) ON DELETE CASCADE,
nom_grup varchar (30),
FOREIGN KEY (nom_grup) REFERENCES  grupos (nom_grup) ON DELETE CASCADE
)";
mysql_query($sql4,$conexion);

$sql5= "CREATE TABLE pertenecen
(
nombre varchar(30),
nom_grup varchar(30),
PRIMARY KEY (nombre, nom_grup),
FOREIGN KEY (nombre) REFERENCES usuario (nombre) ON DELETE CASCADE,
FOREIGN KEY (nom_grup) REFERENCES  grupos (nom_grup) ON DELETE CASCADE
)";

mysql_query($sql5,$conexion);

$sql6= "CREATE TABLE mens_enviado
(
cod_env int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (cod_env),
contenido text not null,
fechen date,
emisor varchar(30) not null,
FOREIGN KEY (emisor) REFERENCES usuario (nombre) ON DELETE CASCADE,
receptor varchar(30) not null ,
FOREIGN KEY (receptor) REFERENCES usuario (nombre) ON DELETE CASCADE
)";
mysql_query($sql6,$conexion);


$sql7= "CREATE TABLE mens_recibido
(
cod_rec int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (cod_rec),
contenido text not null,
fechen date,
emisor varchar(30) not null,
FOREIGN KEY (emisor) REFERENCES usuario (nombre) ON DELETE CASCADE,
receptor varchar(30) not null ,
FOREIGN KEY (receptor) REFERENCES usuario (nombre) ON DELETE CASCADE
)";
mysql_query($sql7,$conexion);


$sql8= "CREATE TABLE peticiones
(
cod_pet int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (cod_pet),
texto text not null,
env varchar (30),
FOREIGN KEY (env) REFERENCES usuario (nombre) ON DELETE CASCADE,
rec varchar (30),
FOREIGN KEY (rec) REFERENCES usuario (nombre) ON DELETE CASCADE
)";

mysql_query($sql8,$conexion);

$sql9= "CREATE TABLE amigos
(
amigo1 varchar (30),
amigo2 varchar (30),
PRIMARY KEY (amigo1, amigo2),
FOREIGN KEY (amigo1) REFERENCES usuario (nombre) ON DELETE CASCADE,
FOREIGN KEY (amigo2) REFERENCES usuario (nombre) ON DELETE CASCADE
)";
mysql_query($sql9,$conexion);

$sql10= "CREATE TABLE baneados
(
nom_ban varchar (30),
grup_ban varchar (30),
PRIMARY KEY (nom_ban, grup_ban),
FOREIGN KEY (nom_ban) REFERENCES usuario (nombre) ON DELETE CASCADE,
FOREIGN KEY (grup_ban) REFERENCES  grupos (nom_grup) ON DELETE CASCADE
)";

mysql_query($sql10,$conexion);

mysql_close($conexion);


?>