<?php
include("template.php");

require_once 'src/Contacts.php';

$page = new webPage("SNAP: People", "people.css", "about", 'People');
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$staff_array = array(
        array(
            
        ),
        array(

        )
    );
?>

        <div id="modalbackground"></div>
        <div id="modalcontainer" style="position: absolute; width: 100%; height: 100%; z-index: -100;">
            <div id="modalbox" style="border: none;">
                <div style="background-color: #97a93a; width: 100%; height: 140px;">
                <div id="modal_staff_photo" class="staff_photo" ></div>
                <div style="width: 400px; height: 100px; float: left; margin-top: 15px; color: #ffffff;">
                    <div id="modal_staff_name" style="font-weight: bold; font-size: 24px; margin: 4px;"></div>
                    <div id="modal_staff_title" style="font-size: 16px; margin: 4px;"></div>
                    <div id="modal_staff_email" style="font-size: 16px; margin: 4px;"></div>
                    <div id="modal_staff_phone" style="font-size: 16px; margin: 4px;">907-555-5555</div>
                </div>
                <div onclick="javascript:hidePeopleModalBox();" style="width: 20px; height: 20px; margin-top: 10px; margin-right: 10px; float: right; text-align: center; font-weight: bold; font-size: 20px; color: #ffffff; cursor: pointer; cursor: hand;">X</div>
                </div>
                <div style="background-color: #6a7173; width: 100%; min-height: 200px;margin-top: 10px;">
                    <div id="modal_staff_bio" style="font-size: 11px; padding: 20px; color: #ffffff; overflow: hidden"></div>
                </div>
            </div>
        </div>
        <div id="main_body">


            <div id="main_content">
                <div class="subHeader" style="display: inline-block; margin-bottom: 15px;">The People of SNAP</div>
                <div>Get contact information for individuals below. <a href="#contact">Don't know who you're looking for?</a></div>
                <div style="width: 900px; margin: auto;">
                    <div style="font-size: 20px; margin-top: 50px; margin-bottom: 30px;">SNAP Leaders</div>
                    <?php
                        $query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='1'";
                        $result = mysql_query($query) or die(mysql_error());
                        $num = 0;
                        while ($row = mysql_fetch_array($result)){
                            echo "<div style=\"width: 33%; display: inline-block;\">";
                                echo "<div style=\"position: relative; text-align: center; width: 200px;\">";
                                    echo "<div style=\"text-align: center; \"><img alt=\"Photo of ".$row['title']." ".$row['first']." ".$row['last']."\" style=\"padding: 3px; border: 1px solid #6a7173;\" src=\"/images/people/".$row['image']."\" /></div>";
                                    echo "<div style=\"font-size: 16px; margin-top: 5px; text-align: center;\">".$row['title']." ".$row['first']." ".$row['last']."</div>";
                                    echo "<div style=\"font-size: 14px; margin-top: 5px; text-align: center;\">".$row['position']."</div>";
                                    echo "<a href=\"/people_page.php?id=".$row['id']."\" style=\"position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; padding: 4px;\"></a>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                    <div style="font-size: 20px; margin-top: 50px; margin-bottom: 30px;">SNAP Staff</div>
                    <?php
                        $query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='2' OR staffgroup='3' AND status='1' ORDER BY last";
                        $result = mysql_query($query) or die(mysql_error());
                        $num = 0;
                        while ($row = mysql_fetch_array($result)){
                            echo "<div style=\"margin-top: 30px; width: 25%; display: inline-block; vertical-align: top;\">";
                                echo "<div style=\"position: relative; text-align: center; width: 156px;\">";
                                    echo "<div style=\"text-align: center; \"><img alt=\"Photo of ".$row['title']." ".$row['first']." ".$row['last']."\" style=\"width: 100%; padding: 3px; border: 1px solid #6a7173;\" src=\"/images/people/".$row['image']."\" /></div>";
                                    echo "<div style=\"font-size: 16px; margin-top: 5px; text-align: center;\">".$row['title']." ".$row['first']." ".$row['last']."</div>";
                                    echo "<div style=\"font-size: 14px; margin-top: 5px; text-align: center;\">".$row['position']."</div>";
                                    echo "<a href=\"/people_page.php?id=".$row['id']."\" style=\"position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; padding: 4px;\"></a>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
            <div id="contactFormWrapper"><a name="contact"></a>
                <h2>Contact Us!</h2>
                <p>
                    Scenarios Network for Alaska &amp; Arctic Planning<br/>
                    3352 College Road, Fairbanks AK 99709<br/>
                    nlfresco@alaska.edu | tel 907.474.2405 | fax 907.474.7151
                </p>
                <form id="contactUsForm">
                    <div >
                        <label>Topic</label>
                            <?php echo Contacts::getEmailContacts(); ?>
                    </div>
                    <div >
                        <label>Your name</label>
                        <input class="required" type="text" id="contact_name" name="name" />
                    </div>
                    <div >
                        <label>Your email address</label>
                        <input class="required email" type="text" id="contact_email" name="email" />
                    </div>
                    <div >
                        <label>Subject line</label>
                        <input class="required" type="text" id="contact_subject" name="subject" />
                    </div>
                    <div >
                        <label>Message</label>
                        <div id="messageWrapper">
                        <!-- empty div so the required message shows up properly -->
                            <div style="display:none;"></div><textarea class="required" id="contact_message" rows="6" cols="20" name="message"></textarea>
        					<div>
                                <div id="buttonWrapper"><button id="sendEmailButton">Send Email</button>
                                    <span id="sendingEmail" style="display: inline-block;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">

(function( $ ) {
    $.fn.serializeJSON=function() {
        var json = {};
        jQuery.map($(this).serializeArray(), function(n, i){
            json[n['name']] = n['value'];
        });
        return json;
    };
})( jQuery );

$('#contactUsForm').validate({
    errorPlacement: function(error, element) {
        element.prev().before(error);
    }
});

$('#sendEmailButton').button().click(function(e) {
    if( true === $('#contactUsForm').valid() ) {
        $(this).button('option', 'disabled', true);
        $('#sendingEmail')
            .empty()
            .append($('<img/>', { 
                src: 'images/ajax-loader-gray.gif', 
                alt: 'Loading...'
            }))
            .append('Sending email&hellip;')
            .show();
        
        $.ajax({
            type: 'post',
            url: '<?php echo Config::$url; ?>/contact.php',
            data: $('#contactFormWrapper :input').serializeJSON(),
            success: function(data, textStatus, jqXHR) {
                $('#sendEmailButton').button('option', 'disabled', false).removeClass('ui-state-active');
                $('#contactUsForm div :input').val('');
                $('#sendingEmail').empty().text('Thank you!  Your message has been sent.').delay(10000).hide('fast');
            },
            error: function(data, textStatus, jqXHR) {
                $('#sendingEmail').empty().text('Sorry, something went wrong.  Please call us at (907) 474-2405');
            }
        });
    } else {
        return false;
    }
});

//hide missing
$(function() {
   $('img').error(function() {
       $(this).hide();
   } 
});


                    </script>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php
$page->closePage();
?>
