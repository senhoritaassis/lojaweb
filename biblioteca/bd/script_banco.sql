DROP DATABASE lojaweb;
CREATE DATABASE lojaweb;

USE lojaweb;

create table cliente(
idCliente integer NOT NULL auto_increment,
email varchar (50) NOT NULL,
senha varchar (15) NOT NULL,
cpf varchar (15) NOT NULL,
nome varchar (60) NOT NULL,
nascimento varchar (10) NOT NULL,
sexo varchar (10) NOT NULL,
telefone varchar (15) NOT NULL,
primary key (idCliente)
);



create table categoria(
idCategoria integer NOT NULL auto_increment,
descricao varchar (200) NOT NULL,
primary key (idCategoria)
);

CREATE TABLE produto(
    idproduto BIGINT NOT NULL AUTO_INCREMENT,
    idcategoria BIGINT NOT NULL,
    preco VARCHAR(10) NOT NULL,
    nomeproduto VARCHAR(100) NOT NULL,
    tipo VARCHAR(60) NOT NULL,
    cor VARCHAR(10) NOT NULL,
    fabricante VARCHAR(100) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    tamanho VARCHAR(20) NOT NULL,
    imagem VARCHAR(200) NOT NULL,
    quantidade VARCHAR(60) NOT NULL,
    estoque_minimo INT(8) NOT NULL,
    estoque_maximo INT(8) NOT NULL,
    PRIMARY KEY (idproduto),
    FOREIGN KEY (idcategoria) REFERENCES categoria(idcategoria) ON DELETE CASCADE ON UPDATE CASCADE
);

create table usuario (
	idusuario int(11) not null auto_increment,
	nomeusuario varchar(60) not null,
	email varchar(60) not null,
	senha varchar(60) not null,
	cpf varchar(60) not null,
	datanascimento varchar(10) not null,
	sexo varchar(60) not null,
	tipousuario varchar(5),
	primary key (idusuario)
);

create table endereco (
	idendereco int(11) not null auto_increment,
	idusuario int(11) not null,
	logadouro varchar(60) not null,
	numero varchar(7) not null,
	complemento varchar(60) not null,
	bairro varchar(60) not null,
	cidade varchar(60) not null,
	cep varchar(60),
	primary key (idendereco),
	foreign key (idusuario) references usuario(idusuario) on update cascade on delete cascade
);

CREATE TABLE FormaPagamento (
idFormaPagamento integer NOT NULL auto_increment,
descricao varchar (45) NOT NULL,
primary key (idFormaPagamento)
);



create table pedido (
	idpedido int(11) not null auto_increment,
	idusuario int(11) not null,
	idendereco int(11) not null,
	datacompra date not null,
	primary key (idpedido),
	foreign key (idusuario) references usuario(idusuario) on update cascade on delete cascade,
	foreign key (idendereco) references usuario(idusuario) on update cascade on delete cascade
);




CREATE TABLE produtos(
	idproduto INT(11) NOT NULL AUTO_INCREMENT,
	preco DOUBLE NOT NULL,
	nomeproduto VARCHAR(30) NOT NULL,
	tipo VARCHAR(60) NOT NULL,
	cor VARCHAR(60) NOT NULL,
	fabricante VARCHAR(60) NOT NULL,
	descricao VARCHAR(60) NOT NULL,
	tamanho VARCHAR(60) NOT NULL,
	imagem VARCHAR(60) NOT NULL,
	categoria VARCHAR(60) NOT NULL,
	quantidade VARCHAR (60) NOT NULL,
	estoque_minimo INT(11) NOT NULL,
	estoque_maximo INT(11) NOT NULL,
	PRIMARY KEY (idproduto)
	);

CREATE TABLE log_produto(
	ID_LOG INT(11) NOT NULL  AUTO_INCREMENT,
	TABELA VARCHAR(45) NOT NULL,
	USUARIO VARCHAR(45) NOT NULL,
	DATA_HORA DATETIME NOT NULL,
	ACAO VARCHAR(45) NOT NULL,
	DADOS VARCHAR(1000) NOT NULL,
	PRIMARY KEY (ID_LOG)
	);

CREATE TABLE pedido_produto(
	idproduto INT(11) NOT NULL,	
	idpedido INT(11) NOT NULL,
	quantidade INT(11) NOT NULL,
	PRIMARY KEY (idproduto, idpedido),
	FOREIGN KEY (idproduto) REFERENCES produtos(idproduto) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idpedido) REFERENCES pedido(idpedido) ON UPDATE CASCADE ON DELETE CASCADE
	);

CREATE TABLE estoque(
	idestoque INT(11) NOT NULL AUTO_INCREMENT,
	id_produto INT(11) NOT NULL,	
	qtde INT(11) NOT NULL,
	PRIMARY KEY (idestoque),
	FOREIGN KEY (id_produto) REFERENCES produtos(idproduto) ON UPDATE CASCADE ON DELETE CASCADE
	);