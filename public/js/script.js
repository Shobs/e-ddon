jQuery(document).ready(function ($) {

	// Hiding live search helper div
	$('#searchHelper').hide();

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

	// Ajax live search
	$("#s").keyup(function(){
		var input = $(this).val();
		if (input != '') {
			$.post(BASE+'/liveSearch', {searchInput:input}, function(data){
				$('#searchHelper').fadeIn(250);
				$('#searchResults').html(data);
			});
		}else{
			$('#searchHelper').fadeOut(250);
		};
	});

	// When out of focus higing live search helper div
	$("#s").blur(function(){
		$('#searchHelper').fadeOut(250);
	});

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

	// Copy value from file input to a fake div
	$("#addonProfile").change(function(){
		fakeUpload('#addonProfile', '#fakeAddonProfile');
	});

	$("#pictureProfile").change(function(){
		fakeUpload('#pictureProfile', '#fakePictureProfile');
	});

	$('#profilePassword').pwdstr('#profileTime');

	$('#registerPassword').pwdstr('#registerTime');

	$('.dataTables').dataTable({
	 	"aaSorting": [[ 4, "desc" ]],
	 	// "bJQueryUI": true,
	 	"sScrollY": 400,
	 	"sScrollX": "100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
	 	"sPaginationType": "full_numbers",

	 });

});













