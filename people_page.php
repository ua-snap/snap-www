<?php
include("template.php");
$page = new webPage("SNAP: People", "", "about", 'People');
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>
        <div id="main_body">
            <div id="main_content">
                <?php
                    $query = "SELECT id, image, title, first, middle, last, position, organization, staffgroup, email, phone, fax, summary FROM people WHERE id='".$_GET['id']."' LIMIT 1";
                    $result = mysql_query($query) or die(mysql_error());
                    $row = mysql_fetch_array($result);
                    $fullname = trim($row['title']." ".$row['first']." ".$row['last']);
                ?>
                <div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 200px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other People<span><a href="people.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a></div>
                <div style="font-size: 28px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $fullname; ?></div>
                <div style="font-size: 14px; margin-left: 20px; "><?php echo $row['position']; ?></div>

                <div style="width: 850px; margin: auto; margin-top: 30px;">
                    <div style="float: left; width: 206px; text-align: center;">
                        <div><img style="border: 1px solid #6a7173;padding: 3px;" src="/images/people/<?php echo $row['image']; ?>" /></div>
                        <div style="margin-top: 20px; color: #336699;"><?php echo $row['email']; ?></div>
                        <?php if ($row['phone']){ ?>
                        <div style="margin-top: 5px;">phone: <?php echo preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $row['phone']); ?></div>
                        <?php } ?>
                        <?php if ($row['fax']){ ?>
                        <div style="margin-top: 5px;">fax: <?php echo preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $row['fax']); ?></div>
                        <?php } ?>
                    </div>
                    <div style="float: right; width: 575px;">
                        <?php
                            $summary_string = preg_replace("/(.*)\r?\n+(.*)/", "$1</p><p>$2", $row['summary']);
                            $summary_string = preg_replace("/^(.*)/", "<p>$1", $summary_string);
                            $summary_string = preg_replace("/(.*)$/", "$1</p>", $summary_string) ;

                        ?>
                        <div style="line-height: 20px;"><?php echo $summary_string; ?></div>
                    </div>
                </div>
                <!--
                <div style="width: 850px; margin: auto; clear: both; padding-top: 100px;">
                    <div style="font-size: 20px; text-align: center; padding-bottom: 20px; border-bottom: 1px solid #6a7173;">Publications</div>
                -->
                </div>
            </div>
<?php
?>
        </div>
    </div>
<?php
$page->closePage();
?>
