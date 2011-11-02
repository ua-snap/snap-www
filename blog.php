<?php
include("template.php");
$page = new webPage("SNAP: Blog", "", "about");
$page->openPage();
$page->pageHeader();

$staff_array = array(
        array(
            
        ),
        array(

        )
    );
?>

        <div id="main_body">


            <div id="main_content">
            <?php 
            // Include Wordpress 
            define('WP_USE_THEMES', false);
            require('wordpress/wp-load.php');
            ?>
            <div>
            <p style="font-size:18px;color:white;font-wieght:700;">Recently Asked Questions</p>
            <?php query_posts('showposts=3'); ?>
            <?php while (have_posts()): the_post(); ?>
            <div id="faq">
            <a href="<?php the_permalink() ?>"><?php the_title() ?></a><br />
            <?php the_time('F jS, Y') ?>
            <?php the_excerpt(); ?>
            <?php comments_popup_link(); ?>
            To see the answer to the question click <a href="<?php the_permalink() ?>">here</a>.<br /><br />
            </div>
            <?php endwhile; ?>
            </div>

        </div>
    </div>
<?php
$page->closePage();
?>
