<?php

require_once('src/SwDb.php');

class People {
	
	// $props is an associative array with id, image, title, first, last, position
	static public function getPersonThumbnail($props) {
		return <<<html

<a href="/people_page.php?id={$props['id']}">
<div class="person">
<img src="/images/people/{$props['image']}" />
<p class="name">{$props['first']} {$props['last']}</p>
<p class="title">{$props['position']}</p>
</div>
</a>

html;
	}

}
?>