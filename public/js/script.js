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

	function doCommand(com, grid) {
		if (com == 'Edit') {
			$('.trSelected', grid).each(function() {
			var id = $(this).attr('id');
			id = id.substring(id.lastIndexOf('row')+3);
			alert("Edit row " + id);
			});
		} else if (com == 'Delete') {
			$('.trSelected', grid).each(function() {
			var id = $(this).attr('id');
			id = id.substring(id.lastIndexOf('row')+3);
			alert("Delete row " + id);
			});
		}
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

	$(".dataTable th").each(function() {
	  $(this).attr("width", $(this).width());
	});

	$('.dataTable').flexigrid({
		buttons : [
			{name: 'Edit', bclass: 'edit', onpress : doCommand},
			{name: 'Delete', bclass: 'delete', onpress : doCommand},
			{separator: true}
		],

		sortname: "id",
		sortorder: "asc",
		usepager: true,
		height: 300,
		singleSelect: true,
	});

	$('#usersTable').flexigrid({
		searchitems : [
			{display: 'Username', name : 'username'},
			{display: 'Lastname', name : 'lastname', isdefault: true},
			{display: 'Firstname', name : 'firstname'}
		],
	});

	$('#addonsTable').flexigrid({
		searchitems : [
			{display: 'Name', name : 'name', isdefault: true},
			{display: 'User ID', name : 'user_id'},
			{display: 'Category', name : 'category'}
		],
	});

});













