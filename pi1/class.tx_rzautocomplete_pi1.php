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

require_once(PATH_tslib.'class.tslib_pibase.php');

class tx_rzautocomplete_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_rzautocomplete_pi1';
	var $scriptRelPath = 'pi1/class.tx_rzautocomplete_pi1.php';
	var $extKey        = 'rzautocomplete';
	var $pi_checkCHash = true;
	
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
    
    // Set template
		$template['file'] = $this->cObj->fileResource($conf['template']);
		$template['RZAUTOCOMPLETE_TEMPLATE'] = $this->cObj->getSubpart($template['file'],'###RZAUTOCOMPLETE_TEMPLATE###');
                            
		$pre = $this->prefixId.$this->cObj->data['uid'];
		// Set markers
		$marker['###SEARCH###'] = $this->pi_getLL('search');
		$marker['###SUBMIT###'] = $this->pi_getLL('submit');
		$marker['###LANGUAGE###'] = $GLOBALS['TSFE']->config['config']['sys_language_uid'];
		$marker['###SEARCHPAGE###'] = $this->pi_getPageLink($conf['searchPage']);
		$marker['###FORM_ID###'] = $this->config['id']=$pre.'_form';
		$marker['###WORD_ID###'] = $this->config['id']=$pre.'_word';

    // Output
		$content = $this->cObj->substituteMarkerArrayCached($template['RZAUTOCOMPLETE_TEMPLATE'],$marker);
		
    // Add JS
    $content .= '      
      <script type="text/javascript">
        /* <![CDATA[ */
          jQuery().ready(function() {
            jQuery("#'.$pre.'_word").autocomplete("index.php?eID=rzautocomplete&language='.$marker['###LANGUAGE###'].'", {
              minChars: '.intval($conf['minChars']).',
              selectFirst: false,
              max: '.intval($conf['maxResults']).',
              autoFill: '.$conf['autoFill'].',
              delay: '.$conf['delay'].',
              matchContains: '.$conf['matchContains'].',
              scroll: '.$conf['scroll'].',
              selectFirst: '.$conf['selectFirst'].',
              multiple: '.$conf['multiple'].',
              multipleSeparator: "'.$conf['multipleSeparator'].' "
            });';
    
    if($conf['submitClick'] == '1' && $conf['multiple'] == '0') {
      $content .= '     
            jQuery("#'.$pre.'_word").result(function (event, data, formatted) {
              jQuery("#'.$pre.'_form").submit();
            });';
    }
    
    $content .= ' 
          });
        /* ]]> */
      </script>
    ';

		return($content);
	}
} 

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rzautocomplete/pi1/class.tx_rzautocomplete_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/rzautocomplete/pi1/class.tx_rzautocomplete_pi1.php']);
}

?>