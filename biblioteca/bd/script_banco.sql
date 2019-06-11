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
	idproduto INT(11) NOT NULL AUTO_INCREMENT,
        idcategoria INT(11) NOT NULL,
	preco DOUBLE NOT NULL,
	nomeproduto VARCHAR(30) NOT NULL,
	tipo VARCHAR(60) NOT NULL,
	cor VARCHAR(60) NOT NULL,
	fabricante VARCHAR(60) NOT NULL,
	descricao VARCHAR(60) NOT NULL,
	tamanho VARCHAR(60) NOT NULL,
	imagem VARCHAR(60) NOT NULL,
	quantidade VARCHAR (60) NOT NULL,
	estoque_minimo INT(11) NOT NULL,
	estoque_maximo INT(11) NOT NULL,
	PRIMARY KEY (idproduto),
        FOREIGN KEY (idcategoria) REFERENCES
        categoria(idcategoria) 
	);


