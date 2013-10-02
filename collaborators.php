<?php

require_once 'src/Collaborators.php';

include("template.php");
$page = new webPage("SNAP: Collaborators", "", "about", 'Collaborators');
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">
            <div id="main_content">
                <div class="subHeader" style="margin-bottom: 10px;">Collaborators</div>
                <div>
                    <img src="images/collaborators01.jpg" style="float: left; margin-right: 15px; height: 240px; margin-bottom: 50px; padding: 3px; border: 1px solid #999999;" />
                    <p>Collaborations with the Bureau of Land Management, National Park Service, U.S. Fish and Wildlife Service, U.S. Geological Survey, Alaska Department of Fish and Game, multiple non-profit organizations, and many others have yielded scenario projections of shifting ecosystems that will aid in planning future resource, land, and wildlife management.  A variety of SNAP services and approaches make information accessible to a wide spectrum of stakeholders with varying levels of technical expertise.</p>
                    <p>SNAP continues to build a powerful collaborative network of key scientific, social and economic institutions from around the world, applying the combined expertise towards a better understanding of the future dynamics of the Arctic. <a href="people.php#contact">Contact</a> us if you are interested in joining the SNAP network.</p>
                </div>
                <div style="clear: both; margin-top: 40px;">    
                <?php

                    $collaborators = new Collaborators();
                    $result = $collaborators->fetch();

                    foreach($result as $row) {
                        $size = getimagesize("images/collaborators/".$row['image']);
                        $width = $size[0];
                        $height = $size[1];

                        if ($width > $height){
                            $w = 80;
                            $h = ($height * (80 / $width));
                        } else {
                            $h = 80;
                            $w = ($width * (80 / $height));
                        }
                        $h .= "px";
                        $w .= "px";
                        echo "<div style=\"display: inline-block; width: 80px; height: 80px; margin-right: 25px; margin-left: 25px; text-align: center;\"><a href=\"$row[website]\"><img style=\"vertical-align: middle; width: $w; height: $h;\" src=\"images/collaborators/".$row['image']."\"  /></a></div>";
                        $mime = mime_content_type("images/collaborators/".$row['image']);
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
<?php
$page->closePage();
?>
