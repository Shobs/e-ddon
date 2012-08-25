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

	// When out of focus hiding live search helper div
	$("#s").blur(function(){
		$('#searchHelper').fadeOut(250);
	});

	$('.fakeCheckbox').click(function(){
		$('.fakeCheckbox').hide();
		$('.fakeChecked').show();
		$('input[name=remember]').attr('checked', true);
	})

	$('.fakeChecked').click(function(){
		$('.fakeChecked').hide();
		$('.fakeCheckbox').show();
		$('input[name=remember]').attr('checked', false);
	})

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

	//data table ajax editing
	$('.tr_edit').click(function(){
		var ID = $(this).attr('id');

		var user = [];

		// $(this){
		// 	.each('td span'){

		// 	var value = $(this).html();
		// 	user.push(value);
		// });
		// };

		alert(user);
		// $('#result').hmtl(user);

		$('#username_'+ID).hide();
		$('#lastname_'+ID).hide();
		$('#firstname_'+ID).hide();
		$('#role_'+ID).hide();
		$('#temporary_'+ID).hide();
		$('#visible_'+ID).hide();
		$('#comments_'+ID).hide();
		$('#username_input_'+ID).show();
		$('#lastname_input_'+ID).show();
		$('#firstname_input_'+ID).show();
		$('#role_input_'+ID).show();
		$('#temporary_input_'+ID).show();
		$('#visible_input_'+ID).show();
		$('#comments_input_'+ID).show();

		$('#username_input_'+ID).focus();

		$('#usersUpdate').click(function(){

			var userid = $('#userid_'+ID).html();
			var username = $('#username_input_'+ID).val();
			var lastname = $('#lastname_input_'+ID).val();
			var firstname = $('#firstname_input_'+ID).val();
			var role = $('#role_input_'+ID).val();
			var temporary = $('#temporary_input_'+ID).val();
			var visible = $('#visible_input_'+ID).val();
			var comments = $('#comments_input_'+ID).val();

			$('#userid_'+ID).html('<img src="../img/load.gif" />'); // Loading image

			$('.cell_edit_box').hide();
			$('.cell_text').show();

			if(username.length > 0 && lastname.length > 0  && firstname.length > 0 && role.length > 0 && temporary.length > 0 && visible.length > 0 ){

				$.post(BASE+'/userstable', {
					id : userid,
					username : username,
					lastname : lastname,
					firstname : firstname,
					role : role,
					temporary : temporary,
					visible : visible,
					comments : comments,

				}, function(data){
					data = $.parseJSON(data);
					$('#userid_'+ID).html(data['id']);
					$('#username_'+ID).html(data['username']);
					$('#lastname_'+ID).html(data['lastname']);
					$('#firstname_'+ID).html(data['firstname']);
					$('#role_'+ID).html(data['role']);
					$('#temporary_'+ID).html(data['temporary']);
					$('#visible_'+ID).html(data['visible']);
					$('#comments_'+ID).html(data['comments']);

				});

			}else{
				alert('Enter something.');
			}

		});
	});


	// Edit input box click action
	$('.cell_edit_box').mouseup(function(){
		return false
	});

	$('')


	$(".dataTable").tablesorter();

});













