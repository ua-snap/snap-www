<?php
include_once("template.php");
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
$page->connectToDatabase();
?>

                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"> </script>
                <script type="text/javascript" src="js/plugins.js"></script>
                <script type="text/javascript" src="js/maps.js"></script>
                <script type="text/javascript">
                    var currenthash = window.location.hash.substring(1).split("/");
                    var variable = currenthash[0];
                    var interval = currenthash[1];
                    var range = currenthash[2];
                    var scenario = currenthash[3];
                    var model = currenthash[4];
                    var resolution = currenthash[5];
                    var zoomlevel = currenthash[6];
                    var loclat = currenthash[7];
                    var loclng = currenthash[8];
                      google.maps.event.addDomListener(window, 'load', function(){
                        init(zoomlevel, loclat, loclng);
                        google.maps.event.addListenerOnce(map, 'idle', function(){
                            addMap();
                            google.maps.event.addListener(map, 'idle', function(){
                                writeHash();
                            });
                        });
                    });
                    $(window).resize(resize);
                    //google.maps.event.addListenerOnce(map, 'idle', addMap);
                </script>   
                <!--
                <div id="controls">
                    <input type="button" onclick="javascript:drawPoly();" value="Draw Polygon" class="btn" />
                    <input type="button" onclick="javascript:drawRectangle();" value="Draw Rectangle" class="btn" />
                </div>
                -->
                <?php

                    $v = "";
                    if ($_GET['v']){ $v = " WHERE variable='".mysql_real_escape_string($_GET['v'])."'"; }
                    $query = "SELECT variable FROM tileset $v GROUP BY variable";
                    $result = mysql_query($query) or die(mysql_error());
                    $variable = "";
                    if (mysql_num_rows($result) > 0){
                        $row = mysql_fetch_array($result);
                        $variable = $row['variable'];
                    }
                    $int = "";
                    if ($_GET['int']){ $int = mysql_real_escape_string($_GET['int']); }
                    $ran = "";
                    if ($_GET['ran']){ $ran = mysql_real_escape_string($_GET['ran']); }
                    $sce = "";
                    if ($_GET['sce']){ $sce = mysql_real_escape_string($_GET['sce']); }
                    $mod = "";
                    if ($_GET['mod']){ $mod = mysql_real_escape_string($_GET['mod']); }
                    $res = "";
                    if ($_GET['res']){ $res = mysql_real_escape_string($_GET['res']); }
                ?>  
                <div id="map_header" style="height: auto;">
                    <div style="margin-top: 0px; margin-bottom: 0px;">
                        <div style="float: left;"><img alt="Map Tool Logo" style="margin-top: 20px; margin-bottom: 20px; vertical-align: middle" src="images/logo_snap_maps_stats.png" /></div>
                        <div id="model_menu" style="float: left;">
                            <div id="snap_name" style="color: #505a5c; margin-left: 30px; font-size: 20px; margin-top: 40px;">Scenarios Network for Alaska &amp; Arctic Planning</div>  
                        <div id="menu_items" style="display: none; color: #505a5c; margin-left: 50px; font-size: 14px; margin-top: 10px;"></div>
                        <script type="text/javascript">
                            buildMenu(variable, interval, range, scenario, model, resolution);
                        </script>
                    </div>
                </div>
                        <script type="text/javascript">
                            $("#snap_name").hide();
                            $("#menu_items").show();
                            updateMenu();
                        </script>
                    <div class="map_bar" style="clear: both;">
                        <div style="float: left; margin-left: 20px; font-size: 20px;"><a href="">Main Menu</a></div>
                        <div style="float: right; margin-left: 20px; font-size: 20px; height: 38px; border-left: 4px solid #ffffff; background-color: #97A93A"><a class="addthis_button" style="color: #ffffff;"><img alt="Share" style="margin-left: 20px; margin-right: 20px;" src="/images/share.png" /></a></div>
                        <div style="float: right; margin-left: 20px; font-size: 14px;">
                            <span style="margin-right: 10px;">This Map: </span>
                            <!--
                            <span style="margin-right: 15px;"><a href="">Info</a></span>
                            <span style="margin-right: 15px;"><a href="">Stats</a></span>
                            -->
                            <span style="margin-right: 15px;"><a href="" onclick="window.print()">Print</a></span>
                            <span style="margin-right: 15px;"><a href="" >Link</a></span>
                        </div>
                    </div>
                </div>
                <div id="map_wrapper">
                    <div id="map_canvas"></div>
                    <div id="legend_wrapper">
                        <div id="legend_background"></div>
                        <div id="legend"></div> 
                    </div>
                    <div style="position: absolute; width: 300px; height: 50px; border: 1px solid #555555; right: 149px; top: 0px; background-color: #eeeeee;">
                        <div style="margin-top: 20px; margin-left: 20px;"><input style="text" style="width: 300px;" /></div>
                    </div>
                </div>
                <div id="map_footer">
                    <div class="map_bar">
                        <span style="float: left; margin-left: 20px; color: #333333;"><a href="">Help</a> | <a href="">About this tool</a></span>
                        <span style="float: right; margin-right: 20px; color: #333333;"><a href="http://www.uaf.edu"><img alt="UAF Logo" style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
                        <span style="float: right; margin-right: 35px; color: #333333;"><a href="http://dev.snap.uaf.edu"><img alt="SNAP Logo" src="images/snap_acronym_white.png" /></a></span>
                    </div>
                </div>
    </body>
</html>
<?php

//$page->closePage();
?>
