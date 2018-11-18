DROP TABLE IF EXISTS cliente;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO cliente VALUES ("30","Cesar Santos","(35) 99920.6021","cesarsantoskdsrl@gmail.com","098.148.536-74","Rua",NULL,"Complemento","Bairro dos Maias Estação Dias","Brazópolis","MG","202cb962ac59075b964b07152d234b70");
INSERT INTO cliente VALUES ("31","Alexandre Joaquim Pereira","(35) 99913.6071","alexandrejoaquim1999@gmail.com","117.121.496-01","Principal",NULL,"Casa","Bom Sucesso","Brazópolis","MG","202cb962ac59075b964b07152d234b70");


DROP TABLE IF EXISTS problema;

CREATE TABLE `problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `situacao` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO problema VALUES ("1","30","meu pc nao liga","Iniciado");
INSERT INTO problema VALUES ("2","30","sadsdfdsdfsdfsdfdsfdsfsd","Cancelado");
INSERT INTO problema VALUES ("3","30","zdfgagsdfgdfg","Iniciado");
INSERT INTO problema VALUES ("4","30","dsfasdfdfds","Iniciado");
INSERT INTO problema VALUES ("5","30","sdfsdfsdfsdfds","Cancelado");
INSERT INTO problema VALUES ("7","31","apercd","Iniciado");
INSERT INTO problema VALUES ("8","31","Apertei insert e meu pc explodiu, o que faço?","Iniciado");


DROP TABLE IF EXISTS servicos;

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_abertura` date NOT NULL,
  `data_termino` date DEFAULT NULL,
  `id_problema` int(11) NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `descricao_servico` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avaliacao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_problema` (`id_problema`),
  KEY `id_tecnico` (`id_tecnico`),
  CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`id_problema`) REFERENCES `problema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO servicos VALUES ("1","2018-11-07","2018-11-08","1","Visita Técnica","13","o pc estava fora da tomada","1");
INSERT INTO servicos VALUES ("2","2018-11-07","2018-11-07","2","Visita Técnica","19","nsei","1");
INSERT INTO servicos VALUES ("3","2018-11-08",NULL,"3",NULL,"19",NULL,"1");
INSERT INTO servicos VALUES ("4","2018-11-08",NULL,"4",NULL,"19",NULL,NULL);
INSERT INTO servicos VALUES ("5","2018-11-10",NULL,"7",NULL,"20",NULL,"1");
INSERT INTO servicos VALUES ("6","2018-11-10",NULL,"8",NULL,"20",NULL,NULL);
INSERT INTO servicos VALUES ("7","2018-11-10",NULL,"1",NULL,"20",NULL,NULL);


DROP TABLE IF EXISTS tecnico;

CREATE TABLE `tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `rua` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `formacao` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `instituicao` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `avaliacao` float NOT NULL DEFAULT '0',
  `avaliacao_total` int(11) DEFAULT '0',
  `qtd_serv` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`senha`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO tecnico VALUES ("13","Cesar Santos","(35) 9992.0","cesarsantoskdsrl@gmail.com","123.456.789-25","1989-11-14",NULL,NULL,NULL,"Bairro dos Maias Estação Dias","Brazópolis","MG","tecnico","CEP brasopolis","cas","202cb962ac59075b964b07152d234b70","2","9","27","3");
INSERT INTO tecnico VALUES ("19","Cesar Santos","(35) 99920.6021","cesarsantoskdsrl@gmail.com","098.148.536-74","1989-11-14",NULL,NULL,NULL,"Bairro dos Maias Estação Dias","Brazópolis","MG","tecnico","CEP brasopolis","Cesar San","202cb962ac59075b964b07152d234b70","1","10","10","1");
INSERT INTO tecnico VALUES ("20","Alexandre Joaquim Pereira","(35) 99913.6071","alexandrejoaquim1999@gmail.com","117.121.496-01","1999-09-27","Principal",NULL,"Casa","Bom Sucesso","Brazópolis","MG","Técnico em Informática","CEP- Brazópolis","mandi","ebcd1289dab7e8c4c252080c43304e4c","2","10","20","2");


