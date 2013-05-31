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
		document.cookie = "SNAP_license_agreed=true; expires=" + expirationDate.toUTCString();
	}

	function cookieExpired() {
		if( document.cookie.indexOf("SNAP_license_agreed") == -1 ) {
			return true;
		}
		else 
			return false;
	}
				//if you click the hires download, cancel it, and then try another one, and cancel IT, the canceled window gives way to an empty download window

	function sendData( downloadFunction ) {
		$.ajax({	//TODO: add validation here, and make this ajax call the submitHandler attribute of the validation call.
			url: 		$('#textEntry').attr('action'),
			type: 		$('#textEntry').attr('method'),
			data: 		$('#textEntry').serialize(),
			success: 	downloadFunction(),					//TODO: error handling? ties into above
		});
	}
function licenseModal( salutation, licenseAgreement, downloadFunction ) {
	if( cookieExpired() ) {
		
		$('#textEntry').find("input[type=text], textarea").val("");	//clears input fields
		var downloadDialog = $(document.createElement('div'));
		downloadDialog.append( document.getElementById( salutation ) ).append( document.getElementById( "textEntry" ) )
			.append( document.getElementById( licenseAgreement ) ).append( document.getElementById( "licenseNote" ) );

		downloadDialog.show().dialog({
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
								//this is actually removed in JSUI 1.10.0. in fact, all dialogs seem to be stuck at zindex=1002
			buttons: {
				"Accept":function() {
					$(this).dialog('close');
					setCookie();
					sendData( downloadFunction );

				},

				"Decline":function() {
					$(this).dialog('close');
				}
			}
		});
	}
	else {
		sendData( downloadFunction );
	}
}
