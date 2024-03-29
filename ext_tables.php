<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY,'pi1/static/', 'jQuery Autocomplete');

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,recursive';

t3lib_extMgm::addPlugin(array(
	'LLL:EXT:' . $_EXTKEY . '/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');     

if (TYPO3_MODE == 'BE') {
    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_rzautocomplete_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_rzautocomplete_pi1_wizicon.php';
}

?>