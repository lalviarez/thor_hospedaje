<?php
/**
 * @version		$Id: edit_assets.php 2013-09-02
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;
$array_prefijos_es = array ('93' => 'Afganistan',
				'355' => 'Albania',
				'213' => 'Argelia',
				'376' => 'Andorra',
				'244' => 'Angola',
				'1264' => 'Anguila',
				'1268' => 'Antigua y Barbuda'
				,'54' => 'Argentina',
				'374' => 'Armenia',
				'297' => 'Aruba',
				'61' => 'Australia',
				'43' => 'Austria',
				'994' => 'Azerbaiyan',
				'1242' => 'Bahamas',
				'973' => 'Bahrein',
				'880' => 'Bangladesh',
				'1246' => 'Barbados',
				'375' => 'Bielorrusia',
				'32' => 'Belgica',
				'501' => 'Belice',
				'229' => 'Benin',
				'1441' => 'Bermudas',
				'975' => 'Butan',
				'591' => 'Bolivia',
				'387' => 'Bosnia y Herzegovina',
				'267' => 'Botsuana',
				'55' => 'Brasil',
				'673' => 'Brunei',
				'359' => 'Bulgaria',
				'226' => 'Burkina Faso',
				'95' => 'Birmania',
				'257' => 'Burundi',
				'855' => 'Camboya',
				'237' => 'Camerun',
				'1' => 'Canada',
				'238' => 'Cabo-Verde',
				'1345' => 'Islas Caimán',
				'236' => 'Republica Centro Africana',
				'235' => 'Chad',
				'56' => 'Chile',
				'86' => 'China',
				'853' => 'Macao',
				'57' => 'Colombia',
				'269' => 'Comoras',
				'243' => 'Republica Democratica del Congo',
				'242' => 'Republica del Congo',
				'682' => 'Islas Cook',
				'506' => 'Costa Rica',
				'385' => 'Croacia',
				'53' => 'Cuba',
				'357' => 'Chipre',
				'420' => 'Republica Checa',
				'45' => 'Dinamarca',
				'298' => 'Islas Feroe',
				'246' => 'Diego Garcia',
				'253' => 'Yibuti',
				'1767' => 'Dominica',
				'1809' => 'Republica Dominicana',
				'593' => 'Ecuador',
				'20' => 'Egipto',
				'503' => 'El Salvador',
				'971' => 'Emiratos Arabes Unidos',
				'44' => 'Inglaterra',
				'240' => 'Guinea-Ecuatorial',
				'291' => 'Eritrea',
				'372' => 'Estonia',
				'251' => 'Etiopia',
				'1' => 'Estados Unidos de América',
				'500' => 'Islas Malvinas',
				'679' => 'Fiyi',
				'358' => 'Finlandia',
				'33' => 'Francia',
				'230' => 'Mauricio',
				'262' => 'Reunion',
				'687' => 'Nueva Caledonia',
				'241' => 'Gabon',
				'220' => 'Gambia',
				'995' => 'Georgia',
				'49' => 'Alemania',
				'233' => 'Ghana',
				'299' => 'Groenlandia',
				'350' => 'Gibraltar',
				'30' => 'Grecia',
				'1473' => 'Granada',
				'590' => 'Guadalupe',
				'502' => 'Guatemala',
				'224' => 'Guinea',
				'245' => 'Guinea Bissau',
				'592' => 'Guyana',
				'594' => 'Guayana Francesa',
				'509' => 'Haiti',
				'504' => 'Honduras',
				'852' => 'Hong Kong',
				'36' => 'Hungria',
				'247' => 'Isla-Ascension',
				'1670' => 'Islas Marianas',
				'91' => 'India',
				'62' => 'Indonesia',
				'98' => 'Iran',
				'964' => 'Iraq',
				'353' => 'Islandia',
				'61' => 'Isla Christmas',
				'972' => 'Israel',
				'39' => 'Italia',
				'225' => 'Costa de Marfil',
				'1876' => 'Jamaica',
				'81' => 'Japon',
				'962' => 'Jordania',
				'7' => 'Kazajistan',
				'254' => 'Kenia',
				'686' => 'Kiribati',
				'381' => 'Kosovo',
				'965' => 'Kuwait',
				'996' => 'Kirguistan',
				'856' => 'Laos',
				'371' => 'Letonia',
				'961' => 'Libano',
				'266' => 'Lesoto',
				'231' => 'Liberia',
				'218' => 'Libia',
				'423' => 'Liechtenstein',
				'370' => 'Lituania',
				'352' => 'Luxemburgo',
				'389' => 'Macedonia',
				'261' => 'Madagascar',
				'265' => 'Malawi',
				'60' => 'Malasia',
				'960' => 'Maldivas',
				'223' => 'Mali',
				'356' => 'Malta',
				'692' => 'Islas Marshall',
				'596' => 'Martinica',
				'222' => 'Mauritania',
				'262' => 'Mayotte',
				'52' => 'Mexico',
				'691' => 'Micronesia',
				'373' => 'Moldavia',
				'377' => 'Monaco',
				'976' => 'Mongolia',
				'382' => 'Montenegro',
				'1664' => 'Montserrat',
				'212' => 'Marruecos',
				'258' => 'Mozambique',
				'264' => 'Namibia',
				'674' => 'Nauru',
				'977' => 'Nepal',
				'31' => 'Paises Bajos',
				'599' => 'Antillas Neerlandesas',
				'64' => 'Nueva Zelanda',
				'505' => 'Nicaragua',
				'227' => 'Niger',
				'234' => 'Nigeria',
				'683' => 'Niue',
				'45' => 'Irlanda del Norte',
				'850' => 'Corea del Norte',
				'47' => 'Noruega',
				'968' => 'Oman',
				'92' => 'Pakistan',
				'680' => 'Palaos',
				'970' => 'Palestina',
				'507' => 'Panama',
				'675' => 'Papua Nueva Guinea',
				'595' => 'Paraguay',
				'51' => 'Peru',
				'63' => 'Filipinas',
				'48' => 'Polonia',
				'689' => 'Polinesia Francesa',
				'351' => 'Portugal',
				'1' => 'Puerto Rico',
				'974' => 'Qatar',
				'40' => 'Rumania',
				'7' => 'Rusia',
				'250' => 'Ruanda',
				'290' => 'Santa Elena',
				'1758' => 'SaintLucia',
				'508' => 'San Pedro y Miquelon',
				'685' => 'Samoa',
				'378' => 'San Marino',
				'239' => 'Santo Tomé y Principe',
				'966' => 'Arabia Saudita',
				'44' => 'Escocia',
				'221' => 'Senegal',
				'381' => 'Serbia',
				'248' => 'Seychelles',
				'232' => 'Sierra Leona',
				'65' => 'Singapur',
				'421' => 'Eslovaquia',
				'386' => 'Eslovenia',
				'677' => 'Islas Salomón',
				'252' => 'Somalia',
				'27' => 'Surafrica',
				'82' => 'Corea del Sur',
				'211' => 'Sudan del Sur',
				'34' => 'España',
				'94' => 'SriLanka',
				'1869' => 'San Cristobal y Nieves',
				'1784' => 'San Vicente y las Granadinas',
				'249' => 'Sudan',
				'597' => 'Surinam',
				'268' => 'Suazilandia',
				'46' => 'Suecia',
				'41' => 'Suiza',
				'963' => 'Siria',
				'886' => 'Taiwan',
				'992' => 'Tayikistan',
				'255' => 'Tanzania',
				'420' => 'Republica Checa',
				'66' => 'Tailandia',
				'670' => 'Timor Oriental',
				'228' => 'Togo',
				'690' => 'Tokelau',
				'676' => 'Tonga',
				'1868' => 'Trinidad y Tobago',
				'216' => 'Tunez',
				'90' => 'Turquia',
				'993' => 'Turkmenistan',
				'1649' => 'Islas Turcas y Caicos',
				'688' => 'Tuvalu',
				'256' => 'Uganda',
				'380' => 'Ucrania',
				'44' => 'Reino Unido',
				'598' => 'Uruguay',
				'998' => 'Uzbekistan',
				'678' => 'Vanuatu',
				'397' => 'Ciudad del Vaticano',
				'58' => 'Venezuela',
				'84' => 'Vietnam',
				'1284' => 'Islas Virgenes Británicas',
				'1340' => 'Islas Virgenes',
				'46' => 'Pais de Gales',
				'681' => 'Wallis y Futuna',
				'967' => 'Yemen',
				'260' => 'Zambia',
				'263' => 'Zimbabwe');
?>

<div class="row-fluid box">
	<h2><?php echo JText::_('TH_POSADERO_TITLE_DATA_CONTACT'); ?></h2>
	<div class="hr"></div>
	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-first-name"><?php echo JText::_('TH_POSADERO_CLIENT_FIRST_NAME_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_FIRST_NAME_LABEL'); ?>" value="" id="client-first-name" name="jform[client-first-name]" title="">
			</div>
		</div>
		</div>
		<div class="span6">
			<div class="control-label"><label title="" for="client-last-name"><?php echo JText::_('TH_POSADERO_CLIENT_LAST_NAME_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_LAST_NAME_LABEL'); ?>" value="" id="client-last-name" name="jform[client-last-name]" title="">
			</div>
		</div>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-email"><?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_LABEL'); ?>" value="" id="client-email" name="jform[client-email]" title="">
			</div>
		</div>
		</div>
		<div class="span6">
			<div class="control-label"><label title="" for="client-phone-code"><?php echo JText::_('TH_POSADERO_CLIENT_PHONE_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input">
				<select name="jform[client-phone-code]" id="client-phone-code" class="input-small">
				<option value=""><?php echo JText::_('TH_POSADERO_CLIENT_PREFIJO_SELECT'); ?></option>
				<?php
				foreach($array_prefijos_es as $key => $value):						
				?>
				<option value="<?php echo $key;?>"><?php echo $value . "(" . $key . ")";?></option>
				<?php
				endforeach;
				?>
			</select>
				<input type="text" class="input-small" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_PHONE_LABEL'); ?>" value="" id="client-phone" name="jform[client-phone]" title="">
			</div>
		</div>
		</div>
	</div>


	<div class="row-fluid">
		<div class="span6">
			<div class="control-label"><label title="" for="client-email-confirm"><?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_CONFIRM_LABEL'); ?></label></div>
		<div class="controls">
			<div class="input-append">
				<input type="text" class="input" size="10" placeholder="<?php echo JText::_('TH_POSADERO_CLIENT_EMAIL_CONFIRM_LABEL'); ?>" value="" id="client-email-confirm" name="jform[client-email-confirm]" title="">
			</div>
		</div>
		</div>
	</div>

</div>

