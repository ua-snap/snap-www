<?php
include("template.php");
$page = new webPage("SNAP: Terms of Use", "", "");
$page->openPage();
$page->pageHeader();

?>
        <div id="main_body">
            <div id="main_content" style="min-height: 200px;" class="methods text">
            <h2>Terms of Use</h2>
            	<?php echo Config::$termsOfUse; ?>
        </div>
    </div>
<?php $page->closePage(); ?>