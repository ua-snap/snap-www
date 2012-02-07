<?php

require 'template.php';

$page = new webPage('SNAP: Resources', '', '');
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
<div id="main_content" class="releases methods text">
<h2>Release notes</h2>

<h3>1.0.0</h3>
<h4>Released February 5, 2012 at 7:40pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Added new collaborators, updated existing collaborators' text (DOI, USGS, ACCAP, and Alaska Fire Science Consortium) (#661, 656)</li>
<li>Added new resources and attachments (#665, 463)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Updated configuration to self-reference as www.snap.uaf.edu, not phobos.snap.uaf.edu (#655)</li>
<li>Corrected photos for staff members (#664)</li>
<li>Fixed links to metadata (#662)</li>
<li>Removed note that the web site was in beta testing (#660)</li>
</ul>

</div>
</div>

<?php
$page->closePage();
?>