<?php

require 'template.php';

$page = new webPage('SNAP: Resources', '', '');
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
<div id="main_content" class="releases methods text">
<h2>SNAP web site release notes</h2>

<h3>1.0.4</h3>
<h4>Released February 8, 2012 at 6:55pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Added SNAP downscaling scripts to Methods&rarr;Downscaling section (#666)</li>
<li>Added logos to Methods&rarr;Downscaling page (#627)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Fixed phone number for Nancy Fresco on People Page (#689)</li>
<li>Corrected target of link for &lsquo;Landscape Connectivity&rsquo; slide on home page (#683)</li>
<li>Corrected location of Apache logs (#685)</li>
<li>Made configuration token for Google Analytics API (#684)</li>
<li>Changed Apache restart to &lsquo;graceful&rsquo; to allow more seamless version upgrades (#686)</li>
</ul>

<h3>1.0.3</h3>
<h4>Released February 7, 2012 at 10:55am AKST</h4>
<h5>Resolved issues</h5>
<ul>
<li>Fixed issue which prevented the Contact form from sending emails correctly (#682)</li>
</ul>

<h3>1.0.2</h3>
<h4>Released February 6, 2012 at 5:10pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Changed slides on home page, made clicking the images take you to the link (#621, 671, 676)</li>
<li>Added more folks: Mark Olson, Stephanie McAfee (#622)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Changed &ldquo;Download&rdquo; link on Maps tool to point to actual data page instead of overview (#669)</li>
<li>Text for decadal historical vs. projected DOF, DOT, LOGS explanation was swapped (#667)</li>
</ul>


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
