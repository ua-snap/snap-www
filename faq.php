<?php
include("template.php");
$page = new webPage("SNAP: F.A.Q.", "faq.css", "about");
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">
            <div id="main_content">
                <div class="subHeader">Frequently Asked Questions</div>
                <div class="question">What is SNAP?</div>
                <div class="answer">SNAP is an attempt to answer the problems we face in an uncertain future.</div>
                <div class="question">What is SNAP?</div>
                <div class="answer">SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. SNAP is an attempt to answer the problems we face in an uncertain future. </div>
                <script type="text/javascript">
                    $('.question').click( function(){ 
                        $(this).next().fadeToggle();
                    });

                </script>
            </div>
        </div>
<?php
$page->closePage();
?>
