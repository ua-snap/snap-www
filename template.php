<?php

require_once 'src/Config.php';
require_once 'src/Template.php';

// Reused occasionally throughout the site.
function getFileSize($f){
    $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    $f = '.'.$f;
    $file_size = filesize($f);
    $file_size = round($file_size/pow(1024, ($i = floor(log($file_size, 1024)))), $i > 1 ? 1 : 0) . $sizes[$i]; 
    return $file_size;
}

class webPage {
    private $pageTitle;
    private $stylesheet;
    private $menu;
    private $submenu;

    public function __construct($t, $s, $m = null, $sm = null){
        $this->pageTitle = $t;
        $this->stylesheet = $s;
        $this->menu = $m;
        $this->submenu = $sm;
        $this->template = new Template();
    }

    public function connectToDatabase(){ //TODO:move to configuration

         if( !mysql_connect(Config::$database['host'], Config::$database['user'], Config::$database['pass'])) {
           // mysql_error();  
            die("Unable to Connect to Database");   //TODO: make logging happen?
        } 

        mysql_select_db(Config::$database['database']);
    }
    private function mainMenu(){ ?>
        <div class="menu">
        <?php
            $menu_items = array(
                array("About","/about.php"),
                array("Tools and Data","/datamaps.php"),
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
                    if (("/".basename($_SERVER['PHP_SELF']) == $menu_items[$i][1] || "/".$this->menu == $x)){
                        echo "style=\"color: black;\"";
                    }

                    //If selected, arrow is displayed for current selection 
                    echo " href=\"".$menu_items[$i][1]."\" >".$menu_items[$i][0]."</a></div><div style=\"text-align: center; height: 22px; ";
                    if (("/".basename($_SERVER['PHP_SELF']) == $menu_items[$i][1] || "/".$this->menu == $x)){ 
                        echo "background-image: url('/images/current_arrow.png'); background-position: center bottom; background-repeat: no-repeat;";
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
        <meta http-equiv=“X-UA-Compatible” content=“IE=8” />

        <meta name="author" content="Tom Kurkowski (takurkowski@alaska.edu)" />
        <meta name="author" content="Nancy Fresco (nlfresco@alaska.edu)" />
        <meta name="author" content="Alec Bennett (apbennett@alaska.edu)" />
        <meta name="author" content="Lena Krutikov (lkrutikov@alaska.edu)" />
        <meta name="author" content="Tracy Rogers (tsrogers@alaska.edu)" />
        <meta name="author" content="Tim Glaser" />
        <meta name="author" content="Craig Stephenson (cstephen@iarc.uaf.edu)" />
        <meta name="author" content="Bryce Melegari (bamelegari@alaska.edu)" />

        <link rel="stylesheet" href="/css/style.css" type="text/css" />
        <link type="text/css" href="css/custom-theme/jquery-ui-1.8.17.custom.css" rel="Stylesheet" />  
        <link type="text/css" href="css/customize-jquery-ui.css" rel="Stylesheet" />  
        <link rel="stylesheet" href="/css/licenseModal.css" type="text/css" />

    <?php 

        if (isset($this->stylesheet) && !empty($this->stylesheet)) { 
            echo "<link rel=\"stylesheet\" href=\"/css/$this->stylesheet\" type=\"text/css\" />"; 
        }

        // Dump Javascript from src/Template.php wrapper class.
        echo $this->template->getHeadJavascript();

        // include the maps-print.css after the maps.css so it has stronger precedence
        ?>
        <link type="text/css" href="css/maps-print.css" rel="stylesheet" media="print" />
        <link rel="shortcut icon" href="/images/snap.ico" />
    
    </head>
    <body>
        <?php
	
	include("src/licenseModal.php");    //implements the modal download popup used on several pages

    }
    public function pageHeader() { ?>    
 
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
            $this->drawSubMenu($this->menu, $this->submenu);
        } else {
            echo "<div id=\"tagline\">Exploring our future in a changing Arctic</div>";
        }
        ?>
            </div>
            <div class="horiz_bar_right">

<div class="social">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style sharewrapper" style="display: none;" >
<a class="addthis_button_email"><img src="images/email.png"/></a>    
<a class="addthis_button_facebook"><img src="images/facebook.png"/></a>
<a class="addthis_button_twitter"><img src="images/twitter-2.png"/></a>
<a class="addthis_button_google_plusone" g:plusone:size="standard" g:plusone:annotation="none"></a>
</div>
<!-- AddThis Button END -->

<a class="sharebutton">
    <img src="/images/share.png" style="margin: auto; padding-top: 4px; display: block;" alt="Share"/>
</a>

</div>

            </div>
        </div>
        <div style="color: #999999; width: 975px; margin: auto; text-align: right; padding-top: 10px;" class="contactbar"><a href="/people.php#contact">contact</a> | <a href="http://blog.snap.uaf.edu" rel="external">blog</a></div>
        <?php
    }
    public function pageFooter(){ ?>

        <div id="footer" style="clear: both">
            <div id="socialbar">
                <span style="font-weight: bold; margin-left: 20px;">Follow us</span>
                <span style="margin-left: 40px;"><a href="http://www.facebook.com/pages/SNAP-and-ACCAP/112992248723524?v=wall">facebook</a></span>
                <span style="margin-left: 40px;"><a href="http://twitter.com/#!/SNAPandACCAP">twitter</a></span>
                <span style="margin-left: 40px;"><a href="http://www.flickr.com/photos/snapandaccap/">flickr</a></span>
            </div>
            <div id="footbar">
                <div class="horiz_bar_left" style="color: #eeeeee; relative; font-size: 10px;">
                    <div style="position: absolute; margin-left: 20px; margin-top: 11px; text-align: left; ">
                        <ul id="twitter_update_list">
                        </ul>
                    </div>
                </div>
                <div class="horiz_bar_right">

<div class="social">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style sharewrapper" style="display: none;" >
<a class="addthis_button_email"><img src="images/email.png"/></a>
<a class="addthis_button_facebook"><img src="images/facebook.png"/></a>
<a class="addthis_button_twitter"><img src="images/twitter-2.png"/></a>
<a class="addthis_button_google_plusone" g:plusone:size="standard" g:plusone:annotation="none"></a>
</div>
<!-- AddThis Button END -->

<a class="sharebutton">
    <img src="/images/share.png" style="margin: auto; padding-top: 4px; display: block;" alt="Share"/>
</a>
</div>

                </div>
            </div>
            <div style="text-align: left; margin-left: 50px;"><img src="/images/bottom_bubble.png" alt="Bubble Graphic" /></div>
            <div id="pageFooterInfo" style="margin-bottom: 40px; min-height: 60px">
                <div style="float: left; margin-right: 40px;">
                    <div><a href="/"><img src="/images/snap_acronym_rgb.png" height="53px" alt="SNAP Acronym Logo" /></a></div>
                    <div class="contactbar" style="text-align: right;">
                        <a href="/people.php#contact">contact</a>
                        &nbsp;|&nbsp;
                        <a href="http://blog.snap.uaf.edu" rel="external">blog</a>
                        &nbsp;|&nbsp;
                        <a href="/terms.php">terms of use</a>
                    </div>
                </div>
                
                <div style ="float: left; width: 470px; text-align: left; margin-top: 13px;"><a id="snapWebVersion" href="/releases.php"><?php echo 'V'.SNAPWEB_VERSION; ?></a> Copyright &copy; 2013 <a href="/" style="color: #222222; text-decoration: underline;">Scenarios Network for Alaska &amp; Arctic Planning</a>, a research institute of the <a href="http://www.uaf.edu" style="color: #222222; text-decoration: underline;">University of Alaska Fairbanks</a>.  UAF is an affirmative action/equal opportunity employer and educational institution.

                <p>
                                    nlfresco@alaska.edu | tel 907.474.2405 | fax 907.474.7151<br/><br/>

                    <b>Mailing address:</b><br/>
                                        Scenarios Network for Alaska &amp; Arctic Planning<br/>
PO Box 757245<br/>
Fairbanks, Alaska 99775-7245<br/><br/>
                    <b>Physical address:</b><br/>
                                        International Arctic Research Center<br/>
                    930 Koyukuk Drive<br/>
Fairbanks, Alaska<br/>
<br/>
                </p>
                </div>
                <div class="logos" style="float: right;">
                    
                    <a href="http://www.iarc.uaf.edu/">
                        <img src="/images/IARC_logo_notext_trans.jpg" alt="IARC Logo" />
                    </a>

                    <a href="http://www.uaf.edu">
                        <img src="/images/UAFLogo.jpg" style="" alt="UAF Logo" />
                    </a>

                </div>
            </div>
            <div style="height: 50px;"></div>
        </div>
    <?php
    }

    public function closePage(){
        ?>
        <?php $this->pageFooter(); ?>
            </body>
            <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
            <script type="text/javascript" src="https://api.twitter.com/1/statuses/user_timeline.json?include_rts=true&amp;screen_name=SNAPandACCAP&amp;count=1&amp;callback=twitterCallback2"></script>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb8496858e19dd4"></script>


<script type="text/javascript">

$('.social').hover(
    function(e) {
        $('.sharebutton').fadeOut(200);
        $('.addthis_toolbox').fadeIn(200);
    },

    function(e) {
        $('.addthis_toolbox').fadeOut(200);
        $('.sharebutton').fadeIn(200);
    }
);

</script>

        </html>
        <?php
    }

    public function drawSubMenu($menu_value, $submenu){
        // Dump content from src/Template.php wrapper script
        echo $this->template->getSubMenu($menu_value, $submenu);
    }
}
?>
