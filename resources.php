<?php
include("template.php");

require_once('src/ResourceLayout.php');

$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();

$resourceLayout = new ResourceLayout();
$resourceLayout->fetchResources();

?>

    <div id="main_body">
        <div id="main_content" class="resources">
            <h2>Resources</h2>
            <div id="resourcesLeft"><?php echo $resourceLayout->getResourcesHtml(array(3=>'Presentations',2=>'Reports')); ?></div>
            <div id="resourcesRight"><?php echo $resourceLayout->getResourcesHtml(array(4 => 'Videos', 1=>'Papers')); ?></div>
        </div>
    </div>

<?php
$page->closePage();
?>
