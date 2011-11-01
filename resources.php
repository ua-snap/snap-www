<?php
include("template.php");
$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();

$coll_array = split(",", $_GET['coll']);
$pubImages = array ( "pub_paper.png", "pub_report.png", "pub_presentation.png", "pub_video.png");
$resTypes = array ( "Paper", "Report", "Presentation", "Video");
function getPublicationListSpecial($t){

	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	if (mysql_num_rows($result) < 1){
		echo "<div style=\"font-size: 16px;\">There are no results for the criteria you selected.</div>";
	} else {
		echo "<div><span>Displaying ".mysql_num_rows($result)." result";
		if (mysql_num_rows($result) > 1){
			echo "s";
		}
		echo "</span>";
		if (isset($_GET['tags']) || isset($_GET['type']) || isset($_GET['collab'])){	
			echo "<span> | <a href=\"resources.php\">Show All</a></span>";
		}
		echo "<span style=\"margin-left: 50px;\"> Sort by ";
		$tagline = "";
		$getflag = false;
		if ($_GET['tags'] != NULL){ $tagline .= "tags=".$_GET['tags']."&"; $getflag = true; }
		if ($_GET['type'] != NULL){ $tagline .= "type=".$_GET['type']."&"; $getflag = true; }
		if ($_GET['collab'] != NULL){ $tagline .= "collab=".$_GET['collab']."&"; $getflag = true; }
		$tagline = preg_replace("/(.*)&$/", "$1", $tagline);

			if ($_GET['sort'] == "oldest"){
				if ($tagline == "" && $getflag == true){ $tagline .= "&"; }
				echo "<a href=\"/resources.php?$tagline\">Newest First</a> | Oldest First";
			} else {
				if ($tagline != "" && $getflag == true){ $tagline .= "&"; }
				echo "Newest First | <a href=\"/resources.php?$tagline"."sort=oldest\">Oldest First</a>";
			}
		echo "</span>"; 
		echo "</div>";
	}
	while ($row = mysql_fetch_row($result)){
		echo "<div id=\"pub_box_".$row[2]."\" style=\"width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; \">";

			$pubType = $row[1];
			global $pubImages;

			echo "<div id=\"pub_hover_".$row[2]."\" class=\"hover_box\" >";
				echo "<div style=\"position: relative; \">";
				echo "<div style=\"position: absolute; \">";
					echo "<img alt=\"".$pubImages[$pubType -1]."\" src=\"images/".$pubImages[$pubType -1]."\" style=\"margin-left: 5px;\" />";
				echo "</div>";
				echo "<div style=\"position: relative;; left: 59px; width: 380px; ;\">";
					echo "<div style=\"font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;\" ><a href=\"resource_page.php?resourceid=".$row[2]."\">".$row[0]."</a></div>";
					echo "<div style=\"position: relative; width: 420px; margin-bottom: 10px;\"></div>";
					$query_tags = "SELECT tag FROM resource_tags WHERE resourceid='".$row[2]."'";
					$result_tags = mysql_query($query_tags);
					echo "<div style=\"color: #666666;\">Tags: ";
					$row_tags = mysql_fetch_array($result_tags);
					echo $row_tags[0];
					while ($row_tags = mysql_fetch_array($result_tags)){
						echo ", ".$row_tags[0];
					}
					echo "</div>";

				echo "</div>";
				echo "</div>";
				echo "<div style=\"margin-top: 10px;width: 420px; padding: 10px;\">".$row[3]."</div>";
				echo "<div style=\"position: relative; left: 385px; bottom: 5px; margin-top: 10px;\"><a id=\"pub_close_".$row[2]."\" style=\"cursor: pointer; cursor: hand;\">close &#8855;</a></div>";

			echo "</div>\n";
			echo "<div style=\"width: 50px; padding: 6px; position: absolute; z-index: 1;\">";

			echo "<img alt=\"".$pubImages[$pubType -1]."\" src=\"images/".$pubImages[$pubType -1]."\" style=\"\" />";
			echo "</div>";
			echo "<div style=\"position: absolute; padding-top: 6px; left: 60px; width: 380px;\">";
				echo "<div style=\"font-size: 15px; color: #111111; margin-bottom: 5px;\" ><a href=\"resource_page.php?resourceid=".$row[2]."\">".$row[0]."</a></div>";
			echo "</div>";




			echo "<script type=\"text/javascript\">\n";
				echo "var config = { 
					over: function(){ $('#pub_hover_".$row[2]."').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_".$row[2]."').hide(0); } 
					};";
				echo "$('#pub_box_".$row[2]."').hoverIntent(config);";
				echo "$('#pub_close_".$row[2]."').click(
					function(){ $('#pub_hover_".$row[2]."').hide(0); }
				);";
			echo "</script>\n";

		echo "</div>";
	}
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
							if ($_GET['type'] == $i + 1){
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
							if ($_GET['tags'] == $tag_row['tag']){
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
							if ($_GET['collab'] == $collab_row['id']){
								$selected = "selected=\"selected\"";
							}
							echo "<option $selected value=\"".$collab_row['id']."\">".$collab_row['name']."</option>";
						}
						?>
					</select>
					</div>


					</form>


					<div style="width: 900px; clear: both; height: 1px;"></div>
					<div style="margin-top: 40px;"><?php getPublicationListSpecial($_GET['tags']); ?></div>

		</div>
	</div>
<?php
$page->closePage();
?>
