<?php

########################################################################
# Extension Manager/Repository config file for ext "rzautocomplete".
#
# Auto generated 17-10-2010 15:32
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'jQuery autocomplete for indexed_search',
	'description' => 'Multilingual autocomplete for indexed search based on jQuery.',
	'category' => 'fe',
	'shy' => 0,
	'version' => '0.0.2',
	'dependencies' => 'indexed_search',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'alpha',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Raphael Zschorsch',
	'author_email' => 'rafu1987@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'indexed_search' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:21:{s:9:"ChangeLog";s:4:"9071";s:12:"ext_icon.gif";s:4:"aa00";s:17:"ext_localconf.php";s:4:"0093";s:14:"ext_tables.php";s:4:"7371";s:13:"locallang.xml";s:4:"ba6d";s:16:"locallang_db.xml";s:4:"bef5";s:14:"doc/manual.pdf";s:4:"6255";s:14:"doc/manual.sxw";s:4:"e72b";s:28:"lib/class.rzautocomplete.php";s:4:"2e12";s:14:"pi1/ce_wiz.gif";s:4:"c522";s:35:"pi1/class.tx_rzautocomplete_pi1.php";s:4:"82b6";s:43:"pi1/class.tx_rzautocomplete_pi1_wizicon.php";s:4:"8a1e";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"e1e1";s:24:"pi1/static/constants.txt";s:4:"d6f4";s:20:"pi1/static/setup.txt";s:4:"dfb7";s:31:"res/css/jquery.autocomplete.css";s:4:"719c";s:33:"res/js/jquery-1-4-3-noconflict.js";s:4:"b7d4";s:22:"res/js/jquery-1-4-3.js";s:4:"9182";s:29:"res/js/jquery.autocomplete.js";s:4:"11e6";s:32:"res/template/rzautocomplete.html";s:4:"f895";}',
	'suggests' => array(
	),
);

?>