<?php

require_once 'src/Config.php';
require_once 'Mail.php'; // PEAR Mail

try {
        
    if( !isset($_POST['what'])) {
        $_POST['what'] = 'collaboration'; // define fallback
    }

    $m = Mail::factory('smtp', array(
        'host' => Config::$email['host']
    ));

    $body = <<<text

From: {$_POST['name']}
Email provided: {$_POST['email']}

Message:
{$_POST['message']}

text;

    $m->send(
        Config::$contacts[$_POST['what']]['email'],
        array(
            'Subject' => 'SNAP Web contact form re: '.Config::$contacts[$_POST['what']]['description'],
            'Reply-To' => $_POST['email'],
            'From' => 'contact-form@www.snap.uaf.edu',
            'To' => Config::$contacts[$_POST['what']]['email']
        ),
        $body
    );

?>
{ "success" : "true" }
<?php

} catch (Exception $e) {
    
    // inform the client
    header('HTTP/1.1 500 Internal Server Error', true, 500);

    // Get the exception into a logfile somewhere and bail.
    die(e);
}

?>