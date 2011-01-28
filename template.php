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


	private function mainMenu(){ ?>
		<div class="menu">
			<span <?php if ($_SERVER['PHP_SELF'] == "/about.php" || $this->menu == "about"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="about.php" <?php if ($_SERVER['PHP_SELF'] == "/about.php" || $this->menu == "about"){ echo "style=\"color: #111111\""; }?>>About</a></span>
			<span <?php if ($_SERVER['PHP_SELF'] == "/data.php" || $this->menu == "data"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="data.php" <?php if ($_SERVER['PHP_SELF'] == "/data.php" || $this->menu == "data"){ echo "style=\"color: #111111\""; }?>>Maps &amp; Data</a></span>
			<span <?php if ($_SERVER['PHP_SELF'] == "/publications.php" || $this->menu == "publications"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="publications.php" <?php if ($_SERVER['PHP_SELF'] == "/publications.php" || $this->menu == "publications"){ echo "style=\"color: #111111\""; }?>>Publications</a></span>
			<span <?php if ($_SERVER['PHP_SELF'] == "/projects.php" || $this->menu == "projects"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="projects.php" <?php if ($_SERVER['PHP_SELF'] == "/projects.php" || $this->menu == "projects"){ echo "style=\"color: #111111\""; }?>>Projects</a></span>
		<?php /*
			<li <?php if ($_SERVER['PHP_SELF'] == "/methods.php" || $this->menu == "methods"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="methods.php" <?php if ($_SERVER['PHP_SELF'] == "/methods.php" || $this->menu == "methods"){ echo "style=\"color: #111111\""; }?>><span>Methods</span></a></li>
			<li <?php if ($_SERVER['PHP_SELF'] == "/educators.php" || $this->menu == "educators"){ echo "style=\"background-image: url('images/top_bubble.png'); background-repeat: no-repeat; padding-bottom: 21px; \""; }?>><a href="educators.php"  <?php if ($_SERVER['PHP_SELF'] == "/educators.php" || $this->menu == "educators"){ echo "style=\"color: #111111\""; }?>><span>Educators</span></a></li>
		*/ ?>

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
			echo "<link rel=\"stylesheet\" href=\"css/style".$_GET['style'].".css\" type=\"text/css\" />"; 
		} else {
			echo "<link rel=\"stylesheet\" href=\"css/style.css\" type=\"text/css\" />";

		}
		
		if (isset($this->stylesheet)){ 
			echo "<link rel=\"stylesheet\" href=\"css/$this->stylesheet\" type=\"text/css\" />"; 
		} 

		?>
		<link rel="shortcut icon" href="images/snap.ico" />
		<script src="js/jquery.js" type="text/javascript" ></script>
		<script src="js/site.js" type="text/javascript" ></script>
		<!--<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.latest.js"></script>-->
		<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.lite.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {

		});


		</script>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=snapweb"></script>

	</head>
	<body onload="javascript:hideOnLoad();">
		<?php
	}
	public function pageHeader(){ ?>	
		<!-- <div class="slashbar"></div> -->
		<div id="header">
			<a href="index.php"><span id="header_left"><img src="images/snap_acronym_rgb.png" height="90px" alt="SNAP Acronym Logo" /></span></a>
			<div id="header_right">
				<a href="/"><img src="images/snap_full.png" height="30px" alt="Scenarios Network for Alaska Planning" /></a>
			</div>

		</div>		
				<?php $this->mainMenu(); ?>
		<div id="subbar" style="width: 975px; height: 40px; margin-top: 15px; margin: auto; ">
			<div class="horiz_bar_left">
		<?php
		if ($this->menu){
			$this->drawSubMenu($this->menu);
		} else {
			echo "<div id=\"tagline\">climate change information brought to the communities of the arctic</div>";
		}
		?>
			</div>
			<div class="horiz_bar_right">
				<img src="images/share.png" style="margin: auto; padding-top: 3px; display: block;" alt="Share"/>
			</div>
		</div>
		<div style="color: #999999; width: 975px; margin: auto; text-align: right; padding-top: 10px;"><a href="blog.php">blog</a> | <a href="contact.php">contact</a> | <a href="sitemap.php">sitemap</a> | <a href="search.php">search</a></div>
		<?php
	}
	public function pageFooter(){ ?>

		<div id="footer" style="clear: both">
			<div id="socialbar">
				<span style="font-weight: bold; margin-left: 20px;">Follow us</span>
				<span style="margin-left: 40px;"><a href="http://www.facebook.com/pages/SNAP-and-ACCAP/112992248723524?v=wall">facebook</a></span>
				<span style="margin-left: 40px;"><a href="">twitter</a></span>
				<span style="margin-left: 40px;"><a href="">blog rss</a></span>
				<span style="margin-left: 40px;"><a href="">email updates</a></span>
			</div>
			<div id="footbar">
				<div class="horiz_bar_left" style="color: #eeeeee; relative; font-size: 12px;">
					<div style="position: absolute; margin-left: 21px; margin-top: 1px; color: #555555;">We just set up this twitter account so now we'll show some tweets right here @twitter, is that how this works? #awkward first tweet</div>
					<div style="position: absolute; margin-left: 20px;">We just set up this twitter account so now we'll show some tweets right here @twitter, is that how this works? #awkward first tweet</div>
				</div>
				<div class="horiz_bar_right">
					<img src="images/share.png" style="margin: auto; padding-top: 3px; display: block;" alt="Share"/>
				</div>
			</div>
			<div style="text-align: left; margin-left: 50px;"><img src="images/bottom_bubble.png" alt="Bubble Graphic" /></div>
			<div style="margin-bottom: 20px; ">
				<div style="float: left; margin-right: 40px;">
					<div><a href="/"><img src="images/snap_acronym_rgb.png" height="53px" alt="SNAP Acronym Logo" /></a></div>
					<div><a href="blog.php">blog</a> | <a href="contact.php">contact</a> | <a href="sitemap.php">sitemap</a> | <a href="search.php">search</a></div>
				</div>
				<div style ="float: left; width: 450px; text-align: left; margin-top: 13px;">Copyright &copy; 2011 Scenarios Network for Alaska &amp; Arctic Planning, a research institute of the University of Alaska Fairbanks.  UAF is an affirmative action/equal opportunity employer and educational institution.</div>
				<div><a href="http://www.uaf.edu"><img src="images/UAFLogo_A_black_horiz.png" height="55px" style="margin-top: 13px;" alt="UAF Logo" /></a></div>
			</div>
		</div>
	<!-- <div class="slashbar"></div> -->
	<?php
	}
	public function closePage(){
		?>
		<?php $this->pageFooter(); ?>
		<!--
			<div style="position: fixed; left: 0px; bottom: 20px; color: #006699; width: 100%; text-align: right;" >
				<?php $page = preg_replace("/\/old\/v\d/", "", $_SERVER['PHP_SELF']); ?>
				<a href="http://dev.snap.uaf.edu<?php echo $page; ?>" style="color: #006699; font-weight: bold;">Style 1</a> &nbsp;&nbsp;
				<a href="http://dev.snap.uaf.edu/old/v2/<?php echo basename($_SERVER['PHP_SELF']); ?>" style="color: #006699; font-weight: bold;">Style 2</a> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="http://dev.snap.uaf.edu/old/v3/<?php echo basename($_SERVER['PHP_SELF']); ?>" style="color: #006699; font-weight: bold;">Style 3</a> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="http://dev.snap.uaf.edu/old/v4/<?php echo basename($_SERVER['PHP_SELF']); ?>" style="color: #006699; font-weight: bold;">Style 4</a> &nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		-->
			</body>
		</html>
		<?php
	}
	public function drawSubMenu($menu_value){
		$menu_list = array("about", "data", "publications", "projects", "methods", "educators");
		$menu_choice = 0;
		for ($i = 0; $i < sizeof($menu_list); $i++){
			if ($menu_value == $menu_list[$i]){
				$menu_choice = $i;
			}
		}
		$menu_options = array(
					array(
						array("people.php", "People"),
						array("blog.php", "Blog"),
						array("partners.php", "Partners &amp; Affiliates"),
						array("contact.php", "Contact Us")
					), 
					array(
						array("maps.php","Map Tool"),
						array("charts.php","Community Charts"),
						array("methods.php","Methods")
					),
					array(
						array("papers.php", "Papers"),
						array("reports.php", "Reports"),
						array("presentations.php", "Presentations")
					),
					array(
						array("terrestrial.php", "Terrestrial"),
						array("hypdrological", "Hydrological"),
						array("permafrost.php", "Permafrost")
					),
					array(
						array("global.php","Global Circulation Models"),
						array("methods.php","SNAP Methods"),
						array("derived.php","Derived Data")
					),
					array(
						array("training.php","Training"),
						array("materials.php","Teaching Materials"),
					)
			);
		?>
				<div class="submenu">

			<?php
			for ($i = 0; $i < sizeof($menu_options[$menu_choice]); $i++){
				echo "<span><a href=\"".$menu_options[$menu_choice][$i][0]."\" ";
				$string1 = "/".$menu_options[$menu_choice][$i][0];
				$string2 = $_SERVER["PHP_SELF"];
				if ($string1 ==$string2){
					echo "style=\"color: #ffffff; \"";

				}
				echo ">";
				echo $menu_options[$menu_choice][$i][1]."</a></span>";
			}
		?>
				</div>
		<?php
	}
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
	public function openContentBox2($content_title, $float_side, $content_id){
		?>

		<div <?php if ($float_side){ echo "style=\"float: $float_side;\""; } ?>>
			<div class="content_box_title" style="float: left"><?php echo $content_title; ?></div>
			<div style="float: right; margin: 10px;" class="content_box_nav">
				<div id="<?php echo $content_id."_prev"; ?>" style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: left"><img src="images/arrow_left.png" alt="Left Arrow" /></div>
				<div id="<?php echo $content_id."_next"; ?>" style="margin: 5px; font-size: 18px; cursor: pointer; cursor: hand; float: right"><img src="images/arrow_right.png" alt="Right Arrow" /></div>
			</div>
			<div class="content_box_outer" style="clear: both">
				<div id="<?php echo $content_id; ?>" class="content_box_inner" style="height: 300px;">
		<?php
	}
	public function closeContentBox2($content_id){ ?>
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
