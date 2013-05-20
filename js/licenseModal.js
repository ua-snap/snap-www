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

//TODO: charts exporting window for hires png shows up before this dialog, which makes it so that it says "exporting" even after 'declined', fix?
		//on that note -- remember that you can close that exporting dialog from anywhere with '#processingExportDialog'.dialog('close'); 
		//possibly related -- if you click the hires download, cancel it, and then try another one, and cancel IT, the canceled window gives way to an empty download window
				//--we'll have to see if that gets fixed when I fix the above issue.
function licenseModal( salutation, licenseAgreement, downloadFunction ) {
	//TODO: consider strategically placed fieldset/legend tags for formatting prettiness
	var downloadDialog = $(document.createElement('div'));
	downloadDialog.append( document.getElementById( salutation ) ).append( document.getElementById( "textEntry" ) )
		.append( document.getElementById( licenseAgreement ) );

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
				/*var form = document.getElementById( textEntry );	//doesn't work, but wanna do something like it
				form.submit();*/
				downloadFunction();
			},

			"Decline":function() {
				$(this).dialog('close');
			}
		}
	});
}
