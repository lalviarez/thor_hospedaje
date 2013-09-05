CREATE TABLE IF NOT EXISTS `#__th_reservations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de reservacion',
  `th_asset_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Id de la posada/hotel asociado a la reservacion',
  `checkin` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Fecha de entrada',
  `checkout` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Fecha de salida',
  `client_data` text COMMENT 'Datos del cliente que reserva',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `#__th_reservations_rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id de reservacion-habitacion',
  `reservation_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Id de reservacion',
  `room_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Id de habitacion',
  `room_number` text COMMENT 'Numero/nombre/identificacion de la habitacion',
  `number_adult` int(10) unsigned COMMENT 'Numero de adultos',
  `number_children` int(10) unsigned COMMENT 'Numero de niños',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
