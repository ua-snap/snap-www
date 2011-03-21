<?php
include("template.php");
$page = new webPage("SNAP: Projects", "projects.css", "projects");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
function getProjectList(){
	$result = mysql_query("SELECT title,createdate,summary,id FROM projects ORDER BY createdate DESC");
	while ($row = mysql_fetch_row($result)){
		echo "<div style=\"margin-top: 20px; width: 600px;\">";
			echo "<div style=\"font-size: 20px; color: #6a7173;\"><a href=\"project_view.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
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
	
	$result = mysql_query("SELECT distinct(title),createdate,summary,projects.id FROM projects LEFT JOIN project_tags ON projects.id=project_tags.projectid WHERE project_tags.tag LIKE '%".$t."%' ORDER BY createdate DESC") or die(mysql_error());
	while ($row = mysql_fetch_row($result)){
		echo "<div style=\"width: 440px; height: 110px; overflow: hidden; display: inline-block; margin: 10px; margin-bottom: 30px; position: relative;\">";
			echo "<div style=\"width: 180px; height: 110px; position: absolute; background-color: gray;\"><img src=\"\" style=\"background-color: gray\" /></div>";
			echo "<div style=\"position: absolute; left: 190px; width: 250px;\">";
				echo "<div style=\"font-size: 13px; color: #111111; font-weight: bold; margin-bottom: 5px;\"><a style=\"color: #333333;\" href=\"project_view.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
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
?>
		<div id="main_body">
			<div id="main_content">
				<!--<div class="subHeader" style="text-align: left;">see what kind of <img style="vertical-align: middle" height="55" src="images/projects.png" /> we're working on</div>-->
				<div class="subHeader">Projects</div>

				<!--PROJECTS -->
					<?php
						$tag_result = mysql_query("SELECT tag FROM project_tags GROUP BY tag");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 375px; font-size: 15px; float: left;\">";
							echo "<div style=\"color: #444444; display: inline-block; padding: 6px; font-weight: bold;\">Categories</div>";
                                               	//echo "<a href=\"projects.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
							$tagstyle = "";
							if ($_GET['tags'] == $tag_row[0]){
								$tagstyle = "style=\"background-color: #97a93a;\"";
							}
                                                	echo "<a href=\"projects.php?tags=".$tag_row[0]."\"><div $tagstyle class=\"tag_nav\">".$tag_row[0]."</div></a>";
                                        	}
						echo "</div>";

						$tag_result = mysql_query("SELECT collaboratorid,project_collaborators.projectid,collaborators.name FROM project_collaborators LEFT JOIN collaborators ON collaborators.id=project_collaborators.collaboratorid GROUP BY collaboratorid");
                                        	//$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 450px; font-size: 15px; float: left; margin-left: 10px;\">";
						echo "<div style=\"color: #444444; display: inline-block; padding: 6px; font-weight: bold;\">Collaborators</div>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
                                                	echo "<a href=\"projects.php?collaborators=".$tag_row[0]."\"><div class=\"tag_nav\">".$tag_row[2]."</div></a>";
                                        	}
						echo "</div>";
					?>
					<div style="height: 50px; clear: both"></div>
					<?php getProjectListSpecial($_GET['tags']); ?>
			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
