var stakeholders = new Array();
stakeholders.push(new Array("The State of Alaska", "images/org_images/AKSeal.gif", "Subtext 1"));
stakeholders.push(new Array("The Wilderness Society", "images/org_images/Wilderness.gif", "Subtext 2"));
stakeholders.push(new Array("The Nature Conservancy", "images/org_images/nature_conservancy.jpg", "Subtext 3"));
stakeholders.push(new Array("Fairbanks North Star Borough", "images/org_images/fnsblogo.gif", "Subtext 4"));
stakeholders.push(new Array("US Forest Service", "images/org_images/forest_service.gif", "Subtext 5"));
stakeholders.push(new Array("US Fish &amp; Wildlife", "images/org_images/us_fish_wildlife.jpg", "Subtext 6"));
var affiliates = new Array();
affiliates.push(new Array("University of Alaska Fairbanks", "images/org_images/UAFLogo.png", "Subtext 1"));
affiliates.push(new Array("University of Alaska Geography Program", "images/org_images/UAGPLogo.png", "Subtext 2"));
affiliates.push(new Array("Alaska Center for Climate Assessment &amp; Policy", "images/org_images/ACCAPLogo.gif", "Subtext 3"));
affiliates.push(new Array("School of Natural Resources &amp; Agricultural Science", "images/org_images/SNRAS.gif", "Subtext 4"));
function content_counter(){
	value = 0;
}
var stakeholders_index = new content_counter();
var affiliates_index = new content_counter();
stakeholders_index.value = 0;
affiliates_index.value = 0;
function changeContent(current_div, array_name, index, counter){
	a_name = eval(array_name);
	var i = counter.value;
	i += index;
	if (i < 0){
		i = a_name.length - 1;	
	} else if (i >= a_name.length){
		i = 0;
	}
	counter.value = i;
	var innerarray = current_div.parentNode.parentNode.getElementsByClassName("content_box_inner"); 
	var inner = innerarray[0];
	inner.innerHTML = '<div style="margin: 10px; "><img height="100px" style="margin: auto; display: block" src="' + a_name[i][1] + '" /></div>';
	inner.innerHTML += '<div style="font-size: 24px; color: #6a7173; margin: 10px; width: 100%;">' + a_name[i][0] + '</div>';
	inner.innerHTML += '<div style="font-size: 16px; color: #6a7173; margin: 10px; width: 100%;">' + a_name[i][2] + '</div>';
	var c_indexarray = current_div.parentNode.parentNode.getElementsByClassName("content_index"); 
	var c_index = c_indexarray[0];
	current_div.onclick = function(){ changeContent(current_div, array_name, index, counter); };
	c_index.innerHTML = (i + 1) + " of " + a_name.length;
}
