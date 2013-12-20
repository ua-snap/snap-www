<!--This file contains div elements for each variation of each part of
the download modal dialog. Whenever a new section of text needs to be added to
facilitate the creation of a new window for a specific file or type of file, it
should be added here, with it's own unique id that will be passed to
the javascript licenseModal function.-->

<div style="display: none;">

<!--************************************** Below here should be placed various introductory text divs -->
	
	<div id="genericIntro">
		<h2><b>Hello!</b></h2><p>If you’d like to receive notifications of product and data updates, please provide the information below. This also helps us to get to know our users.</p>
	</div>





<!--************************************** Below here should be placed various license agreement divs -->

	<div id="genericLicense">
		<p>Because we strive to make our products as widely available and useful as possible, all SNAP products have a <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a> applied to them. If you’d like to download our products, please read the license link above and click the &quot;Agree&quot; button.</p>
		<p>If you are part of a for-profit organization, and are interested in commercialization opportunities and/or collaborative R&amp;D activities please <a href="http://www.snap.uaf.edu/people.php#contact">contact us</a>.</p>
	</div>





<!--************************************** The following is added to every window -->

	<form id="textEntry" method="POST" action="https://script.google.com/macros/s/AKfycbwwVgvDBKR-jEfBK5r9PwA7YvZpNsNy41l9fn3RhkWOz_B7BUXl/exec">
		<fieldset>
			<p>Full Name: <input type="text" name="name"></p>
			<p>Organization: <input type="text" name="organization"></p>
			<p>Email Address: <input type="text" name="email" class="email"></p>
			<input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
		</fieldset>
	</form>



</div>
