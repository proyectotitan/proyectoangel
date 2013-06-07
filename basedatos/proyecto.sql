PROMPT ******************
PROMPT **CREANDO TABLAS**
PROMPT ******************
drop table usuario cascade constraint;
create table usuario
(
nombre varchar2(30),
pass varchar2(15) not null,
correo varchar2(30) not null,
telefono number(9),
provincia varchar2(20),
municipio varchar2(20),
peticiones number(2),
privados number(2),
avatar varchar2(50),
gustos varchar2(50),
estado varchar2(50),
fecna date,
sexo varchar2(1),
sesion number(1),
constraint pk_nombre1 primary key(nombre)
);

drop table grupos cascade constraint;
create table grupos
(
nom_grup varchar2(30),
descripcion_g long not null,
fecha_creacion date,
nombre_mod varchar2(30),
imagen varchar2(50),
seccion varchar2(20),
visitas number(9),
constraint pk_nom_grup1 primary key(nom_grup),
constraint fk_nom_secciones foreign key (seccion) references sections on delete cascade,
constraint fk_nom_moderador foreign key(nombre_mod) references usuario on delete cascade
);


drop table mensajes cascade constraint;
create table mensajes
(
cod_men number(4),
texto long not null,
fecha date,
nombre varchar2(30),
nom_grup varchar2(30),
constraint pk_cod_men1 primary key(cod_men),
constraint fk_nom_men_us1 foreign key(nombre) references usuario on delete cascade,
constraint fk_nom_men_gr1 foreign key(nom_grup) references grupos on delete cascade
);

drop table pertenecen cascade constraint;
create table pertenecen
(
nombre varchar2(30),
nom_grup varchar2(30),
constraint pk_pertenecen1 primary key (nombre,nom_grup),
constraint fk_pertenecen_nombre1 foreign key (nombre) references usuario on delete cascade,
constraint fk_pertenece1_nom_gru1 foreign key (nom_grup) references grupos on delete cascade
);

drop table mens_enviados cascade constraint;
create table mens_enviados
(
cod_menus number(4),
contenido long not null,
fechen date,
emisor varchar2(30) not null,
receptor varchar2(30) not null ,
constraint pk_mens_usu1 primary key (cod_menus),
constraint fk_mens_usu_emisor1 foreign key (emisor) references usuario on delete cascade,
constraint fk_mens_usu_receptor1 foreign key (receptor) references usuario on delete cascade
);

drop table mens_recibidos cascade constraint;
create table mens_recibidos
(
cod_menus number(4),
contenido long not null,
fechen date,
emisor varchar2(30) not null,
receptor varchar2(30) not null ,
constraint pk_mens_usu2 primary key (cod_menus),
constraint fk_mens_usu_emisor2 foreign key (emisor) references usuario on delete cascade,
constraint fk_mens_usu_receptor2 foreign key (receptor) references usuario on delete cascade
);

drop table peticiones cascade constraint;
create table peticiones
(
cod_pet number(4),
texto long not null,
env varchar2(30),
rec varchar2(30),
constraint pk_peticiones primary key (env,rec),
constraint fk_env1 foreign key (env) references usuario on delete cascade,
constraint fk_rec1 foreign key (rec) references usuario on delete cascade
);

drop table amigos cascade constraint;
create table amigos
(
amigo1 varchar2(30),
amigo2 varchar2(30),
constraint pk_idamigos primary key (amigo1,amigo2),
constraint fk_amigo1 foreign key(amigo1) references usuario on delete cascade,
constraint fk_amigo2 foreign key(amigo2) references usuario on delete cascade
);

drop table baneados cascade constraint;
create table baneados
(
nom_ban varchar2(30),
grup_ban varchar2(30),
constraint pk_baneados_1 primary key (nom_ban,grup_ban),
constraint fk_nomban foreign key (nom_ban) references usuario on delete cascade,
constraint fk_grupban foreign key (grup_ban) references grupos on delete cascade
);

drop table sections cascade constraint;
create table sections
(
nom_sec varchar2(20),
constraint pk_secctions primary key (nom_sec)
);

