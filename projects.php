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
	//echo "<div style=\"font-size: 30px; color: #97a93a\">".$t."</div>";
	global $tag_array;
	$projtag = "";
	if ($t){
		$projtag = "WHERE ";
		for ($i = 0; $i < sizeof($tag_array); $i++){
			if ($i > 0){
				$projtag .= " OR ";
			}
			$projtag .= "project_tags.tag = '".$tag_array[$i]."'";
		}
	}	
	$countsize = sizeof($tag_array);
	//$query = "SELECT distinct(title),createdate,summary,projects.id FROM project_tags RIGHT JOIN projects ON project_tags.projectid=projects.id $projtag ORDER BY createdate DESC";
	$query = "SELECT title, createdate, summary, projects.id, image, count(projects.id) FROM projects JOIN project_tags ON projects.id = project_tags.projectid $projtag GROUP BY id";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_row($result)){
		if ($row[5] == $countsize || $countsize == 1){
			echo "<div style=\"width: 440px; height: 110px; overflow: hidden; display: inline-block; margin: 10px; margin-bottom: 30px; position: relative;\">";
				echo "<div style=\"width: 180px; height: 110px; position: absolute; background-color: gray;\"><img alt=\"".$row[4]."\" src=\"".$row[4]."\" style=\"width: 180px; height: 110px; background-color: gray\" /></div>";
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
					echo "<div style=\"height: 83px; font-size: 13px; overflow: hidden;\">".preg_replace("/\n/", "<br/>", $row[2])."</div>";
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
				<div><div class="subHeader" style="display: inline-block;">Projects</div><div style="display: inline-block; margin-left: 30px;"><a href="projects.php">Show all</a></div></div>

				<!--PROJECTS -->
					<?php
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
									$tagselect = "<span class=\"tag_x\" >&#8855;</span>";
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
