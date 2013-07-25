DROP TABLE IF EXISTS `#__th_countries`;
CREATE TABLE IF NOT EXISTS `#__th_countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de pais',
  `country` varchar(50) NOT NULL COMMENT 'Nombre del pais',
  `country_desc` text COMMENT 'Descripcion del pais',
  `image` text COMMENT 'Imagen del pais',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de creacion',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Autor del registro',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de modificacion del registro',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'id del usuario que modifico el registro por ultima vez',
  `state` tinyint(11) NOT NULL DEFAULT '0' COMMENT 'Estado de publicacion',
  `access` int(11) NOT NULL DEFAULT '1',
  `language` varchar(7) NOT NULL DEFAULT '' COMMENT 'Lenguaje del pais registrado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
