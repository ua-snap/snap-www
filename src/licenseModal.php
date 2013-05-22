<!--This file contains div elements for each variation of each part of
the download modal dialog. Whenever a new section of text needs to be added to
facilitate the creation of a new window for a specific file or type of file, it
should be added here, with it's own unique id attribute that will be passed to
the javascript licenseModal function.-->

<link rel="stylesheet" href="/css/licenseModal.css" type="text/css" />

<div style="display: none;">

<!--************************************** Below here should be placed various introductory text divs -->
	
	<div id="foo">
		<p>SALUTATION</p>
	</div>





<!--************************************** Below here should be placed various license agreement divs -->

	<div id="bar">
		<p>LICENSE AGREEMENT</p>
	</div>





<!--************************************** The following is added to every window -->

	<form id="textEntry" method="POST" action="https://script.google.com/macros/s/AKfycbwwVgvDBKR-jEfBK5r9PwA7YvZpNsNy41l9fn3RhkWOz_B7BUXl/exec">
		<fieldset>
			<p>Full Name: <input type="text" name="name"></p>
			<p>Organization: <input type="text" name="organization"></p>
			<p>Email Address: <input type="text" name="email"></p>
			<input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
			<p><input type="submit" value="Submit"></p>
		</fieldset>
	</form>

</div>
