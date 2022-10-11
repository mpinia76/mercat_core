############### 11/10/2022 ##############################

CREATE TABLE IF NOT EXISTS `mercat_persona` (
    `oid` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,

    `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `celular` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `domicilio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `observaciones` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `nroDocumento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `tipoDocumento` int(11) DEFAULT NULL,
    `sexo` int(11) DEFAULT NULL,
    `fechaNacimiento` date DEFAULT NULL,
    `discr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`oid`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



     