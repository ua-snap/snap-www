function hideOnLoad(){
	document.getElementById("searchbox").style.visibility="hidden";
	document.getElementById("searchlink").style.visibility="visible";
	document.getElementById("searchlink").style.height="0px";
}
function showSearch(){
	document.getElementById("searchbox").style.visibility="visible";
	document.getElementById("searchlink").style.visibility="hidden";
	document.getElementById("searchlink").style.height="0px";
}
function showModalBox(){
	document.getElementById("modalbox").style.visibility="visible";
	document.getElementById("modal").style.visibility="visible";
	document.getElementById("modalbox").style.height="100%";
}
function hideModalBox(){
	document.getElementById("modalbox").style.visibility="hidden";
	document.getElementById("modal").style.visibility="hidden";
	document.getElementById("modalbox").style.visibility="0px;";
}
function changeImage(button, imgid, titlestring, textstring, linkstring) {
	document.getElementById("news_image").innerHTML = "<a href=\"news.php\"><img height=\"100%\" width=\"100%\" src=\"../images/index_images/" + imgid + ".jpg\" /></a>";
	document.getElementById("news_title").innerHTML = titlestring;
	document.getElementById("news_content").innerHTML = textstring;
	document.getElementById("news_link").innerHTML = "<a href=\"" + linkstring + "\">Read more</a>";
	
}
