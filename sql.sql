
CREATE TABLE cliente (
  idcliente int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  datanascimento date DEFAULT NULL,
  sexo varchar(1) DEFAULT NULL,
  nomemae varchar(50) DEFAULT NULL,
  nomepai varchar(50) DEFAULT NULL,
  cep varchar(8) DEFAULT NULL,
  cidade varchar(50) DEFAULT NULL,
  rua varchar(50) DEFAULT NULL,
  uf varchar(2) DEFAULT NULL,
  datamovimento timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data do cadastro ou da ultima alteracao',
  PRIMARY KEY (idcliente),
  UNIQUE KEY idcliente (idcliente)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

insert into cliente (idcliente, nome, email, datanascimento, sexo, nomemae, nomepai, cep, cidade, rua, uf, datamovimento) values
(1, 'Matheus Barbosa','matheusb@gmail.com','1990-09-29','m','Veronica Barbosa','Nelson Bezzera','87485000','Douradina','Sempre Dia','PR',CURRENT_TIMESTAMP),
(2, 'Alexandro dos Santos','alex.santos@gmail.com','1985-05-14','m','Neide S.','Mauro B.','87485000','Douradina','Rua Estreita','PR',CURRENT_TIMESTAMP),
(3, 'Nicolas Binatti','nicolasbinattii@gmail.com','1995-09-29','m','Marta Marchi Binatti','Nilvo Binatti','87485000','Douradina','Rua Osvaldo Ribeiro','PR',CURRENT_TIMESTAMP),
(4, 'Sebastiam Chico de Souza','supertiao@gazin.com.br','1940-10-10','m','Joao','Maria','87485000','Douradina','Rua Mga','PR',CURRENT_TIMESTAMP),
(5, 'Marta Pereira Dias','carol.dias@gmail.com','1998-01-01','f','Nilceia Dias','Gilson Pereira','87485000','Douradina','Rua Meneguel','PR',CURRENT_TIMESTAMP),
(6, 'Nubia Binatti','nubia_nb@hotmail.com','1994-02-02','m','Marta Marchi Binatti','Nilvo Binatti','87485000','Douradina','R. Seca','PR',CURRENT_TIMESTAMP),
(7, 'Antonio Beltrao Mendes','toninhob@gmail.com','1945-05-05','m','Aparecida Helena','Juvenal de Pereira','87501300','Umuarama','Rua da Felicidade','PR',CURRENT_TIMESTAMP),
(8, 'Tiago Zankistowisk','tigaozan@hotmail.com','1990-01-02','m','Hilla Zankistowisk','Patie Zankistowisk','08081000','Sao Paulo','S/ Registro','SP',CURRENT_TIMESTAMP),
(9, 'Maria Salles','mslles@bol.com.br','1945-11-11','f','S/Registro.','S/Registro.','87005000','Maringa','S/Registro','PR',CURRENT_TIMESTAMP);

CREATE TABLE usuario (
  idusuario int(11) NOT NULL AUTO_INCREMENT,
  usuario varchar(20) DEFAULT NULL,
  senha varchar(20) DEFAULT NULL,
  PRIMARY KEY (idusuario),
  UNIQUE KEY idusuario (idusuario)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

insert into usuario (idusuario, usuario, senha) values
(1, 'admin', 'admin');