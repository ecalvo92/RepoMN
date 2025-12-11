CREATE DATABASE  IF NOT EXISTS `mn_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `mn_bd`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mn_bd
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbcarrito`
--

DROP TABLE IF EXISTS `tbcarrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcarrito` (
  `ConsecutivoCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoProducto` int(11) NOT NULL,
  `ConsecutivoUsuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`ConsecutivoCarrito`),
  KEY `FK_CarritoProducto` (`ConsecutivoProducto`),
  KEY `FK_CarritoUsuario` (`ConsecutivoUsuario`),
  KEY `idx_ConsecutivoUsuario` (`ConsecutivoUsuario`),
  CONSTRAINT `FK_CarritoProducto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `tbproducto` (`ConsecutivoProducto`),
  CONSTRAINT `FK_CarritoUsuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `tbusuario` (`ConsecutivoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcarrito`
--

LOCK TABLES `tbcarrito` WRITE;
/*!40000 ALTER TABLE `tbcarrito` DISABLE KEYS */;
INSERT INTO `tbcarrito` VALUES (38,5,2,'2025-12-10 18:32:51',1),(39,6,2,'2025-12-10 18:32:53',3);
/*!40000 ALTER TABLE `tbcarrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdetalle`
--

DROP TABLE IF EXISTS `tbdetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbdetalle` (
  `ConsecutivoDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `ConsecutivoFactura` int(11) NOT NULL,
  `ConsecutivoProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `SubTotal` decimal(10,2) NOT NULL,
  `Impuesto` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ConsecutivoDetalle`),
  KEY `FK_DetalleFactura` (`ConsecutivoFactura`),
  KEY `FK_DetalleProducto` (`ConsecutivoProducto`),
  CONSTRAINT `FK_DetalleFactura` FOREIGN KEY (`ConsecutivoFactura`) REFERENCES `tbfactura` (`ConsecutivoFactura`),
  CONSTRAINT `FK_DetalleProducto` FOREIGN KEY (`ConsecutivoProducto`) REFERENCES `tbproducto` (`ConsecutivoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdetalle`
--

LOCK TABLES `tbdetalle` WRITE;
/*!40000 ALTER TABLE `tbdetalle` DISABLE KEYS */;
INSERT INTO `tbdetalle` VALUES (66,11,5,2,8.00,16.00,2.08,18.08),(67,12,5,1,8.00,8.00,1.04,9.04),(68,12,6,2,4.00,8.00,1.04,9.04),(69,12,8,3,25.00,75.00,9.75,84.75),(70,13,8,17,25.00,425.00,55.25,480.25),(71,14,8,17,15.00,255.00,33.15,288.15),(72,15,5,5,8.00,40.00,5.20,45.20),(73,15,6,6,4.00,24.00,3.12,27.12),(74,15,8,7,15.00,105.00,13.65,118.65),(75,16,5,1,8.00,8.00,1.04,9.04),(76,16,6,30,4.00,120.00,15.60,135.60),(77,16,8,26,15.00,390.00,50.70,440.70),(78,17,5,1,8.00,8.00,1.04,9.04);
/*!40000 ALTER TABLE `tbdetalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tberror`
--

DROP TABLE IF EXISTS `tberror`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tberror` (
  `ConsecutivoError` int(11) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(8000) NOT NULL,
  `FechaHora` datetime NOT NULL,
  PRIMARY KEY (`ConsecutivoError`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tberror`
--

LOCK TABLES `tberror` WRITE;
/*!40000 ALTER TABLE `tberror` DISABLE KEYS */;
INSERT INTO `tberror` VALUES (2,'PROCEDURE mn_bd.CrearCuent does not exist','2025-10-08 20:12:33'),(3,'Unknown column \'CorreoElectronico\' in \'field list\'','2025-10-08 20:14:38'),(4,'PROCEDURE mn_bd.ActualizarProducto does not exist','2025-11-05 20:25:22'),(5,'PROCEDURE mn_bd.ActualizarProducto does not exist','2025-11-05 20:26:18'),(6,'PROCEDURE mn_bd.ActualizarProducto does not exist','2025-11-05 20:28:44'),(7,'Incorrect number of arguments for PROCEDURE mn_bd.ConsultarProducto; expected 1, got 0','2025-11-05 20:56:51'),(8,'Ya existe un usuario con esa identificación o correo electrónico.','2025-11-12 18:29:12'),(9,'Ya existe un producto con ese nombre.','2025-11-12 18:43:49'),(10,'Table \'mn_bd.tproducto\' doesn\'t exist','2025-11-12 20:48:19'),(11,'Column \'ConsecutivoProducto\' in field list is ambiguous','2025-12-03 19:22:50'),(12,'Column \'Cantidad\' in field list is ambiguous','2025-12-03 19:23:54'),(13,'Column \'Cantidad\' in field list is ambiguous','2025-12-03 19:23:55'),(14,'Column \'Precio\' in field list is ambiguous','2025-12-03 19:24:41'),(15,'The used SELECT statements have a different number of columns','2025-12-10 18:37:34');
/*!40000 ALTER TABLE `tberror` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbfactura`
--

DROP TABLE IF EXISTS `tbfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbfactura` (
  `ConsecutivoFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` datetime NOT NULL,
  `ConsecutivoUsuario` int(11) NOT NULL,
  `CantidadUnidades` int(11) NOT NULL,
  `TotalUnidades` decimal(10,2) NOT NULL,
  `MedioPago` varchar(50) NOT NULL,
  PRIMARY KEY (`ConsecutivoFactura`),
  KEY `FK_FacturaUsuario` (`ConsecutivoUsuario`),
  CONSTRAINT `FK_FacturaUsuario` FOREIGN KEY (`ConsecutivoUsuario`) REFERENCES `tbusuario` (`ConsecutivoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfactura`
--

LOCK TABLES `tbfactura` WRITE;
/*!40000 ALTER TABLE `tbfactura` DISABLE KEYS */;
INSERT INTO `tbfactura` VALUES (11,'2024-09-03 18:47:55',4,2,18.08,'Pagaré con Tarjeta de Debito'),(12,'2025-03-03 18:50:43',4,6,102.83,'Efectivo'),(13,'2025-05-03 18:52:50',2,17,480.25,'cheque'),(14,'2025-07-03 19:09:51',2,17,288.15,'al contado'),(15,'2025-09-03 19:27:15',4,18,190.97,'asdasdas'),(16,'2025-11-10 19:25:47',4,57,985.34,'PAGO EN EFECTIVO'),(17,'2025-12-10 19:55:37',5,1,9.04,'efectivo');
/*!40000 ALTER TABLE `tbfactura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbperfil`
--

DROP TABLE IF EXISTS `tbperfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbperfil` (
  `ConsecutivoPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`ConsecutivoPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbperfil`
--

LOCK TABLES `tbperfil` WRITE;
/*!40000 ALTER TABLE `tbperfil` DISABLE KEYS */;
INSERT INTO `tbperfil` VALUES (1,'Usuario Administrador'),(2,'Usuario Regular');
/*!40000 ALTER TABLE `tbperfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbproducto`
--

DROP TABLE IF EXISTS `tbproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbproducto` (
  `ConsecutivoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(2000) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Estado` bit(1) NOT NULL,
  `Imagen` varchar(250) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`ConsecutivoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbproducto`
--

LOCK TABLES `tbproducto` WRITE;
/*!40000 ALTER TABLE `tbproducto` DISABLE KEYS */;
INSERT INTO `tbproducto` VALUES (5,'Caja grande - fresas de temporada','Las fresas son frutas pequeñas, rojas y dulces, con una textura jugosa y un aroma característico. Pertenecen al género Fragaria y se cultivan ampliamente en climas templados. Son ricas en vitamina C, antioxidantes y fibra, lo que las hace nutritivas y saludables. Se consumen frescas, en postres, batidos, mermeladas o como ingrediente en muchas preparaciones.',8.00,_binary '','../img/2.png',69),(6,'Caja pequeña - fresas de temporada','Las fresas son frutas pequeñas, rojas y dulces, con una textura jugosa y un aroma característico. Pertenecen al género Fragaria y se cultivan ampliamente en climas templados. Son ricas en vitamina C, antioxidantes y fibra, lo que las hace nutritivas y saludables. Se consumen frescas, en postres, batidos, mermeladas o como ingrediente en muchas preparaciones.',4.00,_binary '','../img/2.png',0),(7,'Caja mediana - fresas de temporada','¿Quieres que te muestre una comparación visual (pequeño ejemplo en HTML con las 5 imágenes lado a lado)? Puedo generarte el snippet para probarlo rápidamente.',6.00,_binary '','../img/2.png',0),(8,'fresas de importación','fresas de importación',15.00,_binary '','../img/2.png',0);
/*!40000 ALTER TABLE `tbproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `ConsecutivoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Identificacion` varchar(15) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `Contrasenna` varchar(10) NOT NULL,
  `Estado` bit(1) NOT NULL,
  `ConsecutivoPerfil` int(11) NOT NULL,
  PRIMARY KEY (`ConsecutivoUsuario`),
  KEY `FK_Usuario_Perfil` (`ConsecutivoPerfil`),
  CONSTRAINT `FK_Usuario_Perfil` FOREIGN KEY (`ConsecutivoPerfil`) REFERENCES `tbperfil` (`ConsecutivoPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (2,'304590415','EDUARDO JOSE CALVO CASTILLO','ecalvo90415@ufide.ac.cr','123',_binary '',2),(3,'208360632','BARRANTES BOGANTES ANTONY','abarrantes60632@ufide.ac.cr','123',_binary '',1),(4,'207960874','BRANDON JOSUE CORELLA SANCHEZ','bcorella60874@ufide.ac.cr','123',_binary '',2),(5,'304590416','FRANCINI DE LOS ANGELES ROMERO ARAYA','fromero90416@ufide.ac.cr','90416',_binary '',2);
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mn_bd'
--
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarContrasenna`(
	pConsecutivoUsuario int(11), 
	pContrasennaGenerada varchar(10)
)
BEGIN

	UPDATE 	tbUsuario
	SET		Contrasenna = pContrasennaGenerada
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPerfil`(
	pConsecutivoUsuario int(11), 
	pIdentificacion varchar(15),
    pNombre varchar(255),
    pCorreoElectronico varchar(100)
)
BEGIN

	UPDATE 	tbUsuario
	SET		Identificacion = pIdentificacion,
			Nombre = pNombre,
            CorreoElectronico = pCorreoElectronico
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarProducto`(
	pConsecutivoProducto int(11), 
	pNombre varchar(100),
    pDescripcion varchar(2000),
    pPrecio decimal(10,2),
    pImagen varchar(250),
    pCantidad INT(11)
)
BEGIN

	UPDATE 	tbproducto
	SET		Nombre = pNombre,
			Descripcion = pDescripcion,
            Precio = pPrecio,
            Imagen = (CASE WHEN pImagen = '' THEN Imagen ELSE pImagen END),
            Cantidad = pCantidad
    WHERE	ConsecutivoProducto = pConsecutivoProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AgregarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AgregarProducto`(
	pNombre varchar(100), 
	pDescripcion varchar(2000),
    pPrecio decimal(10,2), 
    pImagen varchar(250),
    pCantidad int(11)
)
BEGIN

	DECLARE vProductoExistente INT;

    -- Verificar si ya existe un producto con el mismo nombre
    SELECT 	COUNT(*) INTO vProductoExistente
    FROM 	tbproducto
    WHERE 	Nombre = pNombre;

    IF vProductoExistente > 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ya existe un producto con ese nombre.';
    ELSE
        INSERT INTO tbproducto(Nombre,Descripcion,Precio,Estado,Imagen,Cantidad)
		VALUES (pNombre, pDescripcion, pPrecio, 1, pImagen,pCantidad);
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambiarEstadoProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambiarEstadoProducto`(
	pConsecutivoProducto int(11)
)
BEGIN

	UPDATE 	tbproducto
	SET		Estado = CASE WHEN Estado = 1 THEN 0 ELSE 1 END
    WHERE	ConsecutivoProducto = pConsecutivoProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CambiarEstadoUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CambiarEstadoUsuario`(
	pConsecutivoUsuario int(11)
)
BEGIN

	UPDATE 	tbusuario
	SET		Estado = CASE WHEN Estado = 1 THEN 0 ELSE 1 END
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCarritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCarritos`(pConsecutivoUsuario INT)
BEGIN

	SELECT ConsecutivoCarrito,
		   C.ConsecutivoProducto,
		   ConsecutivoUsuario,
		   Fecha,
		   C.Cantidad,
           P.Nombre,
           P.Precio,
           (P.Precio * C.Cantidad) 'SubTotal',
           (P.Precio * C.Cantidad) * 0.13 'Impuesto',
           (P.Precio * C.Cantidad) * 1.13 'Total'
	FROM   tbcarrito C
    INNER  JOIN tbproducto P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE  ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCompras`(pConsecutivoUsuario INT)
BEGIN

	SELECT ConsecutivoFactura,
		   Fecha,
		   ConsecutivoUsuario,
		   CantidadUnidades,
		   TotalUnidades,
           MedioPago
	FROM   tbfactura F
    WHERE  ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarDetalleCompras` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetalleCompras`(pConsecutivoFactura INT)
BEGIN

	SELECT ConsecutivoDetalle,
		   ConsecutivoFactura,
		   D.ConsecutivoProducto,
		   D.Cantidad,
		   D.Precio,
           SubTotal,
           Impuesto,
           Total,
           P.Nombre
	FROM   tbDetalle D
    INNER JOIN tbProducto P ON D.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE  ConsecutivoFactura = pConsecutivoFactura;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarIndicadores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarIndicadores`()
BEGIN

	SELECT  COUNT(1)    AS 'Cantidad',
			'Productos' AS 'Descripcion'
    FROM 	tbProducto
    WHERE	Estado = 1
    
    UNION ALL
    
    SELECT  COUNT(1)   AS 'Cantidad',
			'Usuarios' AS 'Descripcion'
    FROM 	tbUsuario
    WHERE	Estado = 1
		AND ConsecutivoPerfil != 1
    
    UNION ALL
    
    SELECT  COUNT(1)   AS 'Cantidad',
			'Facturas' AS 'Descripcion'
    FROM 	tbFactura
    
    UNION ALL
    
    SELECT 	COUNT(*)    AS 'Cantidad',
			'Carritos'  AS 'Descripcion'
	FROM (
		SELECT  ConsecutivoUsuario,
				COUNT(1)
		FROM 	tbCarrito
		GROUP BY ConsecutivoUsuario
    ) AS T;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMejorCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMejorCliente`()
BEGIN

	SELECT 	U.Nombre, SUM(TotalUnidades) AS 'Cantidad'
	FROM 	tbfactura F
	INNER JOIN tbusuario U ON F.ConsecutivoUsuario = U.ConsecutivoUsuario
	GROUP BY U.Nombre
	ORDER BY SUM(TotalUnidades) DESC
    LIMIT 3;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProducto`(pConsecutivoProducto INT(11))
BEGIN

	SELECT  ConsecutivoProducto,
			Nombre,
			Descripcion,
			Precio,
			Estado,
			Imagen,
            Cantidad
	FROM 	tbproducto
    WHERE	ConsecutivoProducto = pConsecutivoProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductoMasVendido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductoMasVendido`()
BEGIN

	SELECT 	P.Nombre, SUM(D.Cantidad) AS 'Cantidad'
	FROM 	tbDetalle D
	INNER JOIN tbProducto P ON D.ConsecutivoProducto = P.ConsecutivoProducto
	GROUP BY P.Nombre
	ORDER BY SUM(D.Cantidad) DESC
    LIMIT 3;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductos`()
BEGIN

	SELECT  ConsecutivoProducto,
			Nombre,
			Descripcion,
			Precio,
			Estado,
            CASE WHEN Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion',
			Imagen,
            Cantidad
	FROM 	tbproducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarProductosPrincipal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarProductosPrincipal`()
BEGIN

	SELECT  ConsecutivoProducto,
			Nombre,
			Descripcion,
			Precio,
			Estado,
            CASE WHEN Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion',
			Imagen,
            Cantidad
	FROM 	tbproducto
    WHERE	Estado = 1
		AND Cantidad > 0;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarResumenCarritos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarResumenCarritos`(pConsecutivoUsuario INT)
BEGIN

	SELECT COUNT(C.ConsecutivoProducto) 'Cantidad',
		   SUM((P.Precio * C.Cantidad) * 1.13) 'Total'
	FROM   tbcarrito C
    INNER  JOIN tbproducto P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE  ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuario`(
    pConsecutivoUsuario int(11)
)
BEGIN

	SELECT 	U.ConsecutivoUsuario,
			U.Identificacion,
			U.Nombre,
			U.CorreoElectronico,
			U.Contrasenna,
			U.Estado,
			U.ConsecutivoPerfil,
            P.Nombre 'NombrePerfil'
	FROM 	tbusuario U
    INNER 	JOIN tbperfil P ON U.ConsecutivoPerfil = P.ConsecutivoPerfil
    WHERE 	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuarios`(

)
BEGIN

	SELECT 	U.ConsecutivoUsuario,
			U.Identificacion,
			U.Nombre,
			U.CorreoElectronico,
			U.Contrasenna,
			U.Estado,
            CASE WHEN U.Estado = 1 THEN 'Activo' ELSE 'Inactivo' END 'EstadoDescripcion',
			U.ConsecutivoPerfil,
            P.Nombre 'NombrePerfil'
	FROM 	tbusuario U
    INNER 	JOIN tbperfil P ON U.ConsecutivoPerfil = P.ConsecutivoPerfil
    WHERE 	U.ConsecutivoPerfil != 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarVentasAnuales` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarVentasAnuales`()
BEGIN

SELECT MES, TOTAL
FROM (
    SELECT '' AS MES, 0 AS TOTAL, 0 AS ORDEN
    
    UNION ALL
    
    SELECT 
        DATE_FORMAT(Fecha, '%m-%Y') AS MES,
        SUM(TotalUnidades) AS TOTAL,
        DATE_FORMAT(Fecha, '%Y%m') AS ORDEN
    FROM tbfactura
    WHERE Fecha BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()
    GROUP BY DATE_FORMAT(Fecha, '%m-%Y')
) AS X
ORDER BY ORDEN;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CrearCuenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearCuenta`(
	pIdentificacion varchar(15), 
	pNombre varchar(255),
    pCorreoElectronico varchar(100), 
    pContrasenna varchar(10)
)
BEGIN

	DECLARE vCuentaExistente INT;

    -- Verificar si ya existe un usuario con la misma identificación o correo
    SELECT 	COUNT(*) INTO vCuentaExistente
    FROM 	tbusuario
    WHERE 	Identificacion = pIdentificacion 
       OR 	CorreoElectronico = pCorreoElectronico;

    IF vCuentaExistente > 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ya existe un usuario con esa identificación o correo electrónico.';
    ELSE
        INSERT INTO tbusuario (Identificacion, Nombre, CorreoElectronico, Contrasenna, Estado, ConsecutivoPerfil)
        VALUES (pIdentificacion, pNombre, pCorreoElectronico, pContrasenna, 1, 2);
    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RealizarPagoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RealizarPagoCarrito`(pConsecutivoUsuario INT, pMedioPago VARCHAR(50))
BEGIN

	/*1*/
    INSERT INTO tbfactura(Fecha,ConsecutivoUsuario,CantidadUnidades,TotalUnidades,MedioPago)
	SELECT	NOW(),
			C.ConsecutivoUsuario,
            SUM(C.Cantidad),
            SUM(C.Cantidad * P.Precio) * 1.13,
            pMedioPago
    FROM 	tbCarrito C
    INNER   JOIN tbProducto P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario
    GROUP   BY C.ConsecutivoUsuario;

    /*2*/
    INSERT INTO tbdetalle(ConsecutivoFactura,ConsecutivoProducto,Cantidad,Precio,SubTotal,Impuesto,Total)
	SELECT	LAST_INSERT_ID(),
			C.ConsecutivoProducto,
            C.Cantidad,
            P.Precio,
            C.Cantidad * P.Precio,
            (C.Cantidad * P.Precio) * 0.13,
            (C.Cantidad * P.Precio) * 1.13
    FROM 	tbCarrito C
    INNER   JOIN tbProducto P ON C.ConsecutivoProducto = P.ConsecutivoProducto
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

    
    /*3*/
    UPDATE 	tbProducto P
    INNER 	JOIN tbCarrito C ON C.ConsecutivoProducto = P.ConsecutivoProducto
    SET		P.Cantidad = P.Cantidad - C.Cantidad
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;
    
    
	/*4*/
    DELETE 	FROM	tbCarrito
    WHERE	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCarrito`(
    pConsecutivoProducto INT,
    pConsecutivoUsuario INT,
    pCantidad INT
)
BEGIN

	DECLARE vConsecutivoCarrito INT;
    SELECT 	ConsecutivoCarrito INTO vConsecutivoCarrito
    FROM 	tbCarrito
    WHERE 	ConsecutivoUsuario = pConsecutivoUsuario
		AND ConsecutivoProducto = pConsecutivoProducto;
        
	IF vConsecutivoCarrito IS NOT NULL THEN
    
		UPDATE 	tbcarrito
		SET 	Fecha = NOW(),
				Cantidad = pCantidad
		WHERE 	ConsecutivoUsuario = pConsecutivoUsuario
		AND ConsecutivoProducto = pConsecutivoProducto;
    
    ELSE

		INSERT INTO tbcarrito(ConsecutivoProducto,ConsecutivoUsuario,Fecha,Cantidad)
		VALUES (pConsecutivoProducto,pConsecutivoUsuario,NOW(),pCantidad);

	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarError` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarError`(
	pMensaje varchar(8000)
)
BEGIN

	INSERT INTO tberror (Mensaje,FechaHora)
	VALUES (pMensaje, NOW());

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RemoverProductoCarrito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RemoverProductoCarrito`(
    pConsecutivoProducto INT,
    pConsecutivoUsuario INT
)
BEGIN
      
	DELETE FROM tbcarrito
    WHERE 	ConsecutivoProducto = pConsecutivoProducto
		AND	ConsecutivoUsuario = pConsecutivoUsuario;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCorreo`(
    pCorreoElectronico varchar(100)
)
BEGIN

	SELECT 	ConsecutivoUsuario,
			Identificacion,
			Nombre,
			CorreoElectronico,
			Contrasenna,
			Estado,
			ConsecutivoPerfil
	FROM 	tbusuario
    WHERE 	CorreoElectronico = pCorreoElectronico
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarCuenta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCuenta`(
    pCorreoElectronico varchar(100), 
    pContrasenna varchar(10)
)
BEGIN

	SELECT 	U.ConsecutivoUsuario,
			U.Identificacion,
			U.Nombre,
			U.CorreoElectronico,
			U.Contrasenna,
			U.Estado,
			U.ConsecutivoPerfil,
            P.Nombre 'NombrePerfil'
	FROM 	tbusuario U
    INNER 	JOIN tbperfil P ON U.ConsecutivoPerfil = P.ConsecutivoPerfil
    WHERE 	CorreoElectronico = pCorreoElectronico
		AND Contrasenna = pContrasenna
        AND Estado = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-10 20:43:50
