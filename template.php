<?php
class webPage {
	private $pageTitle;
	private $stylesheet;
	private $menu;
	public $SITE = "http://www.snap.uaf.edu";
	public function __construct($t, $s, $m){
		$this->pageTitle = $t;
		$this->stylesheet = $s;
		$this->menu = $m;
	}

	public function connectToDatabase(){
		$server = "localhost";
		$username = "snapwww_admin";
		$password = "xargX11";
		$database = "snapwww";
		mysql_connect($server, $username, $password) or die("Unable to Connect to Database");
		mysql_select_db($database);
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
		
	<?php 
		if (isset($_GET['style'])){
			echo "<link rel=\"stylesheet\" href=\"/css/style".$_GET['style'].".css\" type=\"text/css\" />"; 
		} else {
			echo "<link rel=\"stylesheet\" href=\"/css/style.css\" type=\"text/css\" />";

		}
		
		if (isset($this->stylesheet)){ 
			echo "<link rel=\"stylesheet\" href=\"/css/$this->stylesheet\" type=\"text/css\" />"; 
		} 

		?>
		<link rel="shortcut icon" href="/images/snap.ico" />
		<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-3978613-3']);
			  _gaq.push(['_trackPageview']);

			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

        <!-- make-dev -->
		</script>
		<script src="/js/jquery.js" type="text/javascript" ></script>
		<script src="/js/site.js" type="text/javascript" ></script>
		<script src="js/jquery.hoverIntent.minified.js" type="text/javascript"></script>
		<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>
		<!--<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.lite.min.js"></script>-->
        <!-- end-make-dev -->
		<script type="text/javascript">
		$(document).ready(function() {

		});


		</script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=snapweb"></script>
			<script type="text/javascript">
				var addthis_config =
				{
				   ui_508_compliant: true,
				   ui_hover_direction: 1,
				   services_compact: 'facebook,twitter,google_plusone,print,email'
				}
			</script>

	</head>
	<body onload="javascript:hideOnLoad();">
		<?php
	}
	public function pageHeader(){ ?>	
		<!-- <div class="slashbar"></div> -->
		<div id="header">
			<a href="/"><span id="header_left"><img src="/images/snap_acronym_rgb.png" height="90px" alt="SNAP Acronym Logo" /></span></a>
			<div id="header_right">
				<div><a href="/"><img src="/images/snap_full.png" height="30px" alt="Scenarios Network for Alaska Planning" /></a></div>
				<?php
				if (basename($_SERVER['PHP_SELF']) != "index.php"){
					echo "<div id=\"motto\" style=\"text-align: center; color: #999999; top: -8px; position: relative;\">Exploring our future in a changing Arctic</div>";
				}
				?>
				
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
		<div style="color: #999999; width: 975px; margin: auto; text-align: right; padding-top: 10px;" class="contactbar"><a href="/blog/">blog</a> | <a href="/people.php#contact">contact</a> | <a href="/sitemap.php">sitemap</a> | <a href="/search.php">search</a></div>
		<?php
	}
	public function pageFooter(){ ?>

		<div id="footer" style="clear: both">
			<div id="socialbar">
				<span style="font-weight: bold; margin-left: 20px;">Follow us</span>
				<span style="margin-left: 40px;"><a href="http://www.facebook.com/pages/SNAP-and-ACCAP/112992248723524?v=wall">facebook</a></span>
				<span style="margin-left: 40px;"><a href="http://twitter.com/#!/SNAPandACCAP">twitter</a></span>
				<span style="margin-left: 40px;"><a href="http://dev.snap.uaf.edu/blog/?feed=rss2">blog rss</a></span>
				<!--<span style="margin-left: 40px;"><a href="">email updates</a></span>-->
			</div>
			<div id="footbar">
				<div class="horiz_bar_left" style="color: #eeeeee; relative; font-size: 10px;">
					<div style="position: absolute; margin-left: 20px; text-align: left; ">
					<!--We just set up this twitter account so now we'll show some tweets right here @twitter, is that how this works? #awkwardfirsttweet-->
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
					<div class="contactbar"><a href="/blog/">blog</a> | <a href="/people.php#contact">contact</a> | <a href="/sitemap.php">sitemap</a> | <a href="/search.php">search</a></div>
				</div>
				<div style ="float: left; width: 450px; text-align: left; margin-top: 13px;">Copyright &copy; 2011 <a href="/" style="color: #222222; text-decoration: underline;">Scenarios Network for Alaska &amp; Arctic Planning</a>, a research institute of the <a href="http://www.uaf.edu" style="color: #222222; text-decoration: underline;">University of Alaska Fairbanks</a>.  UAF is an affirmative action/equal opportunity employer and educational institution.</div>
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
		$menu_list = array("about", "data", "resources", "projects", "methods", "educators");
		$menu_choice = 0;
		for ($i = 0; $i < sizeof($menu_list); $i++){
			if ($menu_value == $menu_list[$i]){
				$menu_choice = $i;
			}
		}
		$menu_options = array(
					array(
						array("/people.php", "People"),
						array("/collaborators.php", "Collaborators"),
						//array("/blog/", "Blog"),
						array("/outreach.php", "Outreach"),
						array("/faq.php", "F.A.Q.")
						//array("/sustainability.php", "Sustainability"),
					), 
					array(
						array("/maps.php\" target=\"_blank","Map Tool"),
						array("/charts.php","Community Charts"),
						array("/gisdata.php","GIS Data")
					),
					array(
						array("label", "Learn about all of SNAP's resources below.  The list can be narrowed by selecting from the options below.")
					),
					array(
						array("label", "Learn about all of SNAP's projects below.  The list can be narrowed by selecting from the options below.")
					),
					array(
						array("/downscaling.php","Downscaling"),
						array("/modeling.php","Modeling"),
						array("/derived.php","Derived Data"),
						array("/uncertainty.php","Uncertainty"),
						array("/planning.php","Planning")
					),
					array(
						array("/training.php","Training"),
						array("/materials.php","Teaching Materials")
					)
			);
		?>
				<div class="submenu">

			<?php
			for ($i = 0; $i < sizeof($menu_options[$menu_choice]); $i++){
				if ($menu_options[$menu_choice][$i][0] == "label"){
					echo "<span style=\"font-size: 13.5px; color: #ffffff; \" >".$menu_options[$menu_choice][$i][1]."</span>";
				} else {
					echo "<span><a href=\"".$menu_options[$menu_choice][$i][0]."\" ";
					$string1 = "".$menu_options[$menu_choice][$i][0];
					$string2 = $_SERVER["REQUEST_URI"];
					if (preg_match("/^\/blog\/*/", $string2)){
						$string2 = "/blog/";
					}	
					if ($string1 == $string2){
						echo "style=\"color: #ffffff; \"";

					}
					echo ">";
					echo $menu_options[$menu_choice][$i][1]."</a></span>";
				}
			}

		?>
				</div>
		<?php
	}
	/*
	public function openContentBox($content_title, $float_side, $content_array){
		?>
		<div <?php if ($float_side){ echo "style=\"float: $float_side;\""; } ?>>
			<div class="content_box_title" style="float: left"><?php echo $content_title; ?></div>
			<div style="float: right; margin: 10px;" class="content_box_nav">
				<div style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: left" onclick='javascript:changeContent(this, <?php echo $content_array; ?>, -1, <?php echo $content_array; ?>_index);'><img src="images/arrow_left.png" alt="Left Arrow" /></div> 
				<div style="color: #6a7173; float: left; margin: 5px; font-size: 14px; line-height: 17px;" class="content_index">
					<script type="text/javascript">
						a_name = eval(<?php echo $content_array; ?>);
						document.write('1 of ' + a_name.length);
					</script>
				</div>
				<div style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: right" onclick='javascript:changeContent(this, <?php echo $content_array; ?>, 1, <?php echo $content_array; ?>_index);'><img src="images/arrow_right.png" alt="Right Arrow" /></div>
			</div>
			<div class="content_box_outer" style="clear: both">
				<div class="content_box_inner" style="height: 300px;">
					<script type="text/javascript">
						a_name = eval(<?php echo $content_array; ?>);
						document.write('<div style="margin: 10px; "><img height="100px" style="margin: auto; display: block" src="' + a_name[0][1] + '" /></div>');
						document.write('<div style="font-size: 24px; color: #6a7173; margin: 10px; width: 100%;">' + a_name[0][0] + '</div>');
						document.write('<div style="font-size: 16px; color: #6a7173; margin: 10px; width: 100%;">' + a_name[0][2] + '</div>');
					</script>
		<?php
	}
	public function closeContentBox(){
		?>
				</div>
			</div>
		</div>
		<?php
	}
	*/
	public function openContentBox($content_title, $float_side, $content_id){
		?>

		<div <?php if ($float_side){ echo "style=\"float: $float_side;\""; } ?>>
			<div class="content_box_title" style="float: left"><?php echo $content_title; ?></div>
			<div style="float: right; margin: 10px;" class="content_box_nav">
				<div id="<?php echo $content_id."_prev"; ?>" style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: left"><img src="/images/arrow_left.png" alt="Left Arrow" /></div>
				<div id="<?php echo $content_id."_next"; ?>" style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: right"><img src="/images/arrow_right.png" alt="Right Arrow" /></div>
			</div>
			<div class="content_box_outer" style="clear: both">
				<div id="<?php echo $content_id; ?>" class="content_box_inner" style="height: 150px;">
		<?php
	}
	public function closeContentBox($content_id){ ?>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$('#<?php echo $content_id; ?>').cycle({
				fx:     'fade', 
				speed:   1000, 
				timeout: 5000, 
				next:   '#<?php echo $content_id."_next"; ?>', 
				prev:   '#<?php echo $content_id."_prev"; ?>', 
				pause:   1 
			});
		</script>
		<?php
	}
}
?>
