DROP TABLE IF EXISTS cliente;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO cliente VALUES ("1","Cesar Santos","(35) 99920.6021","cesarsantoskdsrl@gmail.com","098.148.536-74",NULL,NULL,NULL,"Bairro dos Maias Estação Dias","Brazópolis","MG","202cb962ac59075b964b07152d234b70");
INSERT INTO cliente VALUES ("3","cesar","(35) 99920.6021","cesarkds@gmail.com","098.148.536-47",NULL,NULL,NULL,"Bairro dos Maias Estação Dias","Brazópolis","MG","202cb962ac59075b964b07152d234b70");


DROP TABLE IF EXISTS problema;

CREATE TABLE `problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `problema_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO problema VALUES ("1","1","meu pc não liga","Cancelado");
INSERT INTO problema VALUES ("2","1","meu pc não liga","Iniciado");
INSERT INTO problema VALUES ("3","1","meu pc morreu","Iniciado");
INSERT INTO problema VALUES ("6","3","minha internet esta lenta\n","Cancelado");
INSERT INTO problema VALUES ("7","3","meu roteador esta desligando sozinho","Iniciado");


DROP TABLE IF EXISTS servicos;

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_abertura` date NOT NULL,
  `data_termino` date DEFAULT NULL,
  `id_problema` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `descricao_servico` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avaliacao` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_problema` (`id_problema`),
  KEY `id_tecnico` (`id_tecnico`),
  CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`id_problema`) REFERENCES `problema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO servicos VALUES ("1","2018-11-12","2018-11-15","2","Visita Técnica","1","o equipamento estava com a fonte queimada",NULL);
INSERT INTO servicos VALUES ("2","2018-11-14","2018-11-14","3","Visita Técnica","11","tava fora da tomada",NULL);
INSERT INTO servicos VALUES ("5","2018-11-18",NULL,"7",NULL,"11",NULL,NULL);


DROP TABLE IF EXISTS tecnico;

CREATE TABLE `tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `rua` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `formacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `instituicao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `avaliacao` float DEFAULT NULL,
  `avaliacao_total` int(11) DEFAULT NULL,
  `qtd_serv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`) USING BTREE,
  UNIQUE KEY `login_2` (`login`,`senha`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tecnico VALUES ("1","César Adriano dos Santos","(35) 9992.06021","cesarsantoskdsrl@gmail.com","098.148.536-74","1989-11-14","Rua",NULL,"Complemento","Bairro dos Maias Estação Dias","Brazópolis","MG","Técnico em Informática","CEP- Centro de Educação Profissional &#34;Tancredo Neves&#34; - Brazópolis MG","César Santos","202cb962ac59075b964b07152d234b70","2",NULL,NULL,NULL);
INSERT INTO tecnico VALUES ("2","Alexandre Joaquim Pereira","(35) 99913.6071","alexandrejoaquim1999@gmail.com","117.121.496-01","1999-09-27","Principal",NULL,"Casa","Bom Sucesso","Brazópolis","MG","Técnico em Informática","CEP- Centro de Educação Profissional &#34;Tancredo Neves&#34; - Brazópolis MG","Alexandre","827ccb0eea8a706c4c34a16891f84e7b","2",NULL,NULL,NULL);
INSERT INTO tecnico VALUES ("3","Jeferson Aparecido Honório","(35) 8428.8562","jefferson.ap.honorio@gmail.com","063.398.896-03","1982-05-08",NULL,NULL,NULL,"Vila Frei Orestes","Paraiópo9lis","MG","Técnico em Informática","CEP- Centro de Educação Profissional &#34;Tancredo Neves&#34; - Brazópolis MG","jeferson","85f34d7bfc44fa2693f66b563610ede3","2",NULL,NULL,NULL);
INSERT INTO tecnico VALUES ("11","Welingson Expedito dos Santos","(35) 9988.14019","welingson12@gmail.com","121.212.121-21","1998-01-20","Rua",NULL,"Complemento","Boa Vista","Brazópolis","MG","Técnico em Informática","CEP- Centro de Educação Profissional &#34;Tancredo Neves&#34; - Brazópolis MG","welingson12@gmail.com","202cb962ac59075b964b07152d234b70","1",NULL,NULL,NULL);


