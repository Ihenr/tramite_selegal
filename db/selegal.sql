/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100137 (10.1.37-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : selegal

 Target Server Type    : MySQL
 Target Server Version : 100137 (10.1.37-MariaDB)
 File Encoding         : 65001

 Date: 14/05/2024 22:13:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for abono
-- ----------------------------
DROP TABLE IF EXISTS `abono`;
CREATE TABLE `abono`  (
  `id_abono` int NOT NULL AUTO_INCREMENT,
  `abono_fecha` date NOT NULL,
  `abono_cantidad` float NOT NULL,
  `id_proceso` int NOT NULL,
  PRIMARY KEY (`id_abono`) USING BTREE,
  INDEX `abono_ibfk_1`(`id_proceso` ASC) USING BTREE,
  CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`proceso_cod`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of abono
-- ----------------------------

-- ----------------------------
-- Table structure for gastos_extras
-- ----------------------------
DROP TABLE IF EXISTS `gastos_extras`;
CREATE TABLE `gastos_extras`  (
  `id_gastosextras` int NOT NULL AUTO_INCREMENT,
  `extras_fechacreacion` date NOT NULL,
  `extras_cantidad` float NOT NULL,
  `id_proceso` int NULL DEFAULT NULL,
  `extra_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_gastosextras`) USING BTREE,
  INDEX `gastos_ibfk_1`(`id_proceso` ASC) USING BTREE,
  CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`proceso_cod`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of gastos_extras
-- ----------------------------
INSERT INTO `gastos_extras` VALUES (1, '2024-05-06', 50, 2, 'Otros');

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion`  (
  `id_institucion` int NOT NULL AUTO_INCREMENT,
  `inst_nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre de la institucion',
  `institucion_fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha del registro de la institucion',
  `id_subinstitucion` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_institucion`) USING BTREE,
  UNIQUE INDEX `unico`(`inst_nombre` ASC) USING BTREE,
  INDEX `subinstitucion_ibfk_1`(`id_subinstitucion` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of institucion
-- ----------------------------
INSERT INTO `institucion` VALUES (1, 'PENAL ', '2024-04-28 13:59:19', NULL);
INSERT INTO `institucion` VALUES (2, 'CIVIL', '2024-04-28 14:00:06', NULL);
INSERT INTO `institucion` VALUES (3, 'TRANSITO', '2024-04-28 14:00:18', NULL);
INSERT INTO `institucion` VALUES (4, 'HOME INMOBILIARIA', '2024-04-28 15:16:56', NULL);
INSERT INTO `institucion` VALUES (5, 'LABORAL', '2024-04-28 15:18:55', NULL);
INSERT INTO `institucion` VALUES (6, 'FAMILIA', '2024-04-28 15:24:40', NULL);
INSERT INTO `institucion` VALUES (7, 'CONSTITUCIONAL', '2024-04-30 14:51:07', NULL);

-- ----------------------------
-- Table structure for proceso
-- ----------------------------
DROP TABLE IF EXISTS `proceso`;
CREATE TABLE `proceso`  (
  `proceso_cod` int NOT NULL AUTO_INCREMENT,
  `pro_institucion` int NOT NULL,
  `pro_fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pro_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ACTIVO',
  `pro_numproceso` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pro_tipoinfraccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pro_cliente` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pro_estadoproceso` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pro_costototal` float NULL DEFAULT NULL,
  `pro_abono` float NULL DEFAULT NULL,
  `pro_extras` float NULL DEFAULT NULL,
  `usu_id` int NOT NULL,
  `pro_subinstitucion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`proceso_cod`) USING BTREE,
  INDEX `pro_institucion`(`pro_institucion` ASC) USING BTREE,
  INDEX `usuario_ibfk_2`(`usu_id` ASC) USING BTREE,
  INDEX `id_gastosextras`(`pro_subinstitucion` ASC) USING BTREE,
  CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`pro_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci COMMENT = 'Entidad Area' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of proceso
-- ----------------------------
INSERT INTO `proceso` VALUES (2, 6, '2024-05-06 16:23:11', 'INACTIVO', '06101-2023.02724', 'Autorización de Venta de Bienes de Niñas, Niños y Adolescentes y de Personas Sometidas a Guarda', 'Edison Marcelo Rodriguez Peñafiel', 'Audiencia', 350, 350, 50, 1, '');
INSERT INTO `proceso` VALUES (3, 1, '2024-05-14 13:22:19', 'ACTIVO', '7345632536', 'Trafico ', 'Henry Ismael Morocho Guaman', 'En Ejecucion Inicial ', 400, 50, 0, 1, '');

-- ----------------------------
-- Table structure for recordatorio
-- ----------------------------
DROP TABLE IF EXISTS `recordatorio`;
CREATE TABLE `recordatorio`  (
  `id_recordatorio` int NOT NULL AUTO_INCREMENT,
  `rec_fechacreacion` date NULL DEFAULT NULL,
  `id_proceso` int NULL DEFAULT NULL,
  `rec_hora` time NULL DEFAULT NULL,
  PRIMARY KEY (`id_recordatorio`) USING BTREE,
  INDEX `recordatorio_ibfk_1`(`id_proceso` ASC) USING BTREE,
  CONSTRAINT `recordatorio_ibfk_1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`proceso_cod`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of recordatorio
-- ----------------------------
INSERT INTO `recordatorio` VALUES (1, '2024-05-15', 3, '13:25:00');

-- ----------------------------
-- Table structure for sub_institucion
-- ----------------------------
DROP TABLE IF EXISTS `sub_institucion`;
CREATE TABLE `sub_institucion`  (
  `id_subinstitucion` int NOT NULL AUTO_INCREMENT,
  `nombre_subinst` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_creacionsubinst` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_institucion` int NOT NULL,
  PRIMARY KEY (`id_subinstitucion`) USING BTREE,
  INDEX `subinstitucion_ibfk_1`(`id_institucion` ASC) USING BTREE,
  CONSTRAINT `subinstitucion_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id_institucion`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sub_institucion
-- ----------------------------
INSERT INTO `sub_institucion` VALUES (1, 'Municipio', '2024-04-30 14:47:04', 4);
INSERT INTO `sub_institucion` VALUES (2, 'Registro de la propiedad', '2024-04-30 14:47:51', 4);
INSERT INTO `sub_institucion` VALUES (3, 'Notaría', '2024-04-30 14:48:10', 4);

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_usuario` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT '',
  `usu_contra` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `usu_feccreacion` date NULL DEFAULT NULL,
  `usu_estatus` enum('ACTIVO','INACTIVO') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'ACTIVO',
  `proceso_id` int NULL DEFAULT NULL,
  `usu_nombres` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidos` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_nrodocumento` char(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_email` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usu_rol` enum('Secretario','Administrador') CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT 'Secretario',
  PRIMARY KEY (`usu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'admin', '$2y$12$I1SPKUIbuaRT5DpxJ5OeoOZ5yezN499iMw0f2m9gIt5KtjDYr8ri6', '2022-06-22', 'ACTIVO', 1, 'Henry Ismael ', 'Morocho Guaman', '0605849389', 'morocho@gmail.com', 'Administrador');
INSERT INTO `usuario` VALUES (5, 'nuevo', '$2y$12$Sh4dNxr6mVo1CYiqzxb8temTyvGRKSSaHGibzucAzTU.k1mioSgo2', '2024-04-29', 'ACTIVO', NULL, 'Nuevo Nombre', 'Nuevo Hola', '0605849367', 'nuevo78@gmail.com', 'Secretario');

-- ----------------------------
-- Procedure structure for CALL SP_REGISTRAR_ABONO
-- ----------------------------
DROP PROCEDURE IF EXISTS `CALL SP_REGISTRAR_ABONO`;
delimiter ;;
CREATE PROCEDURE `CALL SP_REGISTRAR_ABONO`(IN `ID` INT, IN `ABONO` FLOAT)
BEGIN
		INSERT INTO abono(abono_fecha,abono_cantidad,id_proceso) VALUES(NOW(),ABONO,ID);
		SELECT 1;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_CARGAR_SELECT_INSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_CARGAR_SELECT_INSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_CARGAR_SELECT_INSTITUCION`()
SELECT
	institucion.id_institucion, 
	institucion.inst_nombre, 
	institucion.institucion_fecha_registro
FROM
	institucion
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_CARGAR_SELECT_SUBINSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_CARGAR_SELECT_SUBINSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_CARGAR_SELECT_SUBINSTITUCION`()
SELECT
	sub_institucion.id_subinstitucion, 
	sub_institucion.nombre_subinst, 
	sub_institucion.fecha_creacionsubinst, 
	sub_institucion.id_institucion
FROM
	sub_institucion
		WHERE 	sub_institucion.id_institucion=4
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_ABONO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_ABONO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_ABONO`(IN `ID` CHAR(11))
SELECT
	abono.id_abono, 
	abono.abono_fecha, 
	abono.abono_cantidad, 
	abono.id_proceso
FROM
	abono
	where 	abono.id_proceso=ID
		ORDER BY
	abono.abono_fecha DESC
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_DATOS_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_DATOS_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_DATOS_USUARIO`(IN `ID` CHAR(11))
SELECT
  usuario.usu_id,
	usuario.usu_usuario, 
	usuario.usu_rol, 
	CONCAT_WS(' ',LEFT(usu_nombres,LOCATE(' ',usu_nombres)),usu_apellidos) AS usu, 
	CONCAT_WS(' ',usu_nombres,usu_apellidos) AS nombre, 
	usuario.usu_nombres, 
	usuario.usu_apellidos, 
	 CONCAT_WS(' ', LEFT(usu_nombres, LOCATE(' ', usu_nombres)), LEFT(usu_apellidos, LOCATE(' ', usu_apellidos))) AS Nom_ape,
	usuario.usu_nrodocumento, 
	 
	usuario.usu_email
FROM
	usuario
	
		WHERE usuario.usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_EXTRA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_EXTRA`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_EXTRA`(IN `ID` CHAR(11))
SELECT
	gastos_extras.id_gastosextras, 
	gastos_extras.extras_fechacreacion, 
	gastos_extras.extras_cantidad, 
	gastos_extras.id_proceso, 
	gastos_extras.extra_descripcion
FROM
	gastos_extras
	WHERE 	gastos_extras.id_proceso=ID
		ORDER BY
	     gastos_extras.extras_fechacreacion DESC
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_INSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_INSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_INSTITUCION`()
SELECT
	institucion.id_institucion, 
	institucion.inst_nombre, 
	institucion.institucion_fecha_registro
FROM
	institucion
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_PROCESO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROCESO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROCESO`()
SELECT
	proceso.proceso_cod, 
	proceso.pro_institucion, 
	proceso.pro_fecha_registro, 
	proceso.pro_estado, 
	proceso.pro_numproceso, 
	proceso.pro_tipoinfraccion, 
	proceso.pro_cliente, 
	proceso.pro_estadoproceso, 
	proceso.pro_costototal, 
	institucion.inst_nombre, 
	proceso.pro_abono, 
	proceso.pro_extras,
	proceso.pro_subinstitucion
FROM
	proceso
	INNER JOIN
	institucion
	ON 
		proceso.pro_institucion = institucion.id_institucion
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_PROCESO_ACTIVO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROCESO_ACTIVO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROCESO_ACTIVO`()
SELECT
	proceso.proceso_cod, 
	proceso.pro_institucion, 
	proceso.pro_fecha_registro, 
	proceso.pro_estado, 
	proceso.pro_numproceso, 
	proceso.pro_tipoinfraccion, 
	proceso.pro_cliente, 
	proceso.pro_estadoproceso, 
	proceso.pro_costototal, 
	institucion.inst_nombre, 
  proceso.pro_abono, 
	proceso.pro_extras,
	proceso.pro_subinstitucion
FROM
	proceso
	INNER JOIN
	institucion
	ON 
		proceso.pro_institucion = institucion.id_institucion
	WHERE proceso.pro_estado='ACTIVO'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_PROCESO_FINALIZADOS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROCESO_FINALIZADOS`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROCESO_FINALIZADOS`()
SELECT
	proceso.proceso_cod, 
	proceso.pro_institucion, 
	proceso.pro_fecha_registro, 
	proceso.pro_estado, 
	proceso.pro_numproceso, 
	proceso.pro_tipoinfraccion, 
	proceso.pro_cliente, 
	proceso.pro_estadoproceso, 
	proceso.pro_costototal, 
	institucion.inst_nombre, 
	proceso.pro_abono, 
	proceso.pro_extras,
	proceso.pro_subinstitucion
FROM
	proceso
	INNER JOIN
	institucion
	ON 
		proceso.pro_institucion = institucion.id_institucion
	WHERE proceso.pro_estado='INACTIVO'
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_PROCESO_INSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_PROCESO_INSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_PROCESO_INSTITUCION`(IN `ID` CHAR(11))
SELECT
	proceso.proceso_cod, 
	proceso.pro_institucion, 
	proceso.pro_fecha_registro, 
	proceso.pro_estado, 
	proceso.pro_numproceso, 
	proceso.pro_tipoinfraccion, 
	proceso.pro_cliente, 
	proceso.pro_estadoproceso, 
	proceso.pro_costototal, 
	institucion.inst_nombre, 
  proceso.pro_abono, 
	proceso.pro_extras,
	proceso.pro_subinstitucion
FROM
	proceso
	INNER JOIN
	institucion
	ON 
		proceso.pro_institucion = institucion.id_institucion
	WHERE proceso.pro_institucion =ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_RECORDATORIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_RECORDATORIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_RECORDATORIO`()
SELECT
	proceso.proceso_cod, 
	proceso.pro_institucion, 
	proceso.pro_cliente, 
	recordatorio.id_recordatorio, 
	recordatorio.rec_fechacreacion, 
	recordatorio.id_proceso, 
	recordatorio.rec_hora, 
	institucion.inst_nombre
FROM
	proceso
	INNER JOIN
	recordatorio
	ON 
		proceso.proceso_cod = recordatorio.id_proceso
	INNER JOIN
	institucion
	ON 
		proceso.pro_institucion = institucion.id_institucion
WHERE
	recordatorio.rec_fechacreacion > CURDATE() OR
	(
		recordatorio.rec_fechacreacion = CURDATE() AND
		recordatorio.rec_hora > CURTIME()
	)
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_LISTAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_LISTAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_LISTAR_USUARIO`()
SELECT
	usu_id, 
	usu_usuario, 
	usu_feccreacion, 
	usu_estatus, 
	usu_nombres, 
	usu_apellidos, 
	CONCAT_WS(' ',usuario.usu_nombres,usuario.usu_apellidos) AS nusuario, 
	usu_nrodocumento, 
	usu_email, 
	usu_rol
FROM
	usuario
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_DATOS_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_DATOS_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_DATOS_USUARIO`(IN `ID` INT, IN `NOMBRE` VARCHAR(200), IN `APELLIDOS` VARCHAR(200), IN `NDOCUMENTO` CHAR(10), IN `EMAIL` VARCHAR(80))
UPDATE usuario SET 
     usu_nombres=NOMBRE,
		 usu_apellidos=APELLIDOS,
		 usu_nrodocumento=NDOCUMENTO,
		 usu_email=EMAIL
WHERE usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_INSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_INSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_INSTITUCION`(IN `ID` INT, IN `NINSTITUCION` VARCHAR(255))
BEGIN
DECLARE TIPOACTUAL VARCHAR(255);
DECLARE CANTIDAD INT;
SET @TIPOACTUAL:=(SELECT inst_nombre FROM institucion WHERE id_institucion=ID);
IF @TIPOACTUAL = NINSTITUCION THEN
		UPDATE institucion SET 
		inst_nombre=NINSTITUCION
		WHERE id_institucion=ID;
		SELECT 1;
ELSE
		SET @CANTIDAD:=(SELECT COUNT(*) FROM institucion WHERE inst_nombre=NINSTITUCION);
		IF @CANTIDAD = 0 THEN
		  UPDATE institucion SET 
		  inst_nombre=NINSTITUCION
		  WHERE id_institucion=ID;
			SELECT 1;
		ELSE
		  SELECT 2;
		END IF;

END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_PROCESO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_PROCESO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_PROCESO`(IN `ID` INT, 
    IN `NESTADO` VARCHAR(255),
		IN  `ABONO` FLOAT,
		IN  `EXTRA` FLOAT,
    IN `ESTATUS` VARCHAR(20))
BEGIN
UPDATE proceso 
    SET
        pro_estadoproceso =NESTADO,
        pro_abono = ABONO,
				pro_extras = EXTRA,
				pro_estado = ESTATUS
    WHERE proceso_cod = ID;
 SELECT 1; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO`(IN `ID` INT, IN `USUARIO` VARCHAR(255), IN `ROL` VARCHAR(25), IN `NDOCUMENTO` CHAR(10), IN `NOMBRE` VARCHAR(200), IN `APEPAT` VARCHAR(200),  IN `EMAIL` VARCHAR(80))
BEGIN
DECLARE USUACTUAL VARCHAR(255);
DECLARE CANTIDAD INT;
SET @USUACTUAL:=(SELECT usu_usuario from usuario where usu_id=ID);
IF @USUACTUAL = USUARIO   THEN
	UPDATE usuario SET
		usu_usuario=USUARIO,
		
		usu_rol=ROL,
		usu_nrodocumento=NDOCUMENTO,
		usu_nombres=NOMBRE,
		usu_apellidos=APEPAT,
		usu_email=EMAIL
	where usu_id=ID;
		SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) from usuario where usu_usuario=USUARIO);
		IF  @CANTIDAD = 0  THEN
			UPDATE usuario SET
			usu_usuario=USUARIO,
			usu_rol=ROL,
			usu_nrodocumento=NDOCUMENTO,
			usu_nombres=NOMBRE,
			usu_apellidos=APEPAT,
			usu_email=EMAIL
			where usu_id=ID;
				SELECT 1;
		ELSE
			SELECT 2;
		END IF;
END IF;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_USUARIO_CONTRA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO_CONTRA`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO_CONTRA`(IN `ID` INT, IN `CONTRA` VARCHAR(255))
UPDATE usuario SET 
	usu_contra=CONTRA
WHERE usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_USUARIO_ESTATUS
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO_ESTATUS`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO_ESTATUS`(IN `ID` INT, IN `ESTATUS` VARCHAR(20))
UPDATE usuario SET 
	usu_estatus=ESTATUS
WHERE usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_MODIFICAR_USUARIO_USU
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_MODIFICAR_USUARIO_USU`;
delimiter ;;
CREATE PROCEDURE `SP_MODIFICAR_USUARIO_USU`(IN `ID` INT, IN `USU` VARCHAR(250))
UPDATE usuario SET 
  usu_usuario=USU 
WHERE usu_id=ID
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_ABONO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_ABONO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_ABONO`(IN `ID` INT, IN `ABONO` FLOAT)
BEGIN
 
		INSERT INTO abono(abono_fecha,abono_cantidad,id_proceso) VALUES(NOW(),ABONO,ID);
		SELECT 1;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_FECHA
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_FECHA`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_FECHA`(IN `ID` INT, IN `FECHA` DATE, IN `HORA` TIME)
BEGIN
		INSERT INTO recordatorio(
		rec_fechacreacion,
		id_proceso,
		rec_hora) 
		VALUES(
		FECHA,
		ID, 
		HORA);
		SELECT 1;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_GASTO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_GASTO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_GASTO`(IN `ID` INT, IN `GASTO` FLOAT, IN `GASTODES` VARCHAR(255))
BEGIN
		INSERT INTO gastos_extras(
		extras_fechacreacion,
		extras_cantidad,
		id_proceso,
		extra_descripcion) 
		VALUES(
		NOW(),
		GASTO,
		ID, 
		GASTODES);
		SELECT 1;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_INSTITUCION
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_INSTITUCION`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_INSTITUCION`(IN `NINSTITUCION` VARCHAR(255))
BEGIN
 DECLARE CANTIDAD INT;
 SET @CANTIDAD:=(SELECT COUNT(*) FROM institucion WHERE inst_nombre=NINSTITUCION);
 IF @CANTIDAD = 0 THEN
		INSERT INTO institucion(inst_nombre,institucion_fecha_registro) VALUES(NINSTITUCION,NOW());
		SELECT 1;
 ELSE
    SELECT 2;
 END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_PROCESO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_PROCESO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_PROCESO`(IN `NINSTITUCION` INT, IN `NUMPROCESO` VARCHAR(255), IN `INFRACCION` VARCHAR(255), IN `NCLIENTE` VARCHAR(255), IN `ESTADOPROCESO` VARCHAR(255), IN `CTOTAL` FLOAT, IN `ABONO` FLOAT,IN `IDUSU` INT, IN `SUBINST` VARCHAR(50))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM proceso WHERE pro_numproceso=NUMPROCESO);

IF @CANTIDAD = 0 THEN
   INSERT INTO proceso(pro_institucion,pro_fecha_registro,pro_estado,pro_numproceso,pro_tipoinfraccion,pro_cliente,pro_estadoproceso,pro_costototal,pro_abono,pro_extras, usu_id, pro_subinstitucion) VALUES(NINSTITUCION,NOW(),'ACTIVO',NUMPROCESO,INFRACCION,NCLIENTE,ESTADOPROCESO,CTOTAL,ABONO,0,IDUSU,SUBINST  );
	 SELECT 1;

ELSE
   SELECT 2;

END IF;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_REGISTRAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_REGISTRAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_REGISTRAR_USUARIO`(IN `USU` VARCHAR(250), IN `CONTRA` VARCHAR(255), IN `ROL` VARCHAR(25), IN `NDOCUMENTO` CHAR(10), IN `NOMBRE` VARCHAR(200), IN `APEPAT` VARCHAR(200), IN `EMAIL` VARCHAR(80))
BEGIN
DECLARE CANTIDAD INT;
DECLARE CANTIDAD2 INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM usuario where usu_usuario=USU);
SET @CANTIDAD2:=(SELECT COUNT(*) FROM usuario WHERE usu_nrodocumento=NDOCUMENTO);
IF @CANTIDAD = 0 AND @CANTIDAD2 = 0 THEN
	
	INSERT INTO usuario(
	    usu_usuario,
			usu_contra,
			usu_rol,
			usu_feccreacion,
			usu_estatus,
			usu_nrodocumento,
			usu_nombres,
			usu_apellidos,
			usu_email) 
	VALUES(
	USU,
	CONTRA,
	ROL,
	CURDATE(),
	'ACTIVO',
	NDOCUMENTO,
	NOMBRE,
	APEPAT,
	EMAIL);
	SELECT 1;

ELSE

SELECT 2;
END IF;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for SP_VERIFICAR_USUARIO
-- ----------------------------
DROP PROCEDURE IF EXISTS `SP_VERIFICAR_USUARIO`;
delimiter ;;
CREATE PROCEDURE `SP_VERIFICAR_USUARIO`(IN `USU` VARCHAR(255))
SELECT
	usuario.usu_id, 
	usuario.usu_usuario, 
	usuario.usu_contra,  
	usuario.usu_feccreacion, 
	usuario.usu_estatus, 
	usuario.proceso_id, 
	usuario.usu_apellidos, 
	usuario.usu_nombres, 
	usuario.usu_nrodocumento, 
	usuario.usu_email, 
	usuario.usu_rol
FROM
	usuario
	WHERE usuario.usu_usuario = BINARY USU
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
