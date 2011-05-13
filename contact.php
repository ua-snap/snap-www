<?php
include("template.php");
$page = new webPage("SNAP: Contact Us", "", "about");
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
					//mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )
					$to = "apbennett@alaska.edu";
					$subject = "Website Contact: ".$_POST['subject'];
					$message = "TOPIC: ".$_POST['topic'];
					$message .= "\r\nSENT BY: ".$_POST['name']." (".$_POST['email'].")";
					$message .= "\r\n\r\n".$_POST['message'];
					$headers = "From: ".$_POST['email'];
					$sent = mail ( $to, $subject, $message, $headers);
					if ($sent){
						echo "<div style=\"font-size: 18px; text-align: center;\">Your message has been sent.  You should hear back from us shortly.</div>";
						echo "<div style=\"margin-top: 50px; font-size: 18px; text-align: center;\">If you'd like to send another request, or contact someone else, you can go <a href=\"/people.php#contact\">here</a>.</div>";
					}	
				?>
			</div>
		</div>
<?php
$page->closePage();
?>
