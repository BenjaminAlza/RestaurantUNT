drop database if exists bdprueba;
create database bdprueba;
use bdprueba;

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

CREATE TABLE clientedelivery (
  idCliente INT NOT NULL AUTO_INCREMENT,
  dni CHAR(8) NOT NULL,
  nombre VARCHAR(40) NOT NULL,
  direccion VARCHAR(40) NOT NULL,
  correo VARCHAR(40) NOT NULL,
  telefono INT(9) NOT NULL,
  estado TINYINT(4) NOT NULL,
  PRIMARY KEY (idCliente)
);

-- Creamos la tabla "detallepedido"
CREATE TABLE detallepedido (
  idDetalleP INT NOT NULL AUTO_INCREMENT,
  idCliente INT NOT NULL,
  idPedido INT NOT NULL,
  idRepartidor INT NOT NULL,
  fechaPedido DATE NOT NULL,
  modoPago VARCHAR(30) NOT NULL,
  totalPagar FLOAT NOT NULL,
  estado TINYINT(4) NOT NULL,
  PRIMARY KEY (idDetalleP),
  KEY idRepartidor (idRepartidor),
  KEY idPedido (idPedido),
  KEY idCliente (idCliente)
);

-- Creamos la tabla "pedidodelivery"
CREATE TABLE pedidodelivery (
  idPedido INT NOT NULL AUTO_INCREMENT,
  idCliente INT NOT NULL,
  idProducto INT NOT NULL,
  cantidad INT NOT NULL,
  estado TINYINT(4) NOT NULL,
  PRIMARY KEY (idPedido),
  KEY idCliente (idCliente),
  KEY idProducto (idProducto)
);

-- Creamos la tabla "productodelivery"
CREATE TABLE productodelivery (
  idProducto INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(30) NOT NULL,
  precio FLOAT NOT NULL,
  stock INT NOT NULL,
  estado TINYINT(4) NOT NULL,
  PRIMARY KEY (idProducto)
);

-- Creamos la tabla "repartidor"
CREATE TABLE repartidor (
  idRepartidor INT NOT NULL AUTO_INCREMENT,
  dni CHAR(8) DEFAULT NULL,
  nombres VARCHAR(40) DEFAULT NULL,
  direccion VARCHAR(40) DEFAULT NULL,
  email VARCHAR(40) DEFAULT NULL,
  telefono VARCHAR(12) DEFAULT NULL,
  sueldo FLOAT DEFAULT NULL,
  vehiculo VARCHAR(30) NOT NULL,
  placa VARCHAR(10) NOT NULL,
  estado TINYINT(4) DEFAULT NULL,
  PRIMARY KEY (idRepartidor)
);




---------ALMACEN...-----

CREATE TABLE insumo (
  idInsumo INT NOT NULL AUTO_INCREMENT,
  nombreIn VARCHAR(40) DEFAULT NULL,
  descripcionIn VARCHAR(40) DEFAULT NULL,
  fechaAdquisicion date DEFAULT NULL,
  fechaCaducidad date DEFAULT NULL,
  lote varchar(10),
  stockIn int,
  estado int,
  PRIMARY KEY (idInsumo)
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

-- Alter Table para agregar claves primarias y for�neas
ALTER TABLE detallepedido
  ADD FOREIGN KEY (idCliente) REFERENCES clientedelivery (idCliente),
  ADD FOREIGN KEY (idPedido) REFERENCES pedidodelivery (idPedido),
  ADD FOREIGN KEY (idRepartidor) REFERENCES repartidor (idRepartidor);

ALTER TABLE pedidodelivery
  ADD FOREIGN KEY (idCliente) REFERENCES clientedelivery (idCliente),
  ADD FOREIGN KEY (idProducto) REFERENCES productodelivery (idProducto);

ALTER TABLE clientedelivery
  MODIFY idCliente INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE detallepedido
  MODIFY idDetalleP INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE pedidodelivery
  MODIFY idPedido INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE productodelivery
  MODIFY idProducto INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE repartidor
  MODIFY idRepartidor INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;



