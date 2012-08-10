$(document).ready(function () {

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

	$("#addonUpload").change(function(){
		var value = $('#addonUpload').val();
		$('#fakeAddonUpload').html(value);
	});

});





