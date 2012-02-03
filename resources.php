<?php
include("template.php");

require_once('src/ResourceLayout.php');

$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();

$resTypes = array ( "Paper", "Report", "Presentation", "Video");

function getPublicationListSpecial() {

    $resourceLayout = new ResourceLayout();
    $resourceLayout->setRequests( $_GET );
    $resourceLayout->fetchResources();

    echo '<div id="resourceSummaries">';
    echo $resourceLayout->getResourceSummaryHtml();
    echo "</div>";

}
?>
    <div id="main_body">
        <div id="main_content">
            <div class="subHeader">Resources</div>
            <div style="margin-top: 40px;"><?php getPublicationListSpecial(); ?></div>
        </div>
    </div>
<?php
$page->closePage();
?>
