<?php
require_once "src/Resource.php";
require_once "src/ProjectResourceLink.php";

include("template.php");
$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$resTypes = array ( "Paper", "Report", "Presentation", "Video");
$resourceid = $_GET['resourceid'];

$resource = Resource::fetchById($_GET['resourceid']);

?>

        <div id="main_body">
            <div id="main_content">
                <?php
                    $query = "SELECT * FROM resources WHERE id='$resourceid' LIMIT 1";
                    $result = mysql_query($query);
                    $project = mysql_fetch_array($result);
                ?>
                
                <div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 215px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other Resources<span><a href="resources.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a></div>

                <div id="resourceWrapper" style="width: 950px; margin: auto;">
                    <div style="float: left; width: 520px;">
                        <div style="color: #71797b; margin-left: 20px; font-size: 14px; margin-bottom: 5px;"><?php echo $resTypes[$project['type'] - 1]; ?></div>
                        <div style="font-size: 26px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['title']; ?></div>
                        <div style="font-size: 14px; line-height: 20px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo nl2br($project['summary']); ?></div>

                        <?php

                            echo $resource->render(); // only applies to video type, is no-op for other things 
                            
                            $att_query = "SELECT * FROM attachments WHERE resourceid='$resourceid' ORDER BY sortorder, category, name ASC, id";
                            $att_result = mysql_query($att_query);
                            echo "<div style=\"color: #242d2f; margin-left: 20px; font-size: 22px; \">Downloads</div>";
                            echo "<div style=\"margin-left: 20px; margin-top: 10px;\">";

                            echo $resource->renderDownloads();

                            $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
                            $category;
                            while ($attachment = mysql_fetch_array($att_result)){
                                if ($attachment['category']){
                                    if ($category != $attachment['category']){
                                        $category = $attachment['category'];
                                        echo "<div style=\"margin-top: 15px; font-size: 18px;\">$category</div>";
                                    }
                                }
                                $file_size = filesize("attachments/".$attachment['filename']);
                                $file_size = round($file_size/pow(1024, ($i = floor(log($file_size, 1024)))), $i > 1 ? 2 : 0) . $sizes[$i]; 
                                $mime = "images/filetypes/".preg_replace("/.*\/(.*)/", "$1", mime_content_type("attachments/".$attachment['filename'])).".gif";
                                echo "<div><a href=\"attachments/".$attachment['filename']."\">".$attachment['name']." </a> <img src=\"$mime\" style=\"vertical-align: middle;\" /> ($file_size)";
                                if ($attachment['lowres']){
                                    $lowres_size = filesize("attachments/".$attachment['lowres']);
                                    $lowres_size = round($lowres_size/pow(1024, ($i = floor(log($lowres_size, 1024)))), $i > 1 ? 2 : 0) . $sizes[$i];   
                                    echo "<div style=\"margin-top: 2px; margin-left: 20px;\">Or click for a <a href=\"attachments/".$attachment['lowres']."\">low res version</a> ($lowres_size)</div>";
                                }
                                echo "</div>";
                            }
                            echo "</div>";
                        ?>
                    </div>
                    <div style="float: right; width: 330px;">

                        <div style="line-height: 20px;">

                            <?php 

                                // Render links to projects, if any
                                $links = new ProjectResourceLink();
                                echo $links->getHtmlByResource($_GET['resourceid']);

                                $query = "SELECT collaborators.id,collaborators.name,collaborators.image FROM collaborators JOIN resource_collaborators ON collaborators.id=resource_collaborators.collaboratorid WHERE resource_collaborators.resourceid='".$_GET['resourceid']."' ";


                                $result = mysql_query($query);
                                $result = mysql_query($query) or die (mysql_error());
                                if (mysql_num_rows($result) > 0){
                                    echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px; margin-bottom: 10px;\">Collaborators</div>";
                                    echo "<div>";
                                    while ($collab = mysql_fetch_array($result)){
                                        $size = getimagesize("images/collaborators/".$collab['image']);
                                        $width = $size[0];
                                        $height = $size[1];
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
                                $query = "SELECT people.id, title, first, last, email, phone FROM people JOIN project_personnel ON people.id = project_personnel.peopleid WHERE project_personnel.projectid = '".$project['id']."' AND contact=true";
                                $result = mysql_query($query) or die (mysql_error());
                                if (mysql_num_rows($result) > 0){
                                    echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px;\">Contacts</div>";
                                    echo "<div>";
                                    while ($con = mysql_fetch_array($result)){

                                        $fullname = $con['title']." ".$con['first']." ".$con['last'];
                                        echo "<div style=\"margin-bottom: 15px;\">";
                                        echo "<div style=\"margin-top: 5px;\"><a href=\"people_page.php?id=".$con['id']."\">".$fullname."</a></div>";

                                        echo "<div style=\"margin-top: 5px;\"><a href=\"\">".$con['email']."</a></div>";
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
