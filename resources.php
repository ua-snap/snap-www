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

	echo '<div>'.$resourceLayout->getResultsCount().$resourceLayout->getSortCriteria().$resourceLayout->getFilterReset().'</div>';

	echo '<div id="resourceSummaries">';
	if( $resourceLayout->resultsCount ) {
		echo $resourceLayout->getResourceSummaryHtml();
	}
	echo "</div>";

}
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader">Resources</div>
					<form method="get" action="resources.php">
					<div class="filters" style="position: relative; margin-top: 5px;">
					<div style="color: #444444; font-size: 15px; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block">Publication Type</div>
					<select name="type" style="position: absolute; left: 175px;" onchange="submit();">
						<option value="">All</option>
						<?php
						for ($i = 0; $i < sizeof($resTypes); $i++){
							$selected = "";
							if ( isset($_GET['type']) && $_GET['type'] == $i + 1){
								$selected = "selected=\"selected\"";
							}
							echo "<option $selected value=\"".($i + 1)."\">".$resTypes[$i]."</option>";
						}
						?>
					</select>
					</div>
					<div class="filters" style="position: relative; margin-top: 5px;">
					<div style="color: #444444; font-size: 15px; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block">Subject</div>
					<select name="tags" style="position: absolute; left: 175px;" onchange="submit();">
						<option value="">All</option>
						<?php
						$tag_query = "SELECT id, tag from resource_tags GROUP BY tag";
						$tag_result = mysql_query($tag_query);
						while($tag_row = mysql_fetch_array($tag_result)){
							$selected = "";
							if ( isset($_GET['tags']) && $_GET['tags'] == $tag_row['tag']){
								$selected = "selected=\"selected\"";
							}
							echo "<option $selected value=\"".$tag_row['tag']."\">".$tag_row['tag']."</option>";
						}
						?>
					</select>
					</div>
					<div class="filters" style="position: relative; margin-top: 5px;">
					<div style="color: #444444; font-size: 15px; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block">Collaborator</div>
					<select name="collab" style="position: absolute; left: 175px;" onchange="submit();">
						<option value="">All</option>
						<?php
						$collab_query = "SELECT id, name from collaborators";
						$collab_result = mysql_query($collab_query);
						while($collab_row = mysql_fetch_array($collab_result)){
							$selected = "";
							if ( isset($_GET['collab']) && $_GET['collab'] == $collab_row['id']){
								$selected = "selected=\"selected\"";
							}
							echo "<option $selected value=\"".$collab_row['id']."\">".$collab_row['name']."</option>";
						}
						?>
					</select>
					</div>


					</form>


					<div style="width: 900px; clear: both; height: 1px;"></div>
					<div style="margin-top: 40px;"><?php getPublicationListSpecial(); ?></div>

		</div>
	</div>
<?php
$page->closePage();
?>
