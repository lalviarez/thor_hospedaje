<?php
/**
 * @version		$Id: default.php 2013-07-11
 * @copyright	Copyright (C) 2013 Leonardo Alviarez - Edén Arreaza. All Rights Reserved.
 * @license		GNU General Public License version 3, or later
 * @note		Note : All ini files need to be saved as UTF-8 - No BOM
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
$baseurl = JURI::base();
$this->pagination->set("limitstart", 0);
$this->pagination->set("limit", 1);
$rows=count($this->items);

foreach($this->items as $i => $item):
    echo "<table>";
    if(!($i % 2)) :
		$image=$item->image;
		$country=$item->country;
		$country_desc=$item->country_desc;
		
		if($i==($rows-1)):
?>		
			<tr height='120px'>
				<td width='25%'><img src="<?php echo $baseurl . $image;?>" width='160px' height='120px'></td>
				<td width='25%'><?php echo $country."<br>".$country_desc;?> </td>
				<td width='25%'>&nbsp;</td>
				<td width='25%'>&nbsp;</td>
			</tr>
<?php  endif; 	

	else:
		$image2=$item->image;
		$country2=$item->country;
		$country_desc2=$item->country_desc;
	    
?>	
	<tr height='120px'>
		<td width='25%'><img src="<?php echo $baseurl . $image;?>" width='160px' height='120px'></td>
		<td width='25%'><?php echo $country."<br>".$country_desc;?> </td>
		<td width='25%'><img src="<?php echo $baseurl . $image2;?>" width='160px' height='120px'></td>
		<td width='25%'><?php echo $country2."<br>".$country_desc2;?></td>
	</tr>
	

<?php
	endif;
endforeach; ?>
    <tr>
		<td colspan="7">
		<?php echo $this->pagination->getListFooter(); ?>
		</td>
	</tr>
    </table>



