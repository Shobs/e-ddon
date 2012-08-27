jQuery(document).ready(function ($) {


	$('#deleteRow').click(function(){
		event.preventDefault();
		var ids = [];

		$('.dataTable :checkbox:checked').each(function() {
			ids.push($(this).attr('name'));
	    });
	    console.log(ids);

	    $.each(ids, function(key, value){
	    	var id = value;

	    	var _href = $('#deleteConfirm').attr('href');

	    	$('#deleteConfirm').attr('href', _href+id+',');
	    	// $('#deleteUserConfirm').attr('href', +'&'+$(this));
	    	console.log(id);
	    })

	});



	//data table ajax editing
	$('.tr_edit').click(function(){
		var ID = $(this).attr('id');

		//on row click hiding span and showing text input
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


		// on update button click
		$('#usersUpdate').click(function(){

			//taking all the input text values
			var userid = $('#id_'+ID).html();
			var username = $('#username_input_'+ID).val();
			var lastname = $('#lastname_input_'+ID).val();
			var firstname = $('#firstname_input_'+ID).val();
			var role = $('#role_input_'+ID).val();
			var temporary = $('#temporary_input_'+ID).val();
			var visible = $('#visible_input_'+ID).val();
			var comments = $('#comments_input_'+ID).val();

			// Loading animation while connecting to db
			$('#userid_'+ID).html('<img src="../img/load.gif" />'); // Loading image

			// hiding input text and showing span
			$('.cell_edit_box').hide();
			$('.cell_text').show();

			// checking if fields are not empty
			if(username.length > 0 && lastname.length > 0  && firstname.length > 0 && role.length > 0 && temporary.length > 0 && visible.length > 0 ){

				// Sending data to php
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

					// Formating data from json to js array
					data = $.parseJSON(data);

					// updating spans with new info
					$('#userid_'+ID).html(data['id']);
					$('#username_'+ID).html(data['username']);
					$('#lastname_'+ID).html(data['lastname']);
					$('#firstname_'+ID).html(data['firstname']);
					$('#comments_'+ID).html(data['comments']);
					$('#role_'+ID).html(data['role']);
					$('#visible_'+ID).html(data['visible']);
					$('#temporary_'+ID).html(data['temporary']);
					$('#birthdate_'+ID).html(data['birthdate']);
					$('#created_at_'+ID).html(data['created_at']);
					$('#updated_at_'+ID).html(data['updated_at']);

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


});













