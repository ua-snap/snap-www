function showPeopleModalBox(staffMember, staffPhoto, staffTitle, staffEmail, staffBio){
	document.getElementById("modalbox").style.visibility="visible";
	document.getElementById("modalbackground").style.visibility="visible";
	document.getElementById("modalcontainer").style.zIndex="10000";
	document.getElementById("modal_staff_name").innerHTML = staffMember;
	document.getElementById("modal_staff_photo").style.backgroundImage = "url(images/staff_photos/" + staffPhoto + ")";
	document.getElementById("modal_staff_photo").style.backgroundPosition = "0px 100px";
	document.getElementById("modal_staff_title").innerHTML = staffTitle;
	document.getElementById("modal_staff_email").innerHTML = staffEmail + "@alaska.edu";
	if (staffBio){
		document.getElementById("modal_staff_bio").innerHTML = staffBio;
	} else {
		document.getElementById("modal_staff_bio").innerHTML = "Bio In Progress";
	}
}
function hidePeopleModalBox(){
	document.getElementById("modalbox").style.visibility="hidden";
	document.getElementById("modalbackground").style.visibility="hidden";
	document.getElementById("modalcontainer").style.zIndex="-100";
}
