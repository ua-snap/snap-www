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
                <div>
                    <img src="images/collaborators01.jpg" style="float: left; margin-right: 15px; height: 240px; margin-bottom: 5px; padding: 3px; border: 1px solid #999999;" />
                    <p>Since 2008, SNAP has teamed up with the Alaska Center for Climate Change Adaptation and Policy (<a href="collaborators.php#org_2">ACCAP</a>) to provide Alaskans with the climate change science and understanding required to effectively plan for the future and the inherent uncertainties of what lies ahead. This collaborative approach has not only yielded significant benefit for Alaska stakeholders, but has also enabled SNAP and ACCAP to leverage resources to the benefit of both organizations while preserving programmatic independence.  SNAP and ACCAP collaborate on multiple projects that are currently funded through the next 3-5 years. These projects help to: (1) strengthen collaborative ties between the two programs, which increases leveraging power, and (2) build capacity to develop, analyze, and communicate climate change data, research, and information.</p>
                    <p>Collaborations with the Bureau of Land Management, National Park Service, U.S. Fish and Wildlife Service, U.S. Geological Survey, Alaska Department of Fish and Game, multiple non-profit organizations, and many others have yielded scenario projections of shifting ecosystems that will aid in planning future resource, land, and wildlife management.  A variety of SNAP services and approaches make information accessible to a wide spectrum of stakeholders with varying levels of technical expertise.</p>
                    <p>SNAP and ACCAP continue to build a powerful collaborative network of key scientific, social and economic institutions from around the world, applying the combined expertise towards a better understanding of the future dynamics of the Arctic. <a href="people.php#contact">Contact</a> us if you are interested in joining the SNAP network.</p>
                </div>
                <!--
                <div style="font-size: 15px;margin-bottom: 20px;width: 500px; line-height: 22px;"><img src="images/snap_small.png" style="vertical-align: middle; height: 20px;" /> <span style="color: #6a7173; font-weight: bold;"></span> and <img src="images/accap_small.png" style="vertical-align: middle;" /> <span style="color: #336798; font-weight: bold;"></span> are building a powerful collaborative network of key scientific, social and economic institutions from around the world, applying the combined expertise towards a better understanding of the future dynamics of the Arctic.  <a href="people.php#contact">Contact us</a> if you are interested in joining or utilizing SNAP.</div>
                -->
                <div style="clear: both; margin-top: 40px;">    
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
                        <div style="clear: both; width: 800px; margin: auto; margin-top: 100px;">
                            <a name="org_<?php echo $row['id']; ?>"></a>
                            <div style="height: 50px;">&nbsp;</div>

                            <div style="float: left; margin-bottom: 100px;"><img style="width: 150px;" src="/images/collaborators/<?php echo $row['image']; ?>" /></div>
                            <div style="float: right; width: 600px; font-size: 20px; margin-bottom: 50px;">
                                <div><?php echo $row['name']; ?></div>
                                <div style="margin-top: 5px; margin-bottom: 5px; color: #6a7173; font-size: 14px;"><?php echo $row['city'].", ".$row['state']." ".$row['country']; ?></div>
                                <div style="font-size: 14px;"><a href="<?php echo $row['website']; ?>">go to their website</a></div>
                                <?php 
                                if ($row['description']){
                                    echo "<div style=\"font-size: 16px; margin-top: 5px;\">".$row['description']."</div>";
                                }
                                    $proj_query = "SELECT * FROM projects JOIN project_collaborators ON projects.id = project_collaborators.projectid WHERE project_collaborators.collaboratorid = '".$row['id']."'";
                                    $proj_result = mysql_query($proj_query);
                                    if (mysql_num_rows($proj_result) > 0){
                                        echo "<div style=\"font-size: 16px; color: #999999; margin-top: 20px; margin-bottom: 5px;\">Recent Project Collaborations</div>";
                                    }
                                    while ($proj = mysql_fetch_array($proj_result)){
                                        echo "<div style=\"clear: both;\">";
                                        //echo "<div style=\"float: left; margin-right: 15px;\"><img src=\"".$proj['image']."\" style=\"border: 1px solid #6a7173; padding: 3px;width: 200px;\" /></div>";
                                        echo "<div style=\"font-size: 14px; margin-bottom: 10px;\"><a href=\"project_page.php?projectid=".$proj['id']."\">".$proj['title']."</a></div>";
                                        //echo "<div style=\"font-size: 14px; color: #222222;\">".substr($proj['summary'], 0, 140)."</div>";
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
