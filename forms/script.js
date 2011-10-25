var globalStafferCount = 0;
var globalCollaboratorCount = 0;
function addStaffer(sid, staffname, ss, sc){
	$("#modalback").fadeOut("100");
	$("#modalbox_collab").fadeOut("100");
	$("#modalbox_staffer").fadeOut("100");
	//$("body").css("overflow", "auto");
	var staffscientist = "";
	var staffcontact = "";
	if (ss == 1){
		staffscientist = "checked";
	}
	if (sc == 1){
		staffcontact = "checked";
	}
	$("#add_staffer").parent().before("<div class='Contact'><div style='width: 300px; '><input type='hidden' name='staffer[" + globalStafferCount + "][id]' value='" + sid + "' />" + staffname + "</div> <div style='width: 22px; margin-left: 40px; '><input type='checkbox' name='staffer[" + globalStafferCount + "][ss]' " + staffscientist + " /></div><div style='margin-left: 30px; width: 22px; '><input type='checkbox' name='staffer[" + globalStafferCount + "][sc]' " + staffcontact + " /></div><div style='float: right; padding-right: 15px; line-height: 20px; margin-right: 5px;'><a class='deleteX'>X</a></div></div>");
	$(".deleteX").click ( function() {
		dropCurrent(this);
	});
	globalStafferCount += 1;
}
function showStafferSelection(){
	$("#modalback").fadeIn("500");
	$("#modalbox_staffer").fadeIn("500");
}
function hideStafferSelection(){
	$("#modalback").fadeOut("500");
	$("#modalbox_staffer").fadeOut("500");
	$("#modalbox_collab").fadeOut("500");
}
function addCollaborator(cid, collaborator, imgsrc){
	$("#modalback").fadeOut("100");
	$("#modalbox_collab").fadeOut("100");
	$("#modalbox_staffer").fadeOut("100");
	$("#add_collab").parent().before("<div class='Collaborator'><div style='text-align: center; width: 80px;margin-right: 10px; padding: 0px; vertical-align: top;'><img style='height: 26px; vertical-align: top;' src='/images/collaborators/" + imgsrc + "' /></div><input type='hidden' name='collaborator[" + globalCollaboratorCount + "]' value='" + cid + "' /><div style='vertical-align: top; width: 400px;'>" + collaborator + "</div><div style='float: right; padding-right: 15px; line-height: 20px; margin-right: 5px;'><a class='deleteX'>X</a></div></div>");
	$(".deleteX").click ( function() {
		dropCurrent(this);
	});
	globalCollaboratorCount += 1;
}
function showCollaboratorSelection(){
	$("#modalback").fadeIn("500");
	$("#modalbox_collab").fadeIn("500");
}
function hideCollaboratorSelection(){
	$("#modalback").fadeOut("500");
	$("#modalbox_staffer").fadeOut("500");
	$("#modalbox_collab").fadeOut("500");
}
function dropCurrent(item){
	$(item).parent().parent().remove();
	//alert($(item).parent().attr("class"));
}
