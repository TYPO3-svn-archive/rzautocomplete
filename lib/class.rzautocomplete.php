<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Raphael Zschorsch <rafu1987@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

$obj = t3lib_div::makeInstance('rzautocomplete');
$obj->main();

class rzautocomplete {
	function rzautocomplete() {
		// include class def
		require_once(PATH_t3lib.'class.t3lib_page.php');
		
		// Initialize FE user object:
		$this->feUserObj = tslib_eidtools::initFeUser();
		
		// Connect to database:
		tslib_eidtools::connectDB();

		return true;
	}
		
	function main() { 
    $list_array = array();        
    $res = $this->getList($_GET['q'],$_GET['language'],$_GET['limit'],$_GET['startID']);
    while($row=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
      $list_array[] = $row['baseword'];
    }
    foreach($list_array as $l) {
      echo "".$l."\n";
    }
  }   

	function getList($search,$language,$limit,$startID){    
		$words=t3lib_div::trimExplode(' ',$search, 1);
		
		$where_array=array();
		foreach($words as $word){
			//$where_array[]='baseword LIKE '.$GLOBALS['TYPO3_DB']->fullQuoteStr('%'.$word.'%','index_words');
			$where_array[]='baseword LIKE '.$GLOBALS['TYPO3_DB']->fullQuoteStr(''.$word.'%','index_words');
		}
		
		// Section
		if($startID != '') $section = 
      ' AND index_section.rl0 IN ('.$startID.')'.
			' AND index_section.phash = index_rel.phash'
    ;		

		$from='index_words';
		$where='('.implode(' AND ',$where_array).')'.$this->multipleGroupsWhereClause;
			
		// Join with index_phash table
		$from.=',index_rel,index_phash,index_section';
		$where.=
			' AND index_words.wid=index_rel.wid '.
			' AND index_rel.phash = index_phash.phash'.
			' AND index_phash.gr_list="0,-1"'.
			' AND index_phash.sys_language_uid='.intval($language);

		$query=
			'SELECT DISTINCT baseword'.
			' FROM '.$from.
			' WHERE '.$where.
			' ORDER BY LENGTH(baseword)'.
			($limit ? 'LIMIT '.intval($limit) : '');

		$res=$GLOBALS['TYPO3_DB']->sql_query($query);
		return $res;
	}
}
?>