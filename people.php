<?php
include("template.php");
$page = new webPage("SNAP: People", "people.css", "about");
$page->openPage();
$page->pageHeader();

$staff_array = array(
		array(
			
		),
		array(

		)
	);
?>

		<script type="text/javascript" src="js/people.js"></script>
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
				<div class="subHeader">meet the <img style="vertical-align: middle;" height="55" src="images/people.png" alt="People" /> of SNAP</div>

				<div style="width: 710px; margin: auto;">
					<div class="staff_photo" style="background-image: url('images/staff_photos/dustin_rice.jpg');" onclick="javascript:showPeopleModalBox('Dustin Rice', 'dustin_rice.jpg' ,'System Administrator', 'drrice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies cursus tellus eu aliquam. Praesent sed erat a nulla egestas iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur erat dui, sagittis in euismod eget, scelerisque a neque. Praesent vestibulum, risus aliquet laoreet accumsan, odio ante rhoncus sapien, sed euismod risus orci in velit. Nullam lorem dui, pulvinar sit amet dictum euismod, venenatis in est. Aliquam nec purus ut libero porttitor molestie. In tincidunt diam ut mauris rutrum condimentum. Vestibulum aliquet lobortis lectus vitae malesuada. Donec suscipit quam et odio dapibus iaculis. Nulla fringilla aliquam felis in iaculis. Etiam at lorem at lectus egestas condimentum ut quis metus. Curabitur hendrerit posuere condimentum. Sed egestas blandit risus, a interdum dolor venenatis tincidunt. Vivamus tristique nibh tempor lectus aliquam placerat. Fusce sed felis arcu. Pellentesque non leo nisl, ut commodo mauris. Aenean enim augue, semper at volutpat sit amet, mattis a mauris. Pellentesque vehicula, odio id aliquet imperdiet, odio odio lobortis nisl, quis accumsan purus enim vel quam. Donec et dolor magna.  Donec posuere aliquam sem, vel tempor felis consequat in. Curabitur ac ipsum quis est blandit pharetra. In hac habitasse platea dictumst. Duis euismod luctus. ');"></div>
					<div class="staff_photo" style="background-image: url('images/staff_photos/todd_brinkman.jpg');" onclick="javascript:showPeopleModalBox('Todd Brinkman', 'todd_brinkman.jpg' ,'Researcher', 'tjbrinkman');"></div>
					<div class="staff_photo" style="background-image: url('images/staff_photos/john_bailey.jpg');" onclick="javascript:showPeopleModalBox('John Bailey', 'john_bailey.jpg' ,'Research Assistant Professor', 'john.bailey');"></div>
					<div class="staff_photo" style="background-image: url('images/staff_photos/tom_kurkowski.jpg');" onclick="javascript:showPeopleModalBox('Tom Kurkowski','tom_kurkowski.jpg','IS Professional', 'takurkowski');"></div>
					<div class="staff_photo" style="background-image: url('images/staff_photos/winslow.jpg');"></div>
				</div>	

<!-- CONTACT SECTION -->
			<a name="contact"></a>
			<div style="clear: both; width: 600px; margin: auto; margin-top: 200px;">
				<form method="post" action="people.php?contact=true">
					<fieldset style="border: 2px solid #97a93a;">
					<table style="width: 500px;">
					<legend>Contact Us</legend>
					<tr><td style="width: 200px;">Your Email Address: </td><td><input type="text" /></td></tr>
					<tr><td style="width: 200px;">Question: </td>
						<td><select>
							<option>Dataset Questions</option>
							<option>Methods</option>
							<option>Website</option>
							<option>Other</option>
						</select>
						</td>
					</tr>
					<tr><td>Subject:  </td><td><input type="text" /></td></tr>
					<tr><td>Question: </td><td><textarea style="width: 400px; height: 150px;" rows="0" cols="0">

					</textarea></td></tr>
					</table>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
<?php
$page->closePage();
?>
