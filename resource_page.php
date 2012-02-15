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

$resourceObject = Resource::fetchById($_GET['resourceid']);

?>

        <div id="main_body">
            <div id="main_content">
            
                <?php
                    $query = "SELECT * FROM resources WHERE id='$resourceid' LIMIT 1";
                    $result = mysql_query($query);
                    $resource = mysql_fetch_array($result);
                ?>
                
                <div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 215px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other Resources<span><a href="resources.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a></div>

                <div id="resourceWrapper" style="width: 950px; margin: auto;">
                    <div style="float: left; width: 520px;">
                        <div style="color: #71797b; margin-left: 20px; font-size: 14px; margin-bottom: 5px;"><?php echo $resTypes[$resource['type'] - 1]; ?></div>
                        <div style="font-size: 26px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $resource['title']; ?></div>
                        <?php
                            echo $resourceObject->render(); // only applies to video type, is no-op for other things 
                        ?>
                        <div style="font-size: 14px; line-height: 20px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo nl2br($resource['summary']); ?></div>

                        <?php
                            
                            $att_query = "SELECT * FROM attachments WHERE resourceid='$resourceid' ORDER BY sortorder, category, name ASC, id";
                            $att_result = mysql_query($att_query);

                            echo $resourceObject->renderDownloadsTitle(); // so we can suspend the title if needed

                            echo "<div style=\"margin-left: 20px; margin-top: 10px;\">";

                            echo $resourceObject->renderDownloads();

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

                            ?>

                        </div>

                    </div>
                </div>
    
    
            </div>
        </div>
<?php
$page->closePage();
?>
