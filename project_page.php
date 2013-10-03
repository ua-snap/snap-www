<?php
require_once 'template.php';
require_once 'src/ProjectResourceLink.php';

$page = new webPage("SNAP: Project", '', "projects");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>

        <div id="main_body">
            <div id="main_content">
                <?php
                    $query = "SELECT * FROM projects WHERE id='".$_GET['projectid']."' LIMIT 1";
                    $result = mysql_query($query);
                    $project = mysql_fetch_array($result);
                ?>
                
                <div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 200px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other Projects<span><a href="projects.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a>
                </div>

                <div style="width: 950px; margin: auto;">
                    <div style="float: left; width: 520px;">
                        <div style="color: #71797b; margin-left: 20px; font-size: 14px; margin-bottom: 5px;">Project</div>
                        <div style="font-size: 26px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['title']; ?></div>
                        <div style="font-size: 14px; line-height: 20px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;">
                        <?php 
                            //insert newlines only in raw text, not after html tags

                        $patterns = array("/>\n/", "/\n/");
                        $replacements = array(">", "<br />");

                        echo preg_replace($patterns, $replacements, $project['description']);
                        ?>
                        </div>
                        <div style="margin-left: 20px;">
                        <?php 
                            // Render links to resources, if any
                            $links = new ProjectResourceLink();
                            echo $links->getHtmlByProject($_GET['projectid']);
                        ?>
                        </div>
                    </div>
                    <div style="float: right; width: 330px;">

                        <div style="line-height: 20px;">
                            <div>
                                <img src="<?php echo $project['image']; ?>" style="width: 95%; border: 1px solid #6a7173; padding: 3px;" />
                            </div>
                            <?php 

                                $query = "SELECT collaborators.id,collaborators.name,collaborators.image FROM collaborators JOIN project_collaborators ON collaborators.id=project_collaborators.collaboratorid WHERE project_collaborators.projectid='".$_GET['projectid']."' ";

                                $result = mysql_query($query);
                                $result = mysql_query($query) or die (mysql_error());
                                if (mysql_num_rows($result) > 0){
                                    echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px; margin-bottom: 10px;\">Collaborators</div>";
                                    echo "<div>";
                                    while ($collab = mysql_fetch_array($result)){
                                        $size = getimagesize("images/collaborators/".$collab['image']);
                                        $width = $size[0];
                                        $height = $size[1];
                                        //echo $width." ".$height;
                                        if ($width > $height){
                                            $w = 100;
                                            $h = ($height * (100 / $width));
                                        } else {
                                            $h = 100;
                                            $w = ($width * (100 / $height));
                                        }
                                        $h .= "px";
                                        $w .= "px";
               
                                        echo "<div style=\"display: inline-block; margin-right: 15px; margin-bottom: 15px; margin-top: 15px; \">";

                                            echo "<div style=\"height: 100px; width: 150px; text-align: center;\">";

                                                echo "<a href=\"collaborators.php#org_".$collab['id']."\"><img alt=\"".$collab['name']."\" src=\"/images/collaborators/".$collab['image']."\" style=\"width: $w; height: $h; vertical-align: middle;\" /></a>";
                                            echo "</div>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }
                            ?>
                        </div>
                        <div>

                            <?php
                                $query = "SELECT people.id, title, first, last, organization FROM people JOIN project_personnel ON people.id = project_personnel.peopleid WHERE project_personnel.projectid = '".$project['id']."' AND scientist=true";
                                $result = mysql_query($query) or die (mysql_error());
                                if (mysql_num_rows($result) > 0){
                                    echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px;\">Primary Scientists</div>";
                                    echo "<div>";
                                    while ($sci = mysql_fetch_array($result)){
                                        $fullname = $sci['title']." ".$sci['first']." ".$sci['last'];
                                        echo "<div style=\"margin-top: 5px;\"><a href=\"people_page.php?id=".$sci['id']."\">".$fullname."</a> (".$sci['organization'].")</div>";
                                    }
                                    echo "</div>";
                                }
                            ?>
                        </div>
                        <div>
                            <?php
                                $query = "SELECT people.id, title, first, last, email, phone FROM people JOIN project_personnel ON people.id = project_personnel.peopleid WHERE project_personnel.projectid = '".$project['id']."' AND contact=true";
                                $result = mysql_query($query) or die (mysql_error());
                                if (mysql_num_rows($result) > 0){
                                    echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px;\">Contacts</div>";
                                    echo "<div>";
                                    while ($con = mysql_fetch_array($result)){

                                        $fullname = $con['title']." ".$con['first']." ".$con['last'];
                                        echo "<div style=\"margin-bottom: 15px;\">";
                                        echo "<div style=\"margin-top: 5px;\"><a href=\"people_page.php?id=".$con['id']."\">".$fullname."</a></div>";

                                        echo "<div style=\"margin-top: 5px;\"><a href=\"mailto:$con[email]\">".$con['email']."</a></div>";
                                        echo "<div style=\"margin-top: 5px;\">".preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $con['phone'])."</div>";
                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
    
    
            </div>
        </div>
<?php
$page->closePage();
?>
