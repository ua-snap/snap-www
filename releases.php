<?php

require 'template.php';

$page = new webPage('SNAP: Release Notes', '', '');
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
<div id="main_content" class="releases methods text">
<h2>SNAP web site release notes</h2>

<h3>1.0.8</h3>
<h4>Released TBD</h4>
<p>All issue numbers now refer to Github issues.</p>

<h5>New functionality/content</h5>

<ul>
	<li></li>
</ul>

<h5>Resolved issues</h5>
<ul>
	<li>Updated footer copyright date to 2012 (#44)</li>
	<li>Modified text styling on header/footer of map tool to conform to styling elsewhere on the site (#41)</li>
</ul>

<h3>1.0.7</h3>
<h4>Released March 12, 2012 at 8:00pm AKDT</h4>
<h5>New functionality/content</h5>
<ul>
<li>Updates on data, charts pages to text to improve clarity (gh#30, 24, 23, 21, 18)</li>
<li>Videos added to Resources section (#430, #696)</li>
<li>Updated collaborators&rsquo; logos, text blurbs (gh#26, #710)</li>
</ul>

<h3>1.0.6</h3>
<h4>Released February 24, 2012 at 12:00pm AKST</h4>
<h5>Resolved issues</h5>
<ul>
<li>Corrected calculation of height of y&ndash;axis to prevent variability bars from overlapping legend, underflowing chart (gh#12, gh#14)</li>
<li>Fixed hover text on help button for variability to read 'About variability&hellip;' (gh#13)</li>
<li>Calculates y&ndash;axis on charts across all scenarios (A2, A1B, B1) so the axis is constant between scenarios, facilitating comparisons (gh#17)</li>
<li>Changed text on Charts Tool legends and made historical PRISM data bar gray to better describe the graph&rsquo;s data (gh#16)</li>
<li>Prevented any non&ndash;minified javascript from being deployed (gh#15)</li>
</ul>
<h3>1.0.5</h3>
<h4>Released February 21, 2012 at 8:30pm AKST</h4>
<p>Issues marked <code>gh#1234</code> refer to issues tracked in the Github issue tracker instead of Redmine.</p>
<h5>New functionality/content</h5>
<ul>
<li>Charts tool changes
<ul>
<li>Added Export pop-up with high-res PNG, low-res PNG and vector (SVG) export options (#624)</li>
<li>Reorganized page to put community choice first, moved explanation text into modal popups (#647)</li>
<li>Removed sample chart from page to prevent users from interpreting that chart as a real chart (#647, #651)</li>
<li>Exported charts have the SNAP logo overlaid on the lower-left, with more concise description text (#701, #624)</li>
</ul>
</li>
<li>Added About&rarr;Logos page to link to SNAP logos in a variety of formats (#281)</li>
<li>Added ability to embed streaming video in a Resource (#471)</li>
<li>Implemented consistently-colored controls on Charts, Data pages (#647)</li>
<li>Modified layout of Projects page to allow dynamic-height descriptions of projects (#692)</li>
<li>Added hover text attribution to properly give user credit for photos on project pages (#693)</li>
<li>Updated layout of Resources page to be a two-column layout, removed hover text (#635)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Corrected title of this page to be &ldquo;Release Notes&rdquo; (#695)</li>
<li>Fixed issue that allowed Google and other search indexing programs to trigger a Contact Us email (#698)</li>
<li>Improved layout and formatting to ensure images were consistently aligned on the People page (#651)</li>
</ul>
<h5>Server, network, and administrative maintenance</h5>
<ul>
<li>Moved source code hosting to <a href="http://www.github.com">Github</a> to facilitate access and collaboration (#678)</li>
<li>Removed unused images from main <code>/images</code> directory (#671)</li>
<li>Implemented a new testing server integrated with Github and Jenkins (#680)</li>
<li>Updated Apache configurations to properly use <code>NameVirtualHosts</code> to host both the SNAP web site as well as be a passthrough junction for ACCAP and other sites (#680)</li>
<li>Removed unused code, database tables and columns as necessary (#706)</li>
</ul>
<h5>Known issues</h5>
<ul>
<li>Loading&hellip; overlay on Charts was removed, it didn't have time to display on fast (DSL or faster) connections; this may need to be restored if connectivity issues cause perceived slowness. (gh#10)</li>
</ul>

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
