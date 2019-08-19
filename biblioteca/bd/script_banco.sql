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