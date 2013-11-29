<?php
/**
 * @version		$Id: default_address.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$array_countries_es = array('AF'=>'Afganistán',
					  'AL'=>'Albania', 
                      'DE'=>'Alemania', 
                      'AD'=>'Andorra', 
                      'AO'=>'Angola', 
                      'AI'=>'Anguilla', 
                      'AQ'=>'Antártida', 
                      'AG'=>'Antigua y Barbuda', 
                      'AN'=>'Antillas Holandesas', 
                      'SA'=>'Arabia Saudí', 
                      'DZ'=>'Argelia', 
                      'AR'=>'Argentina', 
                      'AM'=>'Armenia', 
                      'AW'=>'Aruba', 
                      'AU'=>'Australia', 
                      'AT'=>'Austria',  
                      'AZ'=>'Azerbaiyán',  
                      'BS'=>'Bahamas',  
                      'BH'=>'Bahrein',  
                      'BD'=>'Bangladesh',  
                      'BB'=>'Barbados',  
                      'BE'=>'Bélgica',  
                      'BZ'=>'Belice',  
                      'BJ'=>'Benin',  
                      'BM'=>'Bermudas',  
                      'BY'=>'Bielorrusia',  
                      'MM'=>'Birmania',  
                      'BO'=>'Bolivia',  
                      'BA'=>'Bosnia y Herzegovina',  
                      'BW'=>'Botswana',  
                      'BR'=>'Brasil',  
                      'BN'=>'Brunei',  
                      'BG'=>'Bulgaria',  
                      'BF'=>'Burkina Faso',  
                      'BI'=>'Burundi',  
                      'BT'=>'Bután',  
                      'CV'=>'Cabo Verde',  
                      'KH'=>'Camboya',  
                      'CM'=>'Camerún',  
                      'CA'=>'Canadá',  
                      'TD'=>'Chad',  
                      'CL'=>'Chile',  
                      'CN'=>'China',  
                      'CY'=>'Chipre',  
                      'VA'=>'Ciudad del Vaticano (Santa Sede)',  
                      'CO'=>'Colombia',  
                      'KM'=>'Comores',  
                      'CG'=>'Congo',  
                      'CD'=>'Congo, República Democrática del',  
                      'KR'=>'Corea',  
                      'KP'=>'Corea del Norte',  
                      'CI'=>'Costa de Marfíl',  
                      'CR'=>'Costa Rica',  
                      'HR'=>'Croacia (Hrvatska)',  
                      'CU'=>'Cuba',  
                      'DK'=>'Dinamarca',  
                      'DJ'=>'Djibouti',  
                      'DM'=>'Dominica',  
                      'EC'=>'Ecuador',  
                      'EG'=>'Egipto',  
                      'SV'=>'El Salvador',  
                      'AE'=>'Emiratos Árabes Unidos',  
                      'ER'=>'Eritrea',  
                      'SI'=>'Eslovenia',  
                      'ES'=>'España',  
                      'US'=>'Estados Unidos',  
                      'EE'=>'Estonia',  
                      'ET'=>'Etiopía',  
                      'FJ'=>'Fiji',  
                      'PH'=>'Filipinas',  
                      'FI'=>'Finlandia',  
                      'FR'=>'Francia',  
                      'GA'=>'Gabón',  
                      'GM'=>'Gambia',  
                      'GE'=>'Georgia',  
                      'GH'=>'Ghana',  
                      'GI'=>'Gibraltar',  
                      'GD'=>'Granada',  
                      'GR'=>'Grecia',  
                      'GL'=>'Groenlandia',  
                      'GP'=>'Guadalupe',  
                      'GU'=>'Guam',  
                      'GT'=>'Guatemala',  
                      'GY'=>'Guayana',  
                      'GF'=>'Guayana Francesa',  
                      'GN'=>'Guinea',  
                      'GQ'=>'Guinea Ecuatorial',  
                      'GW'=>'Guinea-Bissau',  
                      'HT'=>'Haití',  
                      'HN'=>'Honduras',  
                      'HU'=>'Hungría',  
                      'IN'=>'India',  
                      'ID'=>'Indonesia',  
                      'IQ'=>'Irak',  
                      'IR'=>'Irán',  
                      'IE'=>'Irlanda',  
                      'BV'=>'Isla Bouvet',  
                      'CX'=>'Isla de Christmas',  
                      'IS'=>'Islandia',  
                      'KY'=>'Islas Caimán',  
                      'CK'=>'Islas Cook',  
                      'CC'=>'Islas de Cocos o Keeling',  
                      'FO'=>'Islas Faroe',  
                      'HM'=>'Islas Heard y McDonald',  
                      'FK'=>'Islas Malvinas',  
                      'MP'=>'Islas Marianas del Norte',  
                      'MH'=>'Islas Marshall',  
                      'UM'=>'Islas menores de Estados Unidos',  
                      'PW'=>'Islas Palau',  
                      'SB'=>'Islas Salomón',  
                      'SJ'=>'Islas Svalbard y Jan Mayen',  
                      'TK'=>'Islas Tokelau',  
                      'TC'=>'Islas Turks y Caicos',  
                      'VI'=>'Islas Vírgenes (EE.UU.)',  
                      'VG'=>'Islas Vírgenes (Reino Unido)',  
                      'WF'=>'Islas Wallis y Futuna',  
                      'IL'=>'Israel',  
                      'IT'=>'Italia',  
                      'JM'=>'Jamaica',  
                      'JP'=>'Japón',  
                      'JO'=>'Jordania',  
                      'KZ'=>'Kazajistán',  
                      'KE'=>'Kenia',  
                      'KG'=>'Kirguizistán',  
                      'KI'=>'Kiribati',  
                      'KW'=>'Kuwait',  
                      'LA'=>'Laos',  
                      'LS'=>'Lesotho',  
                      'LV'=>'Letonia',  
                      'LB'=>'Líbano',  
                      'LR'=>'Liberia',  
                      'LY'=>'Libia',  
                      'LI'=>'Liechtenstein',  
                      'LT'=>'Lituania',  
                      'LU'=>'Luxemburgo',  
                      'MK'=>'Macedonia, Ex-República Yugoslava de',  
                      'MG'=>'Madagascar',  
                      'MY'=>'Malasia',  
                      'MW'=>'Malawi',  
                      'MV'=>'Maldivas',  
                      'ML'=>'Malí',  
                      'MT'=>'Malta',  
                      'MA'=>'Marruecos',  
                      'MQ'=>'Martinica',  
                      'MU'=>'Mauricio', 
                      'MR'=>'Mauritania',  
                      'YT'=>'Mayotte',  
                      'MX'=>'México',  
                      'FM'=>'Micronesia',  
                      'MD'=>'Moldavia',  
                      'MC'=>'Mónaco',  
                      'MN'=>'Mongolia',  
                      'MS'=>'Montserrat',  
                      'MZ'=>'Mozambique',  
                      'NA'=>'Namibia',  
                      'NR'=>'Nauru',  
                      'NP'=>'Nepal',  
                      'NI'=>'Nicaragua',  
                      'NE'=>'Níger',  
                      'NG'=>'Nigeria',  
                      'NU'=>'Niue',  
                      'NF'=>'Norfolk',  
                      'NO'=>'Noruega',  
                      'NC'=>'Nueva Caledonia',  
                      'NZ'=>'Nueva Zelanda',  
                      'OM'=>'Omán',  
                      'NL'=>'Países Bajos',  
                      'PA'=>'Panamá',  
                      'PG'=>'Papúa Nueva Guinea',  
                      'PK'=>'Paquistán',  
                      'PY'=>'Paraguay',  
                      'PE'=>'Perú',  
                      'PN'=>'Pitcairn',  
                      'PF'=>'Polinesia Francesa',  
                      'PL'=>'Polonia',  
                      'PT'=>'Portugal',  
                      'PR'=>'Puerto Rico',  
                      'QA'=>'Qatar',  
                      'UK'=>'Reino Unido',  
                      'CF'=>'República Centroafricana',  
                      'CZ'=>'República Checa',  
                      'ZA'=>'República de Sudáfrica',  
                      'DO'=>'República Dominicana',  
                      'SK'=>'República Eslovaca',  
                      'RE'=>'Reunión',  
                      'RW'=>'Ruanda',  
                      'RO'=>'Rumania',  
                      'RU'=>'Rusia',  
                      'EH'=>'Sahara Occidental',  
                      'KN'=>'Saint Kitts y Nevis',  
                      'WS'=>'Samoa',  
                      'AS'=>'Samoa Americana',  
                      'SM'=>'San Marino',  
                      'VC'=>'San Vicente y Granadinas',  
                      'SH'=>'Santa Helena',  
                      'LC'=>'Santa Lucía',  
                      'ST'=>'Santo Tomé y Príncipe',  
                      'SN'=>'Senegal',  
                      'SC'=>'Seychelles',  
                      'SL'=>'Sierra Leona',  
                      'SG'=>'Singapur',  
                      'SY'=>'Siria',  
                      'SO'=>'Somalia',  
                      'LK'=>'Sri Lanka',  
                      'PM'=>'St. Pierre y Miquelon',  
                      'SZ'=>'Suazilandia',  
                      'SD'=>'Sudán',  
                      'SE'=>'Suecia',  
                      'CH'=>'Suiza',  
                      'SR'=>'Surinam',  
                      'TH'=>'Tailandia',  
                      'TW'=>'Taiwán',  
                      'TZ'=>'Tanzania',  
                      'TJ'=>'Tayikistán',  
                      'TF'=>'Territorios franceses del Sur',  
                      'TP'=>'Timor Oriental',  
                      'TG'=>'Togo',  
                      'TO'=>'Tonga',  
                      'TT'=>'Trinidad y Tobago',  
                      'TN'=>'Túnez',  
                      'TM'=>'Turkmenistán',  
                      'TR'=>'Turquía',
                      'TV'=>'Tuvalu',  
                      'UA'=>'Ucrania',  
                      'UG'=>'Uganda',  
                      'UY'=>'Uruguay',  
                      'UZ'=>'Uzbekistán',  
                      'VU'=>'Vanuatu',  
                      'VE'=>'Venezuela',  
                      'VN'=>'Vietnam',  
                      'YE'=>'Yemen',  
                      'YU'=>'Yugoslavia',  
                      'ZM'=>'Zambia',  
                      'ZW'=>'Zimbabue');
?>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_ADDRESS_ASSET'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
	<div class="span6">
	<div class="control-label"><label title="" for="asset-country"><?php echo JText::_('TH_POSADERO_ASSET_COUNTRY_LABEL'); ?></label></div>
	<div class="controls">
		<div class="input-append">
			<select name="asset-country" id="asset-country">
				<option value=""><?php echo JText::_('TH_POSADERO_ASSET_COUNTRY_SELECT'); ?></option>
				<?php
				foreach($array_countries_es as $key => $value):						
				?>
				<option value="<?php echo $value;?>"><?php echo $value;?></option>
				<?php
				endforeach;
				?>
			</select>
		</div>
	</div>
	</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="asset-city"><?php echo JText::_('TH_POSADERO_ASSET_CITY_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_CITY_LABEL'); ?>" value="" id="asset-city" name="jform[asset-city]" title="">					
				</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="asset-state"><?php echo JText::_('TH_POSADERO_ASSET_STATE_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_STATE_LABEL'); ?>" value="" id="asset-state" name="jform[asset-state]" title="">					
				</div>
			</div>
		</div>

		<div class="span6">
			<div class="control-label"><label title="" for="asset-zip"><?php echo JText::_('TH_POSADERO_ASSET_ZIP_LABEL'); ?></label></div>
			<div class="controls">
				<div class="input-append">
					<input type="text" class="input-small" size="10" placeholder="<?php echo JText::_('TH_POSADERO_ASSET_ZIP_LABEL'); ?>" value="" id="asset-zip" name="jform[asset-zip]" title="">					
				</div>
			</div>
		</div>
	</div>
</div>
