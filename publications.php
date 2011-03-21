<?php
include("template.php");
$page = new webPage("SNAP: Publications", "publications.css", "publications");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
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
	//echo "<div style=\"font-size: 30px; color: #97a93a\">".$t."</div>";
	if ($t){
		$pubtag = "WHERE publication_tags.tag LIKE '%".$t."%'";
	}	
	$result = mysql_query("SELECT distinct(title),type,publications.id FROM publications LEFT JOIN publication_tags ON publications.id=publication_tags.publicationid $pubtag ORDER BY createdate DESC") or die(mysql_error());
	while ($row = mysql_fetch_row($result)){
		echo "<div style=\"width: 440px; height: 50px; overflow: hidden; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative;\">";
			echo "<div style=\"width: 50px; position: absolute; ;\">";
			$pubType = $row[1];
			global $pubImages;
			echo "<img src=\"images/".$pubImages[$pubType -1]."\" style=\"background-color: gray\" />";
			echo "</div>";
			echo "<div style=\"position: absolute; left: 60px; width: 380px;\">";
				echo "<div style=\"font-size: 15px; color: #111111; font-weight: bold; margin-bottom: 5px;\"><a style=\"color: #333333;\" href=\"publication_view.php?publicationid=".$row[2]."\">".$row[0]."</a></div>";
				
			echo "</div>";

		echo "</div>";
	}
}
?>
		<div id="main_body">
			<div id="main_content">
				<!--<div class="subHeader" style="text-align: left;">see what kind of <img style="vertical-align: middle" height="55" src="images/publications.png" /> we're working on</div>-->
				<div class="subHeader">Publications</div>
				<div style="width: 100%;">
					<div style="width: 440px; line-height: 25px; ">A variety of publications and presentations are produced as a result os SNAP's publication collaborations.  They are all available below.  The list can be narrowed by selecting from the options to the right.</div>
					<div style="float: right; width: 400px;">
					<?php
						$tag_result = mysql_query("SELECT tag FROM publication_tags GROUP BY tag");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 375px; font-size: 15px; \">";
							echo "<div style=\"color: #444444; display: padding: 6px; font-weight: bold; display: inline-block;\">Categories</div>";
                                               	//echo "<a href=\"publications.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
							$tagstyle = "";
							if ($_GET['tags'] == $tag_row[0]){
								$tagstyle = "style=\"background-color: #97a93a;\"";
							}
                                                	echo "<a href=\"publications.php?tags=".$tag_row[0]."\"><div $tagstyle class=\"tag_nav\">".$tag_row[0]."</div></a>";
                                        	}
						echo "</div>";

						$tag_result = mysql_query("SELECT distinct(collaborator) FROM publication_tags");
                                        	$tag_row = mysql_fetch_array($tag_result);
						echo "<div style=\"width: 375px; font-size: 15px; margin-top: 20px; \">";
							echo "<div style=\"color: #444444; display: inline-block; padding-right: 12px; font-weight: bold;\">Collaborators</div>";
                                               	//echo "<a href=\"publications.php?tags=".$tag_row[0]."\">".$tag_row[0]."</a>";
                                        	while ($tag_row = mysql_fetch_array($tag_result)){
                                                	echo "<a href=\"publications.php?tags=".$tag_row[0]."\"><div class=\"tag_nav\">".$tag_row[0]."</div></a>";
                                        	}
						echo "</div>";
					?>

					</div>

	
				</div>


				<!--PROJECTS -->

					<div style="height: 50px; clear: both"></div>
					<?php getPublicationListSpecial($_GET['tags']); ?>

			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
