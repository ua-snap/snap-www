<?php
include 'template.php';

require_once 'src/Contacts.php';
require_once 'src/People.php';

$page = new webPage("SNAP: People", "people.css", "about", 'People');
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();

?>

        <div id="main_body">
            <div id="main_content" class="people">
                
                <h2>The People of SNAP</h2>
                <p>Get contact information for individuals below. <a href="#contact">Don't know who you're looking for?</a></p>
                <div>
                    <h3>SNAP Leaders</h3>
                    <div class="leaders">
                    <?php
                        $query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='1'";
                        $result = mysql_query($query) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)) {
                            echo People::getPersonThumbnail($row);
                        }
                    ?>
                    </div>
                    <h3>SNAP Staff</h3>
                    <div class="staff">
                    <?php
                        $query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='2' OR staffgroup='3' AND status='1' ORDER BY last";
                        $result = mysql_query($query) or die(mysql_error());
                        while ($row = mysql_fetch_array($result)){
                            echo People::getPersonThumbnail($row);
                        }
                    ?>
                    </div>
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
})

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


                    </script>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php
$page->closePage();
?>
