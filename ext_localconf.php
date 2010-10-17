<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}
$TYPO3_CONF_VARS['FE']['eID_include']['rzautocomplete'] = 'EXT:rzautocomplete/lib/class.rzautocomplete.php';
t3lib_extMgm::addPItoST43($_EXTKEY,"pi1/class.tx_rzautocomplete_pi1.php","_pi1","list_type",1);
?>