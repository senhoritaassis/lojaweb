creDROP DATABASE mvcd;
CREATE DATABASE mvcd;

USE mvcd;

CREATE TABLE IF NOT EXISTS `mvcd`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `papel` VARCHAR(100) NOT NULL DEFAULT 'usuario'
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8

INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('admin', '123', 'admin@admin', 'admin');
INSERT INTO `mvcd`.`usuario` (`nome`, `senha`, `email`, `papel`) VALUES ('usuario', '123', 'usuario@usuario', 'usuario');






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





create table produto(
idProduto integer NOT NULL auto_increment,
nome varchar (100) NOT NULL,
tipo  varchar (100) NOT NULL,
preco varchar (10) NOT NULL,
cor varchar (15) NOT NULL,
fabricante varchar (100) NOT NULL,
descricao varchar (200) NOT NULL,
quantidade varchar (50) NOT NULL,

primary key (idProduto)
);

create table categoria(
idCategoria integer NOT NULL auto_increment,
descricao varchar (200) NOT NULL,


primary key (idCategoria)
);