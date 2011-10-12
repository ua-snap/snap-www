<?php
include("template.php");
$page = new webPage("SNAP: Projects", "projects.css", "projects");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$tag_array;
$tag_array = split(",", $_GET['tags']);
function getProjectList(){
	$result = mysql_query("SELECT title,createdate,summary,id FROM projects ORDER BY createdate DESC");
	while ($row = mysql_fetch_row($result)){
		echo "<div style=\"margin-top: 20px; width: 600px;\">";
			echo "<div style=\"font-size: 20px; \"><a href=\"project_page.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
			echo "<div style=\"position: relative; height: 15px; margin-bottom: 5px;\">";
				echo "<div style=\" position: absolute; font-size: 12px; color: #444444;\">Created: ".$row[1]."</div>";
				echo "<div style=\"position: absolute; margin-left: 150px; font-size: 12px;\"> Topics: ";
				$tag_result = mysql_query("SELECT tag FROM project_tags WHERE projectid='".$row[3]."'");
				$tag_row = mysql_fetch_array($tag_result);
					echo "<a href=\"\">".$tag_row[0]."</a>";
				while ($tag_row = mysql_fetch_array($tag_result)){
					echo ", <a href=\"\">".$tag_row[0]."</a>";
				}
				echo "</div>";
			echo "</div>";
			echo "<div>".preg_replace("/\n/", "<br/>", $row[2])."</div>";
	
		echo "</div>";
	}
}
function getProjectListSpecial($t){
	global $tag_array;
	$projtag = "";
	if ((isset($_GET['tags']) && $_GET['tags'] != NULL) || (isset($_GET['collab']) && $_GET['collab'] != NULL)){
		$adds = "WHERE ";
	}
	if (isset($_GET['tags']) && $_GET['tags'] != NULL){
		$projtag = "pt.tag = '".$_GET['tags']."'";
	}
	if (isset($_GET['collab']) && $_GET['collab'] != NULL){
		$collab = "";
		if ((isset($_GET['tags']) && $_GET['tags'] != NULL)){
			$collab = " AND ";
		}
		$collab .= " pc.collaboratorid = '".$_GET['collab']."'";
	}
	//echo "<div style=\"font-size: 30px; color: #97a93a\">".$t."</div>";
	$countsize = sizeof($tag_array);
	//$query = "SELECT distinct(title),createdate,summary,projects.id FROM project_tags RIGHT JOIN projects ON project_tags.projectid=projects.id $projtag ORDER BY createdate DESC";
	$order = "ORDER BY proj.createdate";
	if ($_GET['sort'] == "oldest"){
		$order = "ORDER BY proj.createdate DESC";
	}
	$query = "SELECT title, createdate, summary, proj.id, image FROM projects AS proj LEFT JOIN project_tags AS pt ON proj.id = pt.projectid LEFT JOIN project_collaborators AS pc ON proj.id = pc.projectid $adds $projtag $collab GROUP BY id $order";
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
		if (isset($_GET['tags']) || isset($_GET['collab'])){	
			echo "<span> | <a href=\"projects.php\">Show All</a></span>";
		}
		echo "<span style=\"margin-left: 50px;\"> Sort by ";
		$tagline = "";
		$getflag = false;
		if ($_GET['tags'] != NULL){ $tagline .= "tags=".$_GET['tags']."&"; $getflag = true; }
		if ($_GET['collab'] != NULL){ $tagline .= "collab=".$_GET['collab']."&"; $getflag = true; }
		$tagline = preg_replace("/(.*)&$/", "$1", $tagline);

			if ($_GET['sort'] == "oldest"){
				if ($tagline == "" && $getflag == true){ $tagline .= "&"; }
				echo "<a href=\"/projects.php?$tagline\">Newest First</a> | Oldest First";
			} else {
				if ($tagline != "" && $getflag == true){ $tagline .= "&"; }
				echo "Newest First | <a href=\"/projects.php?$tagline"."sort=oldest\">Oldest First</a>";
			}
		echo "</span>"; 
		echo "</div>";
	}
	while ($row = mysql_fetch_row($result)){
		if ($row[5] == $countsize || $countsize == 1){
			echo "<div style=\"width: 440px; height: 120px; overflow: hidden; display: inline-block; margin: 10px; margin-bottom: 30px; position: relative;\">";
				echo "<div style=\"width: 174px; height: 110px; position: absolute; \"><img alt=\"".$row[4]."\" src=\"".$row[4]."\" style=\"border: 1px solid #6a7173; padding: 3px; width: 174px; height: 110px; \" /></div>";
				echo "<div style=\"position: absolute; left: 190px; width: 250px;\">";
					echo "<div style=\"font-size: 13px; color: #111111; margin-bottom: 5px;\"><a href=\"project_page.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
					//echo "<div style=\"\">";
						/*
						echo "<div style=\" position: absolute; font-size: 12px; color: #444444;\">Created: ".$row[1]."</div>";
						echo "<div style=\"position: absolute; font-size: 12px;\"> Topics: ";
						$tag_result = mysql_query("SELECT tag FROM project_tags WHERE projectid='".$row[3]."'");
						$tag_row = mysql_fetch_array($tag_result);
							echo "<a href=\"projects.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
						while ($tag_row = mysql_fetch_array($tag_result)){
							echo ", <a href=\"projects.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
						}
						echo "</div>";
						*/
					//echo "</div>";
					echo "<div style=\"font-size: 13px; \">".preg_replace("/\n/", "<br/>", $row[2])."</div>";
					//echo "<div style=\"font-size: 13px; color: #666666; margin-top: 5px;\">created ".preg_replace("/\n/", "<br/>", $row[1])."</div>";
					
				echo "</div>";

			echo "</div>";
		}
	}
}
?>
		<div id="main_body">
			<div id="main_content">
				<!--<div class="subHeader" style="text-align: left;">see what kind of <img style="vertical-align: middle" height="55" src="images/projects.png" /> we're working on</div>-->
				<div><div class="subHeader" style="display: inline-block;">Projects</div></div>

				<!--PROJECTS -->
					<form method="get" action="projects.php">
					<div class="filters" style="position: relative; margin-top: 5px;">
					<div style="color: #444444; font-size: 15px; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block">Topics</div>
					<select name="tags" style="position: absolute; left: 175px;" onchange="submit();">
						<option value="">All</option>
						<?php
						$tag_query = "SELECT tag from project_tags GROUP BY tag ORDER BY tag";
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
					<?php
					/*
						$tag_result = mysql_query("SELECT tag FROM project_tags GROUP BY tag");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 450px; font-size: 15px; float: left;\">";
							echo "<div style=\"color: #444444; display: inline-block; padding: 6px; font-weight: bold;\">Categories</div>";
                                               	//echo "<a href=\"projects.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
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
                                                	echo "<a href=\"projects.php?tags=".$taglist."\"><span $tagstyle class=\"tag_nav\">".$tagselect.$tag_row[0]."</span></a>";
                                        	}
						echo "</div>";
						/*
						$tag_result = mysql_query("SELECT collaboratorid,project_collaborators.projectid,collaborators.name FROM project_collaborators LEFT JOIN collaborators ON collaborators.id=project_collaborators.collaboratorid GROUP BY collaboratorid");
                                        	//$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 450px; font-size: 15px; float: left; margin-left: 10px;\">";
						echo "<div style=\"color: #444444; display: inline-block; padding: 6px; font-weight: bold;\">Collaborators</div>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
                                                	echo "<a href=\"projects.php?collaborators=".$tag_row[0]."\"><div class=\"tag_nav\">".$tag_row[2]."</div></a>";
                                        	}
						echo "</div>";
						*/
					?>
					<div style="height: 50px; clear: both"></div>
					<?php 
						if (isset($_GET['tags'])){
							getProjectListSpecial($_GET['tags']); 
						} else {
							getProjectListSpecial();
						}
					?>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
