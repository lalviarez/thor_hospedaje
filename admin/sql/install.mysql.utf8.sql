DROP TABLE IF EXISTS `#__th_countries`;
DROP TABLE IF EXISTS `#__th_states`;
DROP TABLE IF EXISTS `#__th_assets`;
CREATE TABLE IF NOT EXISTS `#__th_countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de pais',
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
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
  `ordering` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Orden de los registros',
  `params` text NOT NULL DEFAULT '' COMMENT "Parametros de configuracion",
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__th_states` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de estado',
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `country_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Id del pais asociado al estado',
  `state_name` varchar(50) NOT NULL COMMENT 'Nombre del estado',
  `state_desc` text COMMENT 'Descripcion del estado',
  `image` text COMMENT 'Imagen del estado',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de creacion',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Autor del registro',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de modificacion del registro',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'id del usuario que modifico el registro por ultima vez',
  `state` tinyint(11) NOT NULL DEFAULT '0' COMMENT 'Estado de publicacion',
  `access` int(11) NOT NULL DEFAULT '1',
  `language` varchar(7) NOT NULL DEFAULT '' COMMENT 'Lenguaje del estado registrado',
  `ordering` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Orden de los registros',
  `params` text NOT NULL DEFAULT '' COMMENT "Parametros de configuracion",
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__th_assets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del bien ',
  `cid` int(11) unsigned NOT NULL DEFAULT '0',
  `state_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Id del estado asociado al bien',
  `asset_name` varchar(50) NOT NULL COMMENT 'Nombre del bien',
  `asset_desc` text COMMENT 'Descripcion del bien',
  `image` text COMMENT 'Imagenes del bien',
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de creacion',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Autor del registro',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha de modificacion del registro',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'id del usuario que modifico el registro por ultima vez',
  `state` tinyint(11) NOT NULL DEFAULT '0' COMMENT 'Estado de publicacion',
  `access` int(11) NOT NULL DEFAULT '1',
  `language` varchar(7) NOT NULL DEFAULT '' COMMENT 'Lenguaje del bien registrado',
  `ordering` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Orden de los registros',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
