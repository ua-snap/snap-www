<?php
include("template.php");
$page = new webPage("SNAP: Collaborators", "", "about");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader" style="margin-bottom: 10px;">Collaborators</div>
				<div style="margin-bottom: 20px;width: 500px; line-height: 22px;">We are building a powerful collaborative network of key scientific, social and economic institutions from around the world, applying the combined expertise towards a better understanding of the future dynamics of the Arctic.  <a href="people.php#contact">Contact us</a> if you are interested in joining or utilizing SNAP.</div>
				<div>	
				<?php
					$query = "SELECT * FROM collaborators ORDER BY name";
					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result)){
						$size = getimagesize("images/collaborators/".$row['image']);
						$width = $size[0];
						$height = $size[1];
						//echo $width." ".$height;
						if ($width > $height){
							$w = 80;
							$h = ($height * (80 / $width));
						} else {
							$h = 80;
							$w = ($width * (80 / $height));
						}
						$h .= "px";
						$w .= "px";
						echo "<div style=\"display: inline-block; width: 80px; height: 80px; margin-right: 25px; margin-left: 25px; text-align: center;\"><a href=\"#org_".$row['id']."\"><img style=\"vertical-align: middle; width: $w; height: $h;\" src=\"images/collaborators/".$row['image']."\"  /></a></div>";
						$mime = mime_content_type("images/collaborators/".$row['image']);
					}
				?>
				</div>
				<?php
					$query = "SELECT * FROM collaborators ORDER BY name";
					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result)){
					?>
						<div style="clear: both; width: 800px; margin: auto; margin-top: 50px;"><a name="org_<?php echo $row['id']; ?>"></a>
							<div style="float: left; margin-bottom: 50px;"><img style="width: 150px;" src="/images/collaborators/<?php echo $row['image']; ?>" /></div>
							<div style="float: right; width: 600px; font-size: 20px; margin-bottom: 50px;">
								<div><?php echo $row['name']; ?></div>
								<div style="margin-top: 5px; margin-bottom: 5px; color: #6a7173; font-size: 14px;"><?php echo $row['city'].", ".$row['state']." ".$row['country']; ?></div>
								<div style="font-size: 14px;"><a href="<?php echo $row['website']; ?>">go to their website</a></div>
								<?php 
									$proj_query = "SELECT * FROM projects JOIN project_collaborators ON projects.id = project_collaborators.projectid WHERE project_collaborators.collaboratorid = '".$row['id']."' LIMIT 1";
									$proj_result = mysql_query($proj_query);
									if (mysql_num_rows($proj_result) > 0){
										echo "<div style=\"font-size: 16px; color: #999999; margin-top: 20px; margin-bottom: 5px;\">Recent Project Collaborations</div>";
									}
									while ($proj = mysql_fetch_array($proj_result)){
										echo "<div style=\"clear: both;\">";
										echo "<div style=\"float: left; margin-right: 15px;\"><img src=\"".$proj['image']."\" style=\"border: 1px solid #6a7173; padding: 3px;width: 200px;\" /></div>";
										echo "<div style=\"font-size: 14px; margin-bottom: 10px;\"><a href=\"project_page.php?projectid=".$proj['id']."\">".$proj['title']."</a></div>";
										echo "<div style=\"font-size: 14px; color: #222222;\">".substr($proj['summary'], 0, 140)."</div>";
										echo "</div>";
									}
								?>

							</div>
						</div>
					<?php
					}
				?>
			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
