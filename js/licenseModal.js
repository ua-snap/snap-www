/*jshint: laxbreak:true */

/*
Takes as arguments the names of two divs and the function that will 
continue the download process upon the user's acceptance of the agreement.

	Of the two div names passed, the first is the top paragraph of text before 
	optional user information entry, and the second is the light version
	of the license agreement below that (the legalese for which should be linked
	from each respective div, in order to allow for different licences
	to be used)

	The text content of these divs is stored in src/licenceModal.php, which is where
	new messages should be added.

*/

function setCookie() {
	var expirationDate = new Date();
	expirationDate.setSeconds( expirationDate.getSeconds() + 30 );
	document.cookie = "SNAP_license_agreed=" + $('#textEntry').serialize() + "; expires=" + expirationDate.toUTCString();
}

function cookieExpired() {
	if( document.cookie.indexOf("SNAP_license_agreed") == -1 ) {
		return true;
	}
	else 
		return false;
}

function sendData( downloadFunction ) {	
	$.ajax ({
		//async: 	false,	
		url: 		$('#textEntry').attr('action'),
		type: 		$('#textEntry').attr('method'),
		data: 		$('#textEntry').serialize(),
		success: 	downloadFunction(),	
	});

}

//this is used to send data stored in the cookie if the user has already given their information for this cookie period
function sendDataFromCookie( downloadFunction ) {
	$.ajax({	
		//async:    false,
		url: 		$('#textEntry').attr('action'),
		type: 		$('#textEntry').attr('method'),
		data: 		getCookie(),
		success: 	downloadFunction(),	
	});
}

function getCookie() {
	var thisCookie = document.cookie.substring( document.cookie.indexOf( 'SNAP_license_agreed' ), document.cookie.length );

	return thisCookie.substring( thisCookie.indexOf( '=' )+1, thisCookie.lastIndexOf( cookieEnd() ) );
}

function cookieEnd() {
	//if browser uses semicolon separators, find the end of our cookie
	if( document.cookie.indexOf( ';', document.cookie.indexOf( 'SNAP_license_agreed' ) ) != -1 ) {
		return ';';
	}
	//if browser uses comma separators, find the end of our cookie
	else if (document.cookie.indexOf( ',', document.cookie.indexOf( 'SNAP_license_agreed' ) ) != -1 ) {
		return ',';
	}
	//if our cookie is at the end of document.cookie
	else return "";
}


function setValidation() {
	return $('#textEntry').validate ({
		messages: {
			email: {
				email: "please enter a valid email address or leave the email field blank.".fontcolor("red")
			}
		},
		errorPlacement: function(error, element) {
			element.parent('p').next('div').append(error);
		},
		submitHandler: function() {
			$.ajax ({
				//async: 		false,	
				url: 		$('#textEntry').attr('action'),
				type: 		$('#textEntry').attr('method'),
				data: 		$('#textEntry').serialize(),
				success: 	downloadFunction(),	
			});
		}

	});
}


function licenseModal( salutation, licenseAgreement, downloadFunction ) {

	if( cookieExpired() ) {
		var validator = setValidation();
		
		$('#textEntry').find("input[type=text], textarea").val("");	//clears input fields
		var downloadDialog = $(document.createElement('div'));
		downloadDialog.append( document.getElementById( salutation ) ).append( document.getElementById( "textEntry" ) )
			.append( document.getElementById( licenseAgreement ) ).append( document.getElementById( "licenseNote" ) );

		
		downloadDialog.dialog({
			dialogClass: "no-close",
			closeOnEscape: false,
			modal: true,
			draggable: false,
			resizable: false,
			show: 'fade',
			hide: 'fade',
			width: '1000px',
			title: 'File Download',
			zindex: 50001,	//note to self: one more than 1st level download dialogs, doesn't seem to make a difference - at least in relation to other dialogs
								//this is actually removed in JSUI 1.10.0. in fact, even now all dialogs seem to be stuck at zindex=1002
			buttons: {
				"Accept":function() {
					var form = $('#textEntry').validate();
					if(form.valid()) {
						$(this).dialog('destroy');

						sendData(downloadFunction);
						
						setCookie();
						validator.resetForm();
					}
				},

				"Decline":function() {
					$(this).dialog('destroy');
					validator.resetForm();
				}
			}
		});
	}
	else {
		sendDataFromCookie(downloadFunction);
	}
}
