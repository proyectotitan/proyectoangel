PROMPT ******************
PROMPT **CREANDO TABLAS**
PROMPT ******************
drop table usuario cascade constraint;
create table usuario
(
nombre varchar2(30),
pass varchar2(15) not null,
correo varchar2(30) not null,
provincia varchar2(20),
municipio varchar2(20),
peticiones number(2),
privados number(2),
avatar varchar2(50),
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
constraint pk_peticiones primary key (cod_pet),
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

PROMPT ******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS USUARIO**
PROMPT ******************************************
INSERT INTO USUARIO VALUES('Roberto Sanchez Perez', 'Roberto', 'robertos@gmail.com', '916897878', 'Madrid', 'Getafe','10/12/1990','H','1');
INSERT INTO USUARIO VALUES('Maria Jesus Fernandez Cuchillo', 'Maria Jesus', 'mjf@gmail.com', '916127894', 'Madrid', 'Mostoles','10/12/1989','M','0');
INSERT INTO USUARIO VALUES('Ana Garcia Fernandez', 'Ana', 'anag@gmail.com', '699120467', 'Madrid', 'Aranjuez','25/06/1992','M','1');
INSERT INTO USUARIO VALUES('Miguel Pinzon Suarez', 'Miguel', 'miguelp@gmail.com', '636817828', 'Madrid', 'Madrid','16/08/1986','H','1');
INSERT INTO USUARIO VALUES('Francisco Perez Gonzalez', 'Francisco', 'franciscop@gmail.com', '916897878', 'Barcelona', 'Barcelona','01/10/1987','H','0');
INSERT INTO USUARIO VALUES('Miguel Garcia Sanchez', 'Miguel', 'miguelg@gmail.com', '916897145', 'Madrid', 'Ciempozuelos','15/09/1965','H','1');
INSERT INTO USUARIO VALUES('Sofia Sainz Segura', 'Sofia', 'sofias@gmail.com', '699874503', 'Cuenca', 'Cuenca','05/11/1972','M','0');
INSERT INTO USUARIO VALUES('Pilar Garrido Muñoz', 'Pilar', 'pilarg@gmail.com', '916891123', 'Teruel', 'Teruel','02/05/1966','M','1');
INSERT INTO USUARIO VALUES('Alfredo Corchero Segura', 'Alfredo', 'alfredoc@gmail.com', '916870032', 'Castellon', 'Benicasim','07/06/1980','H','0');
INSERT INTO USUARIO VALUES('Marina Soto Fernandez', 'Marina', 'marinas@gmail.com', '916002389', 'Valencia', 'Gandia','29/02/1980','M','0');

PROMPT *****************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS GRUPOS**
PROMPT *****************************************
INSERT INTO GRUPOS VALUES('Los mejores coches', 'Aqui se hablará de cuales son los mejores coches del mercado.', '01/01/2012', 'Roberto Sanchez Perez', 'Motor');
INSERT INTO GRUPOS VALUES('Pintar uñas', 'En este grupo s hablará de las diferentes tecnicas para pintar las uñas.', '21/01/2012', 'Ana Garcia Fernandez', 'Moda');
INSERT INTO GRUPOS VALUES('Tecnicas para gimnasio', 'Hablaremos de las mejores tablas y tecnicas para sacar el mejor partido en el gimnasio.', '14/03/2010', 'Miguel Pinzon Suarez', 'Deporte');
INSERT INTO GRUPOS VALUES('Los mejores campings', 'Podreis dar vuestra opinion sobre los diferentes campings del mundo donde hayais estado.', '07/06/2009', 'Miguel Garcia Sanchez', 'Turismo');
INSERT INTO GRUPOS VALUES('Autocaravanas y caravanas', 'Se hablara de las mejores caravanas y autocaravanas disponibles.', '20/10/2008', 'Pilar Garrido Muñoz', 'Motor');

PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS MENSAJES**
PROMPT *******************************************
INSERT INTO MENSAJES VALUES('1', 'Para mi uno de los mejores coches es el skoda octavia', '02/02/2012', 'Maria Jesus Fernandez Cuchillo', 'Los mejores coches');
INSERT INTO MENSAJES VALUES('2', 'Estoy de acuerdo, es uno de los mejores coches en cuanto a relacion calidad precio', '03/02/2012', 'Miguel Garcia Sanchez', 'Los mejores coches');
INSERT INTO MENSAJES VALUES('3', 'El camping de Cuenca me parece un buen camping, tiene buenas parcelas y piscina', '12/06/2009', 'Francisco Perez Gonzalez', 'Los mejores campings');
INSERT INTO MENSAJES VALUES('4', 'En youtube hay muchos videos de como pintarse las uñas con diferentes tecnicas', '21/01/2012', 'Sofia Sainz Segura', 'Pintar uñas');
INSERT INTO MENSAJES VALUES('5', 'A mi me parece que los campings de barcelona dejan mucho que desear', '13/06/2009', 'Alfredo Corchero Segura', 'Los mejores campings');
INSERT INTO MENSAJES VALUES('6', 'Yo utilizo una tabla en la que lunes y martes hago tren superior y los martes y viernes inferior', '16/03/2010', 'Roberto Sanchez Perez', 'Tecnicas para gimnasio');
INSERT INTO MENSAJES VALUES('7', 'A mi el 407 me parece un coche muy aerodinamico y con un aspecto muy bueno', '05/02/2012', 'Pilar Garrido Muñoz', 'Los mejores coches');
INSERT INTO MENSAJES VALUES('8', 'Y el miercoles descansas?', '17/03/2010', 'Miguel Pinzon Suarez', 'Tecnicas para gimnasio');
INSERT INTO MENSAJES VALUES('9', 'El miercoles o descanso o hago un poco de cardio', '17/03/2012', 'Roberto Sanchez Perez', 'Tecnicas para gimnasio');
INSERT INTO MENSAJES VALUES('10', 'Yo he visto gente que pinta dibujos en las uñas pero creo que es dificil', '22/01/2012', 'Ana Garcia Fernandez', 'Pintar uñas');
INSERT INTO MENSAJES VALUES('11', 'Alguien ha probado lo que ha dicho Ana?', '23/01/2012', 'Maria Jesus Fernandez Cuchillo', 'Pintar uñas');
INSERT INTO MENSAJES VALUES('12', 'Yo tengo una Moncayo y me funciona bien y los muebles tienen mucha calidad', '08/06/2009', 'Marina Soto Fernandez', 'Autocaravanas y caravanas');
INSERT INTO MENSAJES VALUES('13', 'Yo tengo una Hymer y esta muy bien', '10/06/2009', 'Pilar Garrido Muñoz', 'Autocaravanas y caravanas');
INSERT INTO MENSAJES VALUES('14', 'Creeis que me compensa comprarme una caravana teniendo una autocaravana?', '10/06/2009', 'Pilar Garrido Muñoz', 'Autocaravanas y caravanas');

PROMPT *********************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS PERTENECEN**
PROMPT *********************************************
INSERT INTO PERTENECEN VALUES('Maria Jesus Fernandez Cuchillo', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Miguel Garcia Sanchez', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Pilar Garrido Muñoz', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Sofia Sainz Segura', 'Pintar uñas');
INSERT INTO PERTENECEN VALUES('Ana Garcia Fernandez', 'Pintar uñas');
INSERT INTO PERTENECEN VALUES('Maria Jesus Fernandez Cuchillo', 'Pintar uñas');
INSERT INTO PERTENECEN VALUES('Roberto Sanchez Perez', 'Los mejores coches');
INSERT INTO PERTENECEN VALUES('Roberto Sanchez Perez', 'Tecnicas para gimnasio');
INSERT INTO PERTENECEN VALUES('Miguel Pinzon Suarez', 'Tecnicas para gimnasio');
INSERT INTO PERTENECEN VALUES('Miguel Garcia Sanchez', 'Tecnicas para gimnasio');
INSERT INTO PERTENECEN VALUES('Francisco Perez Gonzalez', 'Los mejores campings');
INSERT INTO PERTENECEN VALUES('Alfredo Corchero Segura', 'Los mejores campings');
INSERT INTO PERTENECEN VALUES('Marina Soto Fernandez', 'Autocaravanas y caravanas');
INSERT INTO PERTENECEN VALUES('Pilar Garrido Muñoz', 'Autocaravanas y caravanas');

PROMPT *******************************************
PROMPT **COMIENZA EL INSERTADO DE DATOS MENS_USU**
PROMPT *******************************************
INSERT INTO MENS_USU VALUES('1', 'Me podrias decir donde esta el camping de cuenca?', '17/06/2009', 'Alfredo Corchero Segura', 'Francisco Perez Gonzalez');
INSERT INTO MENS_USU VALUES('2', 'Aqui esta toda la informacion: http://www.campingcuenca.com/', '18/06/2009', 'Francisco Perez Gonzalez', 'Alfredo Corchero Segura');
INSERT INTO MENS_USU VALUES('3', 'Muchas gracias', '18/06/2009', 'Alfredo Corchero Segura', 'Francisco Perez Gonzalez');
INSERT INTO MENS_USU VALUES('4', 'Me podrias pasar algun video de los que dijiste en el grupo?', '22/01/2012', 'Ana Garcia Fernandez', 'Sofia Sainz Segura');
INSERT INTO MENS_USU VALUES('5', 'Aqui tienes muchos videos que estan muy bien: http://www.youtube.com/results?search_query=pintar+uñas', '22/01/2012', 'Sofia Sainz Segura', 'Ana Garcia Fernandez');
INSERT INTO MENS_USU VALUES('6', 'Muchas gracias los mirare e intentare hacerlos', '23/01/2012', 'Ana Garcia Fernandez', 'Sofia Sainz Segura');
INSERT INTO MENS_USU VALUES('7', 'Te advierto que el agua esta muy fria, te recomiendo este camping un saludo', '18/06/2009', 'Francisco Perez Gonzalez', 'Alfredo Corchero Segura');

PROMPT **********************************************
PROMPT **FIN DE LA CREACION E INTRODUCCION DE DATOS**
PROMPT **********************************************
commit;