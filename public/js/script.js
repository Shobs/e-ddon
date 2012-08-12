$(document).ready(function () {

	// copies value from file input to a fake div
	function fakeUpload (fieldUpload, fieldFakeUpload) {
		var value = $(fieldUpload).val();
		var drive = value.charAt(0);
		value =  value.substring(0,37)+'...';
		value = value.replace(drive+":\\fakepath\\","");
		if (value.charAt(0) == '.'){
			value = '';
		}
		$(fieldFakeUpload).html(value);
	}

	// Hides and shows different part of the form
	$(".forgotPassLink").click(function() {
		$('#loginArea').hide();
		$('#registerArea').hide();
		$('#forgetArea').fadeIn(500);
	});

	$(".loginLink").click(function() {
		$('#registerArea').hide();
		$('#forgetArea').hide();
		$('#loginArea').fadeIn(500);
	});

	$(".registerLink").click(function() {
		$('#loginArea').hide();
		$('#forgetArea').hide();
		$('#registerArea').fadeIn(500);
	});

	// Copy value from file input to a fake div
	$("#addonUpload").change(function(){
		fakeUpload('#addonUpload', '#fakeAddonUpload');
	});

	$("#pictureUpload").change(function(){
		fakeUpload('#pictureUpload', '#fakePictureUpload');
	});



});