-------------antigua tabla de chat------------------------------------------
drop table chat cascade constraint;
create table chat
(
cod_ch number(3),
emi varchar2(30),
recep varchar2(30),
mensaje long not null,
sent date,
constraint pk_id_chat primary key (cod_ch),
constraint fk_from_usu foreign key (emi) references usuario,
constraint fk_to_usu foreign key (recep) references usuario
);
------------nueva tabla de chat---------------------------------------------
drop table chat cascade constraint
create table chat
(
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
from VARCHAR(255) NOT NULL DEFAULT '',
to VARCHAR(255) NOT NULL DEFAULT '',
message` TEXT NOT NULL,
sent` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
recd` INTEGER UNSIGNED NOT NULL DEFAULT 0,
PRIMARY KEY (`id`),
INDEX `to` (`to`),
INDEX `from` (`from`)
)
----------------------------------------------------------------------------

PROMPT ******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS USUARIO**
PROMPT ******************************************

INSERT INTO USUARIO VALUES('Super fuerza', 'Super', 'superfuerza@gmail.com','','Madrid', 'Leganes','0','0','avatar','','super inteligencia, que te follen superfuerza','10/12/1990','H','0');
INSERT INTO USUARIO VALUES('Roberto Sanchez Perez', 'Roberto', 'robertos@gmail.com','','Madrid', 'Getafe','0','0','avatar','','sevilla sity vamoh alla','10/12/1990','H','0');
INSERT INTO USUARIO VALUES('Marina Lopez Reverte', 'Marina', 'lokitah@gmail.com','','Madrid','Leganes','0','0','avatar','','ey nigga','19/11/1994','M','0');
INSERT INTO USUARIO VALUES('Beatriz Sotomonte Veraz', 'Beatriz', 'beatriz@gmail.com','345678989','Madrid','Fuenlabrada','0','0','avatar','','Con los dedos de la mano, los dedos de los pies...','14/02/1991','M','0');
INSERT INTO USUARIO VALUES('Juan Perez Perez', 'Juan', 'juanito@gmail.com','','Madrid', 'Madrid','0','0','avatar','','mmm 64 lonchas de queso americano','18/10/1992','H','0');
INSERT INTO USUARIO VALUES('Luisa Gonzalez Martin', 'Luisa', 'luisinha@gmail.com','','Madrid', 'Getafe','0','0','avatar','','Nos fuimos a pescar gambas... buaa','05/02/1989','M','0');
INSERT INTO USUARIO VALUES('Marta Garcia Rodriguez', 'Marta', 'martita@gmail.com','','Madrid', 'Fuenlabrada','0','0','avatar','','Ebrios patanes del jurado','11/11/1991','M','0');
INSERT INTO USUARIO VALUES('Miguel Reverte de la Fuente', 'Miguel', 'mdelafuente@gmail.com','','Madrid', 'Leganes','0','0','avatar','','baauuula baaauuula','07/06/1993','H','0');



PROMPT *****************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS GRUPOS**
PROMPT *****************************************
INSERT INTO GRUPOS VALUES('Los mejores coches', 'Aqui se hablará de cuales son los mejores coches del mercado.', '01/01/2012', 'Roberto Sanchez Perez','imagen', 'Motor','20');
INSERT INTO GRUPOS VALUES('Rock and roll', 'En este grupo se hablará de los mejores grupos de rock de la historia.', '21/01/2012', 'Marina Lopez Reverte','imagen', 'Musica','20');
INSERT INTO GRUPOS VALUES('que miedo!', 'En este grupo se hablara de los mejores relatos y peliculas de horror', '14/03/2012', 'Beatriz Sotomonte Veraz','imagen', 'Varios','20');
INSERT INTO GRUPOS VALUES('Los mejores campings', 'Podreis dar vuestra opinion sobre los diferentes campings del mundo donde hayais estado.', '07/06/2009', 'Marta Garcia Rodriguez','imagen', 'Turismo','20');
INSERT INTO GRUPOS VALUES('Warhammer Fantasy', 'Se hablara del rico mundo del warhammer.', '20/10/2012', 'Super fuerza','imagen', 'frikeo','20');
INSERT INTO GRUPOS VALUES('kebabis', 'Se hablara del rico mundo del doble kebab doble solo carne y salsa.', '20/10/2012', 'Super fuerza','imagen', 'Varios','20');
INSERT INTO GRUPOS VALUES('pico y pala', 'Estrategias para pico-palear de sol a sol', '20/10/2012', 'Roberto Sanchez Perez','imagen', 'Varios','20');
INSERT INTO GRUPOS VALUES('Al duro banco', 'Los jugadores de futbol mas malos', '20/10/2012', 'Super fuerza','imagen', 'Varios','20');
INSERT INTO GRUPOS VALUES('Turismo rural', 'Las mejores ofertas de casas rurales', '20/10/2012', 'Marina Lopez Reverte','imagen', 'Turismo','20');
INSERT INTO GRUPOS VALUES('Pezuñeo', 'Se hablara de los reyes de la Pezuña, los mas topejos', '20/10/2012', 'Miguel Reverte de la Fuente','imagen', 'frikeo','20');


PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS MENSAJES**
PROMPT *******************************************
INSERT INTO MENSAJES VALUES('1', 'Para mi uno de los mejores coches es el skoda octavia', '02/02/2012', 'Miguel Reverte de la Fuente', 'Los mejores coches');
INSERT INTO MENSAJES VALUES('2', 'Estoy de acuerdo, es uno de los mejores coches en cuanto a relacion calidad precio', '03/02/2012', 'Beatriz Sotomonte Veraz', 'Los mejores coches');
INSERT INTO MENSAJES VALUES('3', 'El camping de Cuenca me parece un buen camping, tiene buenas parcelas y piscina', '12/06/2009', 'Marta Garcia Rodriguez', 'Los mejores campings');
INSERT INTO MENSAJES VALUES('5', 'A mi me parece que los campings de barcelona dejan mucho que desear', '13/06/2009', 'Juan Perez Perez', 'Los mejores campings');
INSERT INTO MENSAJES VALUES('7', 'A mi el 407 me parece un coche muy aerodinamico y con un aspecto muy bueno', '05/02/2012', 'Luisa Gonzalez Martin', 'Los mejores coches');


PROMPT *********************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS PERTENECEN**
PROMPT *********************************************
INSERT INTO PERTENECEN VALUES('Roberto Sanchez Perez', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Miguel Reverte de la Fuente', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Beatriz Sotomonte Veraz', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Luisa Gonzalez Martin', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Marta Garcia Rodriguez', 'Los mejores campings');
INSERT INTO PERTENECEN VALUES('Juan Perez Perez', 'Los mejores campings');
INSERT INTO PERTENECEN VALUES('Marina Lopez Reverte', 'Rock and roll');
INSERT INTO PERTENECEN VALUES('Beatriz Sotomonte Veraz', 'que miedo!');
INSERT INTO PERTENECEN VALUES('Super fuerza', 'Warhammer Fantasy');
INSERT INTO PERTENECEN VALUES('Super fuerza', 'kebabis');
INSERT INTO PERTENECEN VALUES('Roberto Sanchez Perez', 'pico y pala');
INSERT INTO PERTENECEN VALUES('Super fuerza', 'Al duro banco');
INSERT INTO PERTENECEN VALUES('Marina Lopez Reverte', 'Turismo rural');
INSERT INTO PERTENECEN VALUES('Miguel Reverte de la Fuente', 'Pezuñeo');

PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS MENS_ENVIADOS**
PROMPT *******************************************
INSERT INTO MENS_ENVIADOS VALUES('1', 'Me podrias decir donde esta el camping de cuenca?', '17/06/2009', 'Marta Garcia Rodriguez', 'Juan Perez Perez');
PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS MENS_RECIBIDOS**
PROMPT *******************************************
INSERT INTO MENS_RECIBIDOS VALUES('1', 'Me podrias decir donde esta el camping de cuenca?', '17/06/2009', 'Marta Garcia Rodriguez', 'Juan Perez Perez');

PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO  DATOS CATEGORIAS**
PROMPT *******************************************
INSERT INTO SECTIONS VALUES('Motor');
INSERT INTO SECTIONS VALUES('Musica');
INSERT INTO SECTIONS VALUES('Varios');
INSERT INTO SECTIONS VALUES('Turismo');
INSERT INTO SECTIONS VALUES('frikeo');


PROMPT **********************************************
PROMPT **FIN DE LA CREACION E INTRODUCCION DE DATOS**
PROMPT **********************************************
commit;