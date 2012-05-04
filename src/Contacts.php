<?php

require_once 'src/Config.php';

class Contacts {
	
	public function getEmailContacts($defaultSelected = null) {
		$html = '<select name="what" id="contactsSelector">';
		foreach( Config::$contacts as $topic => $props ) {
			$selected = ( $topic == $defaultSelected )  ? 'selected="selected"' : '';
			$html .= '<option value="'.$topic.'" '.$selected.'>'.$props['description'].'</option>';
		}
		$html .= '</select>';
		return $html;
	}
}

?>