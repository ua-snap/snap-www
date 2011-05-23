<?php
include("template.php");
$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$tag_array;
$tag_array = split(",", $_GET['tags']);
$coll_array;
$coll_array = split(",", $_GET['coll']);
$pubImages = array ( "pub_paper.png", "pub_report.png", "pub_presentation.png", "pub_video.png");
$resTypes = array ( "Paper", "Report", "Presentation", "Video");
function getPublicationListSpecial($t){
	global $tag_array;
	$pubtag = "";
	if ((isset($_GET['tags']) && $_GET['tags'] != NULL) || (isset($_GET['type']) && $_GET['type'] != NULL) || (isset($_GET['collab']) && $_GET['collab'] != NULL)){
		$adds = "WHERE ";
	}
	if (isset($_GET['tags']) && $_GET['tags'] != NULL){
		$pubtag = "pt.tag = '".$_GET['tags']."'";
	}
	if (isset($_GET['type']) && $_GET['type'] != NULL){
		$types = "";
		if (isset($_GET['tags']) && $_GET['tags'] != NULL){
			$types = " AND ";
		}
		$types .= "pubs.type ='".$_GET['type']."'";
	}
	if (isset($_GET['collab']) && $_GET['collab'] != NULL){
		$collab = "";
		if ((isset($_GET['tags']) && $_GET['tags'] != NULL) || (isset($_GET['type']) && $_GET['type'] != NULL)){
			$collab = " AND ";
		}
		$collab .= " pc.collaboratorid = '".$_GET['collab']."'";
	}
	//echo "<div style=\"font-size: 30px; color: #97a93a\">".$t."</div>";
	//if ($t){
	//	$pubtag = "WHERE publication_tags.tag LIKE '%".$t."%'";
	//}	

	$countsize = sizeof($tag_array);
	//$query = "SELECT distinct(title),createdate,summary,projects.id FROM project_tags RIGHT JOIN projects ON project_tags.projectid=projects.id $projtag ORDER BY createdate DESC";
	$order = "ORDER BY pubs.createdate";
	if ($_GET['sort'] == "oldest"){
		$order = "ORDER BY pubs.createdate DESC";
	}
	$query = "SELECT title,type,pubs.id,summary FROM publications pubs LEFT JOIN publication_tags AS pt ON pubs.id=pt.publicationid LEFT JOIN publication_collaborators AS pc ON pubs.id=pc.publicationid $adds $pubtag $types $collab GROUP BY pubs.id $order";
	
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
					echo "<div style=\"font-size: 15px; color: #111111; font-weight: bold; margin-top: 5px; margin-bottom: 5px;\" ><a style=\"color: #333333;\" href=\"resource_page.php?resourceid=".$row[2]."\">".$row[0]."</a></div>";
					echo "<div style=\"position: relative; width: 420px; margin-bottom: 10px;\"></div>";
					$query_tags = "SELECT tag FROM publication_tags WHERE publicationid='".$row[2]."'";
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
				echo "<div style=\"font-size: 15px; color: #111111; font-weight: bold; margin-bottom: 5px;\" ><a style=\"color: #333333;\" href=\"resource_page.php?resourceid=".$row[2]."\">".$row[0]."</a></div>";
			echo "</div>";




			echo "<script type=\"text/javascript\">\n";
				echo "var config = { 
					over: function(){ $('#pub_hover_".$row[2]."').show(500); },
					interval: 100,
					out: function(){ $('#pub_hover_".$row[2]."').hide(0); } 
					};";
				echo "$('#pub_box_".$row[2]."').hoverIntent(config);";
				echo "$('#pub_close_".$row[2]."').click(
					function(){ $('#pub_hover_".$row[2]."').hide(0); }
				);";
				/*
				echo "$('#pub_box_".$row[2]."').hover(\n";
					echo "function(){ $('#pub_hover_".$row[2]."').show(500); },\n";
					echo "function(){ $('#pub_hover_".$row[2]."').hide(0); }\n";
				echo ");\n";
				*/
				/*
				echo "$('#pub_box_".$row[2]."').bind('mouseover', function() { $('#pub_hover_".$row[2]."').show(500); } );";
				echo "var _counter = 0;";
				echo "var _seconds = 0;";
				echo "$('#pub_box_".$row[2]."').hover(\n";
					echo "function() { _counter = setInterval(openHover(), 2000); }, \n";
					echo "function() { clearInterval(_counter); }";
				echo ");\n";
				echo "function openHover() {";
					echo "_seconds++; ";
					echo "if (_seconds == 3) { _seconds = 0; $('#pub_hover_".$row[2]."').show(500); }";
				echo "}";	
				*/
				//echo "$('#pub_box_".$row[2]."').mouseout(function(){\n";
				//	echo "$('#pub_hover_".$row[2]."').hide();\n";
				//echo "});\n";
			echo "</script>\n";

		echo "</div>";
	}
}
?>
		<div id="main_body">
			<script src="js/jquery.hoverIntent.minified.js" type="text/javascript"></script>
			<div id="main_content">
				<div class="subHeader">Resources</div>
					<form method="GET" action="resources.php">
					<div class="filters" style="position: relative; margin-top: 5px;">
					<div style="color: #444444; font-size: 15px; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block">Publication Type</div>

						<?php
						
						//for ($i = 0; $i < sizeof($resTypes); $i++){
						//	echo "<a href=\"\"><span class=\"tag_nav\"".($i + 1)."\">".$resTypes[$i]."</span></a>";
						//}
						?>
					

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
						$tag_query = "SELECT id, tag from publication_tags GROUP BY tag";
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
					<div class="filters" style="">
					<?php
					/*
						//Tags
						$tag_result = mysql_query("SELECT tag FROM publication_tags GROUP BY tag");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"font-size: 15px; float: left; margin-bottom: 10px;\">\n";
							echo "<div style=\"color: #444444; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block\">Categories</div><div style=\"display: inline-block; margin-left: 30px;\"><a href=\"resources.php\">Show all</a></div>";
							echo "<div></div>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
							$taglist = $_GET['tags'];
							$tagstyle = "";
							$tagselect = "";
							$tagflag = 0;
							for ($i = 0; $i < sizeof($tag_array); $i++){
								if ($tag_array[$i] == $tag_row[0]){
									$tagstyle = "style=\"background-color: #97a93a;\"";
									//$tagselect = "<span class=\"tag_x\" >&#8855;</span>";
								}
								if ($tag_row[0] == $tag_array[$i]){
									$tagflag = 1;
									$cur_tag = $tag_array[$i];
									$taglist = preg_replace("/$cur_tag/", "", $taglist);
									
								}
							}
							if ($tagflag == 0 && isset($taglist)){
								if (sizeof($tag_array) >= 1 && isset($_GET['tags']) && $_GET['tags'] != ""){
									$taglist .= ",";
								}
								$taglist .= $tag_row[0];
							} elseif ($tagflag == 0 && !isset($taglist)){
								$taglist = $tag_row[0];
							}
							if ($tagflag == 1){
								$taglist = preg_replace("/,,/", ",", $taglist);
								$taglist = preg_replace("/^,/", "", $taglist);
								$taglist = preg_replace("/,$/", "", $taglist);
							}
                                                	echo "<a href=\"resources.php?tags=".$taglist."\"><span $tagstyle class=\"tag_nav\">".$tagselect.$tag_row[0]."</span></a>";
                                        	}
						echo "</div>";
						//Collaborators
						/*
						$coll_query = "SELECT collaborators.id,collaborators.name FROM collaborators LEFT JOIN publication_collaborators ON collaborators.id=publication_collaborators.collaboratorid GROUP BY collaboratorid";
						$coll_result = mysql_query($coll_query);
                                        	$coll_row = mysql_fetch_array($coll_result);
						echo "<div style=\"float: left; width: 450px; font-size: 15px; margin-bottom: 10px; margin-left: 10px;\">";
							//echo "<div style=\"color: #444444; display: inline-block; padding-right: 12px; font-weight: bold;\">Collaborators</div>";
							echo "<div style=\"color: #444444; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block\">Collaborators</div><div style=\"display: inline-block; margin-left: 30px;\"><a href=\"resources.php\">Show all</a></div>";
                                               	//echo "<a href=\"resources.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
						echo  "<div></div>";
                                        	while ($coll_row = mysql_fetch_array($coll_result)){
							$colllist = $_GET['coll'];
							$collstyle = "";
							$collflag = 0;
							for ($i = 0; $i < sizeof($coll_array); $i++){
								if ($coll_array[$i] == $coll_row[0]){
									$collstyle = "style=\"background-color: #97a93a;\"";
								}
								if ($coll_row[0] == $coll_array[$i]){
									$collflag = 1;
									$cur_coll = $coll_array[$i];
									$colllist = preg_replace("/$cur_coll/", "", $colllist);
									
								}
							}
							if ($collflag == 0 && isset($colllist)){
								if (sizeof($coll_array) >= 1 && isset($_GET['coll']) && $_GET['coll'] != ""){
									$colllist .= ",";
								}
								$colllist .= $coll_row[0];

							} elseif ($collflag == 0 && !isset($colllist)){
								$colllist = $coll_row[0];
							}
							if ($collflag == 1){
								$colllist = preg_replace("/,,/", ",", $colllist);
								$colllist = preg_replace("/^,/", "", $colllist);
								$colllist = preg_replace("/,$/", "", $colllist);
							}
							
                                                	echo "<a href=\"resources.php?coll=".$colllist."\"><span $collstyle class=\"tag_nav\">".$coll_row[1]."</span></a>";
                                        	}
						echo "</div>";
						*/
					?>
					</div>

					<div style="width: 900px; clear: both; height: 1px;"></div>
					<div style="margin-top: 40px;"><?php getPublicationListSpecial($_GET['tags']); ?></div>


	


				<!--PROJECTS -->




<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
