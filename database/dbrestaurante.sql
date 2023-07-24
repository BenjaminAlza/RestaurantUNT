drop database if exists bdcopia;
create database bdcopia;
use bdcopia;

CREATE TABLE ADMINISTRADOR
(
	dni                  char(8) NOT NULL,
	idadministrador      INTEGER NOT NULL,
	cargo                varchar(30) NULL
);

ALTER TABLE ADMINISTRADOR
ADD PRIMARY KEY (dni);

CREATE TABLE CLIENTE
(
	idcliente            INTEGER NOT NULL AUTO_INCREMENT,
	dni                  CHAR(8) NULL,
	nombres              varchar(40) NULL,
	direccion            varchar(40) NULL,
	email                VARCHAR(40) NULL,
	telefono             varchar(12) NULL,
	estado               TINYINT NULL,
	primary key(idcliente)
);

CREATE TABLE REPARTIDOR
(
	idRepartidor           INTEGER NOT NULL AUTO_INCREMENT,
	dni                  CHAR(8) NULL,
	nombres              varchar(40) NULL,
	direccion            varchar(40) NULL,
	email                VARCHAR(40) NULL,
	telefono             varchar(12) NULL,
	sueldo				 float NULL,
	estado               TINYINT NULL,
	primary key(idRepartidor)
);

CREATE TABLE COCINERO
(
	dni                  char(8) NOT NULL,
	idcocinero           INTEGER NOT NULL,
	cargo                varchar(30) NULL
);

ALTER TABLE COCINERO
ADD PRIMARY KEY (dni);

CREATE TABLE DETALLE_PEDIDO
(
	idpedido             INTEGER NOT NULL,
	idproducto           INTEGER NOT NULL,
	cantidad             INTEGER NULL,
	precio               DECIMAL(8,2) NULL
);

ALTER TABLE DETALLE_PEDIDO
ADD PRIMARY KEY (idpedido,idproducto);

CREATE TABLE MESA
(
	idmesa               INTEGER NOT NULL AUTO_INCREMENT,
	idpedido             INTEGER NULL,
	disponibilidad       TINYINT NULL,
	estado               TINYINT NULL,
	primary key(idmesa)
);

INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('1',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('2',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('3',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('4',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('5',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('6',null,'1','1');
INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES ('7',null,'1','1');

CREATE TABLE MOZO
(
	dni                  char(8) NOT NULL,
	idmozo               INTEGER NOT NULL,
	tipoContrato         varchar(20) NULL
);

ALTER TABLE MOZO
ADD PRIMARY KEY (dni);


CREATE TABLE PEDIDO
(
	idpedido             INTEGER NOT NULL AUTO_INCREMENT,
	idcliente            INTEGER NULL,
	montoTotal           DECIMAL(8,2) NULL,
	observaciones        varchar(30) NULL,
	situacion            tinyint NULL,
	medioPago            varchar(20) NULL,
	modalidad            tinyint NULL,
	estado               TINYINT NULL,
	primary key(idpedido)
);

CREATE TABLE PRODUCTO
(
	idproducto           INTEGER NOT NULL AUTO_INCREMENT,
	descripcion          varchar(40) NULL,
	precio               DECIMAL(8,2) NULL,
	estado               TINYINT NULL,
	primary key(idproducto)
);

CREATE TABLE USUARIO
(
	dni                  char(8) NOT NULL,
	pword                VARCHAR(40) NOT NULL,
	nombres              varchar(40) NULL,
	fechaNacimiento      DATE NULL,
	sexo                 char(1) NULL,
	fechaContrato        DATE NULL,
	sueldo               DECIMAL(8,2) NULL,
	email                varchar(40) NULL,
	telefono             varchar(12) NULL
	
);

ALTER TABLE USUARIO
ADD PRIMARY KEY (dni);

ALTER TABLE ADMINISTRADOR
ADD FOREIGN KEY (dni) REFERENCES USUARIO(dni)
		ON DELETE CASCADE;

ALTER TABLE COCINERO
ADD FOREIGN KEY (dni) REFERENCES USUARIO(dni)
		ON DELETE CASCADE;

ALTER TABLE DETALLE_PEDIDO
ADD FOREIGN KEY R_7 (idpedido) REFERENCES PEDIDO (idpedido);

ALTER TABLE DETALLE_PEDIDO
ADD FOREIGN KEY R_8 (idproducto) REFERENCES PRODUCTO (idproducto);

ALTER TABLE MESA
ADD FOREIGN KEY R_19 (idpedido) REFERENCES PEDIDO (idpedido);

ALTER TABLE MOZO
ADD FOREIGN KEY (dni) REFERENCES USUARIO(dni)
		ON DELETE CASCADE;

ALTER TABLE PEDIDO
ADD FOREIGN KEY R_10 (idcliente) REFERENCES CLIENTE (idcliente);



/* *************************** INSERTS ****************************** */
/* Usuario Maestro*/


