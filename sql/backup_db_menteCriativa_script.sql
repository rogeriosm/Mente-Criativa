-- MySQL dump 10.16  Distrib 10.1.33-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_mentecriativa
-- ------------------------------------------------------
-- Server version	10.1.33-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `db_mentecriativa`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_mentecriativa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_mentecriativa`;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id_alunos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT 'Aluno',
  `pontuacao` int(11) NOT NULL DEFAULT '0',
  `usuario_login` varchar(100) NOT NULL,
  PRIMARY KEY (`id_alunos`),
  KEY `fk_inst_alunos_usuario1_idx` (`usuario_login`),
  CONSTRAINT `fk_inst_alunos_usuario1` FOREIGN KEY (`usuario_login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`id_alunos`, `nome`, `pontuacao`, `usuario_login`) VALUES (1,'cris',0,'testeinst');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amigo`
--

DROP TABLE IF EXISTS `amigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amigo` (
  `id_amigo` int(11) NOT NULL AUTO_INCREMENT,
  `amigo_login` varchar(100) NOT NULL,
  `nomeAmigo` varchar(45) NOT NULL,
  `usuario_login` varchar(100) NOT NULL,
  PRIMARY KEY (`id_amigo`),
  KEY `fk_amigo_usuario1_idx` (`usuario_login`),
  CONSTRAINT `fk_amigo_usuario1` FOREIGN KEY (`usuario_login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amigo`
--

LOCK TABLES `amigo` WRITE;
/*!40000 ALTER TABLE `amigo` DISABLE KEYS */;
INSERT INTO `amigo` (`id_amigo`, `amigo_login`, `nomeAmigo`, `usuario_login`) VALUES (3,'testeusu','teste usu','usuarioDois'),(4,'usuarioDois','haha','testeusu'),(23,'usuarioDois','haha','usuario'),(24,'usuario','usuario  um','usuarioDois'),(25,'testeusu4','usuario','usuario'),(26,'usuario','usuario  um','testeusu4'),(27,'testeusu3','usuario','usuario'),(28,'usuario','usuario  um','testeusu3'),(29,'usuario','usuario  um','carolina'),(30,'carolina','usuario','usuario');
/*!40000 ALTER TABLE `amigo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensagem` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(250) NOT NULL,
  `amigo_id_amigo` int(11) NOT NULL,
  `amigo_login` varchar(100) NOT NULL,
  `usuario_login` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_mensagem_amigo1_idx` (`amigo_id_amigo`),
  KEY `fk_mensagem_usuario1_idx` (`usuario_login`),
  CONSTRAINT `fk_mensagem_amigo1` FOREIGN KEY (`amigo_id_amigo`) REFERENCES `amigo` (`id_amigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mensagem_usuario1` FOREIGN KEY (`usuario_login`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
INSERT INTO `mensagem` (`id_mensagem`, `mensagem`, `amigo_id_amigo`, `amigo_login`, `usuario_login`) VALUES (3,'ola eu sou o usuairo dois!\r\n',3,'testeusu','usuarioDois'),(4,'ola usuario dois!\r\neu sou o usuario teste!',4,'usuarioDois','testeusu'),(7,'sdaasdasdc',3,'testeusu','usuarioDois'),(8,'asdasdasd',23,'usuarioDois','usuario'),(9,'asdasd',23,'usuarioDois','usuario'),(10,'oi\r\n',29,'usuario','carolina'),(11,'boa tarde',29,'usuario','carolina');
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` (`id_tipoUsuario`, `descricao`) VALUES (1,'administrador'),(2,'instituicao'),(3,'usuario');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `login` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL DEFAULT 'usuario',
  `pontuacao` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `tipoUsuario_id_tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `fk_usuario_tipoUsuario1_idx` (`tipoUsuario_id_tipoUsuario`),
  CONSTRAINT `fk_usuario_tipoUsuario1` FOREIGN KEY (`tipoUsuario_id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`login`, `senha`, `nome`, `pontuacao`, `level`, `tipoUsuario_id_tipoUsuario`) VALUES ('carolina','202cb962ac59075b964b07152d234b70','usuario',0,0,3),('instituicao','202cb962ac59075b964b07152d234b70','crescer',0,0,2),('instituicao4','202cb962ac59075b964b07152d234b70','usuario',0,0,2),('rogerio','202cb962ac59075b964b07152d234b70','rogerio',0,0,1),('testeinst','202cb962ac59075b964b07152d234b70','usuario',0,0,2),('testeusu','202cb962ac59075b964b07152d234b70','teste usu',0,0,3),('testeusu2','202cb962ac59075b964b07152d234b70','usuario',0,0,3),('testeusu3','202cb962ac59075b964b07152d234b70','usuario',0,0,3),('testeusu4','202cb962ac59075b964b07152d234b70','usuario',0,0,3),('usuario','202cb962ac59075b964b07152d234b70','usuario  um',42,1,3),('usuarioDois','202cb962ac59075b964b07152d234b70','haha',0,0,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-08 12:44:43
