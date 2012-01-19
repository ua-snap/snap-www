<?php

require_once 'src/Config.php';

class Contacts {
	
	public function getEmailContacts() {
		$html = '<select name="what" id="contactsSelector">';
		$defaultSelected = false;
		foreach( Config::$contacts as $topic => $props ) {
			$selected = ( true === $defaultSelected ) ? '' : 'selected="selected"';
			$html .= '<option value="'.$topic.'" '.$selected.'>'.$props['description'].'</option>';
			$defaultSelected = true;
		}
		$html .= '</select>';
		return $html;
	}
}

?>