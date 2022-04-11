CREATE DATABASE Tienda_Master;

USE Tienda_Maser;

CREATE TABLE usuarios(
id          int(255) auto_increment not null,
nombre      varchar(100) not null,
apellidos   varchar (255),
email       varchar(255) not null,
password    varchar(255) not null,
rol         varchar(20),
image       varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email) 
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(NULL,"Admin","Admin","Admin@Admin.com","intermitencia2233", "Admin", null);

CREATE TABLE categorias(
id          int(255) auto_increment not null,
nombre      varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;

INSERT INTO categorias VALUES(Null,"Manga Corta");
INSERT INTO categorias VALUES(Null,"Tirantes");
INSERT INTO categorias VALUES(Null,"Manga Larga");
INSERT INTO categorias VALUES(Null,"Sudaderas");

CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) RERENCES categorias(id)
)ENGINE=InnoDB;

CREATE TABLE pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
locacalidad     varchar(100) not null,
direccion       varchar(255) not null,
coste           float(200,2) not null
estado          varchar(20) not null,
fecha           date not null,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
CONSTRAINT pk_linead PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedidos FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_lineas_productos FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDB;