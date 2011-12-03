<?php

require_once 'src/Config.php';
require_once 'src/Template.php';

class webPage {
    private $pageTitle;
    private $stylesheet;
    private $menu;
    public $SITE = "http://www.snap.uaf.edu"; //TODO: move to configuration

    public function __construct($t, $s, $m){
        $this->pageTitle = $t;
        $this->stylesheet = $s;
        $this->menu = $m;
        $this->template = new Template();
    }

    public function connectToDatabase(){ //TODO:move to configuration

         if( !mysql_connect(Config::$database['host'], Config::$database['user'], Config::$database['pass'])) {
            mysql_error();  
            die("Unable to Connect to Database");   //TODO: make logging happen?
        } 

        mysql_select_db(Config::$database['database']);
    }
    private function mainMenu(){ ?>
        <div class="menu">
        <?php
            $menu_items = array(
                array("About","/about.php"),
                array("Maps &amp; Data","/data.php"),
                array("Methods","/methods.php"),
                array("Projects","/projects.php"),
                array("Resources","/resources.php"),
            );
            //Draw the main menu
            for ($i =0; $i < sizeof($menu_items); $i++){
                $x = preg_replace("/(\w+).*/", "$1", $menu_items[$i][1]);
                echo "<div style=\"display: inline-block; float: left; height: 45px; position: relative; margin-right: 20px; margin-left: 20px;\">";
                    echo "<div style=\"height: 25px;\"><a ";
                    //If selected, menu option changes color
                    if (("/".basename($_SERVER['PHP_SELF']) == $menu_items[$i][1] || "/".$this->menu == $x)){ // && $menu_items[$i][1] == "about.php"){
                        echo "style=\"color: black;\"";
                    }
                    //If selected, arrow is displayed for current selection 
                    echo " href=\"".$menu_items[$i][1]."\" >".$menu_items[$i][0]."</a></div><div style=\"text-align: center; height: 22px; ";
                    if (("/".basename($_SERVER['PHP_SELF']) == $menu_items[$i][1] || "/".$this->menu == $x)){ // && $menu_items[$i][1] == "about.php"){
                        echo "background-image: url('/images/current_arrow.png'); background-position: center bottom; background-repeat: no-repeat;";
                        //echo "<img alt=\"Current Selection\" src=\"/images/current_arrow.png\" style=\"vertical-align: bottom;\" />";
                    }
                    echo "\" ></div>";
                echo "</div>";
            }
            echo "<div style=\"clear: both;\"></div>";
         ?>

        </div>
    <?php 
    }
    public function openPage(){ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->pageTitle; ?></title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" /> 
        <link rel="stylesheet" href="/css/style.css" type="text/css" />
    <?php 

        if (isset($this->stylesheet)){ 
            echo "<link rel=\"stylesheet\" href=\"/css/$this->stylesheet\" type=\"text/css\" />"; 
        }

        // Dump Javascript from src/Template.php wrapper class.
        echo $this->template->getHeadJavascript();

        ?>
        <link rel="shortcut icon" href="/images/snap.ico" />
    
    </head>
    <body>

        <?php
    }
    public function pageHeader() { ?>    
        <div id="betabar">Thanks for visiting the <strong>beta version</strong> of the new SNAP web page!</div>

        <div id="header">
            <a name="top"/>
            <a href="/"><span id="header_left"><img src="/images/snap_acronym_rgb.png" height="90px" alt="SNAP Acronym Logo" /></span></a>
            <div id="header_right">
                <div><a href="/"><img src="/images/snap_full.png" height="30px" alt="Scenarios Network for Alaska Planning" /></a></div>
                <?php
                if (basename($_SERVER['PHP_SELF']) != "index.php") {
                ?>

                    <div id="motto">Exploring our future in a changing Arctic</div>
                    <script type="text/javascript">

                    $('#header_right').hoverIntent({ 
                        over: function(){ $('#motto').fadeIn(500); },
                        interval: 100,
                        out: function(){ $('#motto').fadeOut(500); } 
                    });

                    </script>
        <?php   }   ?>
            </div>
        </div>      
                <?php $this->mainMenu(); ?>
        <div id="subbar" style="width: 975px; height: 35px; margin-top: 15px; margin: auto;" class="horiz_bar">
            <div class="horiz_bar_left">
        <?php
        if ($this->menu){
            $this->drawSubMenu($this->menu);
        } else {
            echo "<div id=\"tagline\">Exploring our future in a changing Arctic</div>";
        }
        ?>
            </div>
            <div class="horiz_bar_right">   
                <a class="addthis_button"><img src="/images/share.png" style="margin: auto; padding-top: 3px; display: block;" alt="Share"/></a>
            </div>
        </div>
        <div style="color: #999999; width: 975px; margin: auto; text-align: right; padding-top: 10px;" class="contactbar"><a href="/people.php#contact">contact</a> | <span title="Not implemented yet">sitemap</span> | <span title="Not Implemented Yet">search</span></div>
        <?php
    }
    public function pageFooter(){ ?>

        <div id="footer" style="clear: both">
            <div id="socialbar">
                <span style="font-weight: bold; margin-left: 20px;">Follow us</span>
                <span style="margin-left: 40px;"><a href="http://www.facebook.com/pages/SNAP-and-ACCAP/112992248723524?v=wall">facebook</a></span>
                <span style="margin-left: 40px;"><a href="http://twitter.com/#!/SNAPandACCAP">twitter</a></span>
                <span style="margin-left: 40px;"><a href="http://dev.snap.uaf.edu/blog/?feed=rss2">blog rss</a></span>
            </div>
            <div id="footbar">
                <div class="horiz_bar_left" style="color: #eeeeee; relative; font-size: 10px;">
                    <div style="position: absolute; margin-left: 20px; text-align: left; ">
                        <div id="twitter_update_list"></div>
                        <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/SNAPandACCAP.json?callback=twitterCallback2&amp;count=1"></script>
                    </div>
                </div>
                <div class="horiz_bar_right">
                    <a class="addthis_button"><img src="/images/share.png" style="margin: auto; padding-top: 3px; display: block;" alt="Share"/></a>
                </div>
            </div>
            <div style="text-align: left; margin-left: 50px;"><img src="/images/bottom_bubble.png" alt="Bubble Graphic" /></div>
            <div style="margin-bottom: 20px; ">
                <div style="float: left; margin-right: 40px;">
                    <div><a href="/"><img src="/images/snap_acronym_rgb.png" height="53px" alt="SNAP Acronym Logo" /></a></div>
                    <div class="contactbar" style="text-align: right;"><a href="/people.php#contact">contact</a> | <span title="Not implemented yet">sitemap</span> | <span title="Not implemented yet">search</span></div>
                </div>
                <div style ="float: left; width: 450px; text-align: left; margin-top: 13px;"><?php echo 'V'.SNAPWEB_VERSION; ?> Copyright &copy; 2011 <a href="/" style="color: #222222; text-decoration: underline;">Scenarios Network for Alaska &amp; Arctic Planning</a>, a research institute of the <a href="http://www.uaf.edu" style="color: #222222; text-decoration: underline;">University of Alaska Fairbanks</a>.  UAF is an affirmative action/equal opportunity employer and educational institution.</div>
                <div><a href="http://www.uaf.edu"><img src="/images/UAFLogo_A_black_horiz.png" height="55px" style="margin-top: 13px;" alt="UAF Logo" /></a></div>
            </div>
            <div style="height: 50px;"></div>
        </div>
    <?php
    }

    public function closePage(){
        ?>
        <?php $this->pageFooter(); ?>
            </body>
        </html>
        <?php
    }

    public function drawSubMenu($menu_value){
        // Dump content from src/Template.php wrapper script
        echo $this->template->getSubMenu($menu_value);
    }
}
?>
