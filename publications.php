<?php
include("template.php");
$page = new webPage("SNAP: Publications", "publications.css", "publications");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$tag_array;
$tag_array = split(",", $_GET['tags']);
$pubImages = array ( "pub_paper.png", "pub_report.png", "pub_presentation.png", "pub_video.png");
function getPublicationList(){
	$result = mysql_query("SELECT title,createdate,summary,id FROM publications ORDER BY createdate DESC");
	while ($row = mysql_fetch_row($result)){
		echo "<div style=\"margin-top: 20px; width: 600px;\">";
			echo "<div style=\"font-size: 20px; color: #6a7173;\"><a href=\"publication_view.php?publicationid=".$row[3]."\">".$row[0]."</a></div>";
			echo "<div style=\"position: relative; height: 15px; margin-bottom: 5px;\">";
				echo "<div style=\" position: absolute; font-size: 12px; color: #444444;\">Created: ".$row[1]."</div>";
				echo "<div style=\"position: absolute; margin-left: 150px; font-size: 12px;\"> Topics: ";
				$tag_result = mysql_query("SELECT tag FROM publication_tags WHERE publicationid='".$row[3]."'");
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
function getPublicationListSpecial($t){
	global $tag_array;
	$pubtag = "";
	if ($t){
		$pubtag = "WHERE ";
		for ($i = 0; $i < sizeof($tag_array); $i++){
			if ($i > 0){
				$pubtag .= " OR ";
			}
			$pubtag .= "publication_tags.tag = '".$tag_array[$i]."'";
		}
	}
	//echo "<div style=\"font-size: 30px; color: #97a93a\">".$t."</div>";
	//if ($t){
	//	$pubtag = "WHERE publication_tags.tag LIKE '%".$t."%'";
	//}	

	$countsize = sizeof($tag_array);
	//$query = "SELECT distinct(title),createdate,summary,projects.id FROM project_tags RIGHT JOIN projects ON project_tags.projectid=projects.id $projtag ORDER BY createdate DESC";
	$query = "SELECT title,type,publications.id,summary,count(publications.id) FROM publications LEFT JOIN publication_tags ON publications.id=publication_tags.publicationid $pubtag GROUP BY id";
	//echo $query;
	$result = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_row($result)){

		if ($row[4] == $countsize || $countsize == 1){

		echo "<div id=\"pub_box_".$row[2]."\" style=\"width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; \">";

			$pubType = $row[1];
			global $pubImages;

			echo "<div id=\"pub_hover_".$row[2]."\" style=\"left: 0px; top: 0px; position: absolute; z-index: 100; display: none; background-color: #d8d8d8; border: 1px solid #444444; width: 440px; \">";
				echo "<div style=\"float: left;\">";
					echo "<img src=\"images/".$pubImages[$pubType -1]."\" style=\"margin: 5px;\" />";
				echo "</div>";
				echo "<div style=\"float: left; width: 360px;\">";
					echo "<div style=\"font-size: 15px; color: #111111; font-weight: bold; margin-top: 5px; margin-bottom: 5px;\"  \"><a style=\"color: #333333;\" href=\"publication_view.php?publicationid=".$row[2]."\">".$row[0]."</a></div>";
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
				echo "<div style=\"clear: both; width: 420px; padding: 10px;\">".$row[3]."</div>";

			echo "</div>\n";
			echo "<div style=\"width: 50px; position: absolute; z-index: 1;\">";

			echo "<img src=\"images/".$pubImages[$pubType -1]."\" style=\"\" />";
			echo "</div>";
			echo "<div style=\"position: absolute; left: 60px; width: 380px;\">";
				echo "<div style=\"font-size: 15px; color: #111111; font-weight: bold; margin-bottom: 5px;\"  \"><a style=\"color: #333333;\" href=\"publication_view.php?publicationid=".$row[2]."\">".$row[0]."</a></div>";

				

			echo "</div>";



			echo "<script>\n";
				echo "$('#pub_box_".$row[2]."').hover(\n";
					echo "function(){ $('#pub_hover_".$row[2]."').show(500); },\n";
					echo "function(){ $('#pub_hover_".$row[2]."').hide(0); }\n";

				echo ");\n";
				//echo "$('#pub_box_".$row[2]."').mouseout(function(){\n";
				//	echo "$('#pub_hover_".$row[2]."').hide();\n";
				//echo "});\n";
			echo "</script>\n";

		echo "</div>";
		}
	}
}
?>
		<script src="js/publications.js" type="text/javascript"></script>
		<div id="main_body">
			<div id="main_content">
				<!--<div class="subHeader" style="text-align: left;">see what kind of <img style="vertical-align: middle" height="55" src="images/publications.png" /> we're working on</div>-->
				<div class="subHeader">Publications</div>



					<div style="float: right; width: 400px;">
					<?php
						//Tags
						$tag_result = mysql_query("SELECT tag FROM publication_tags GROUP BY tag");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 375px; font-size: 15px; float: left;\">";
							echo "<div style=\"color: #444444; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block\">Categories</div><div style=\"display: inline-block; margin-left: 30px;\"><a href=\"publications.php?tags=\">Show all</a></div>";
							echo "<div></div>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
							$taglist = $_GET['tags'];
							$tagstyle = "";
							$tagflag = 0;
							for ($i = 0; $i < sizeof($tag_array); $i++){
								if ($tag_array[$i] == $tag_row[0]){
									$tagstyle = "style=\"background-color: #97a93a;\"";
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
                                                	echo "<a href=\"publications.php?tags=".$taglist."\"><div $tagstyle class=\"tag_nav\">".$tag_row[0]."</div></a>";
                                        	}
						echo "</div>";
						//Collaborators
						$coll_query = "SELECT collaborators.id,collaborators.name FROM collaborators LEFT JOIN publication_collaborators ON collaborators.id=publication_collaborators.collaboratorid GROUP BY collaboratorid";
						$coll_result = mysql_query($coll_query);
                                        	$coll_row = mysql_fetch_array($coll_result);
						echo "<div style=\"width: 375px; font-size: 15px; margin-top: 20px; margin-bottom: 50px;\">";
							//echo "<div style=\"color: #444444; display: inline-block; padding-right: 12px; font-weight: bold;\">Collaborators</div>";
							echo "<div style=\"color: #444444; margin-bottom: 6px; margin-left: 6px; font-weight: bold; display: inline-block\">Collaborators</div><div style=\"display: inline-block; margin-left: 30px;\"><a href=\"publications.php?coll=\">Show all</a></div>";
                                               	//echo "<a href=\"publications.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
						echo  "<div></div>";
                                        	while ($coll_row = mysql_fetch_array($tag_result)){
                                                	echo "<a href=\"publications.php?coll=".$coll_row[0]."\"><div class=\"tag_nav\">".$coll_row[1]."</div></a>";
                                        	}
						echo "</div>";
					?>

					</div>
					<div>
						<div style="width: 440px;line-height: 25px; ">A variety of publications and presentations are produced as a result os SNAP's publication collaborations.  They are all available below.  The list can be narrowed by selecting from the options to the right.</div>
						<div style="margin-top: 40px;"><?php getPublicationListSpecial($_GET['tags']); ?></div>
					</div>


	


				<!--PROJECTS -->


				<div style="height: 50px; clear: both"></div>


			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
