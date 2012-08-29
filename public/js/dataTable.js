jQuery(document).ready(function ($) {


	// $('#deleteRow').click(function(){
	// 	event.preventDefault();
	// 	var ids = [];

	// 	$('.dataTable :checkbox:checked').each(function() {
	// 		ids.push($(this).attr('name'));
	//     });
	//     console.log(ids);

	//     $.each(ids, function(key, value){
	//     	var id = value;

	//     	var href = $('#deleteConfirm').prop('href');
	//     	var _href = href+id+'u';
	//     	console.log(_href);
	//     	$('#deleteConfirm').prop('href', _href);
	//     	// $('#deleteUserConfirm').attr('href', +'&'+$(this));
	//     	console.log(id);
	//     })

	// });



	//data table ajax editing
	$('.tr_edit').click(function(){
		var ID = $(this).attr('id');

		//on row click hiding span and showing text input
		//Users span hide
		$('#username_'+ID).hide();
		$('#lastname_'+ID).hide();
		$('#firstname_'+ID).hide();
		$('#role_'+ID).hide();
		$('#temporary_'+ID).hide();
		$('#visible_'+ID).hide();
		$('#comments_'+ID).hide();

		// Addons span hide
		$('#name_'+ID).hide();
		$('#user_id_'+ID).hide();
		$('#author_'+ID).hide();
		$('#version_'+ID).hide();
		$('#rating_'+ID).hide();
		$('#downloaded_'+ID).hide();
		$('#category_id_'+ID).hide();
		$('#selected_'+ID).hide();
		$('#visible_'+ID).hide();

		// User input show
		$('#username_input_'+ID).show();
		$('#lastname_input_'+ID).show();
		$('#firstname_input_'+ID).show();
		$('#role_input_'+ID).show();
		$('#temporary_input_'+ID).show();
		$('#visible_input_'+ID).show();
		$('#comments_input_'+ID).show();

		// addons input show
		$('#name_input_'+ID).show();
		$('#user_id_input_'+ID).show();
		$('#author_input_'+ID).show();
		$('#version_input_'+ID).show();
		$('#rating_input_'+ID).show();
		$('#downloaded_input_'+ID).show();
		$('#category_id_input_'+ID).show();
		$('#selected_input_'+ID).show();
		$('#visible_input_'+ID).show();



		// user update button click
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
			$('#id_'+ID).html('<img src="../img/load.gif" />'); // Loading image

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

		// addon update button click
		$('#addonsUpdate').click(function(){

			//taking all the input text values
			var addonid = $('#id_'+ID).html();
			var name = $('#name_input_'+ID).val();
			var user_id = $('#user_id_input_'+ID).val();
			var author = $('#author_input_'+ID).val();
			var version = $('#version_input_'+ID).val();
			var rating = $('#rating_input_'+ID).val();
			var downloaded = $('#downloaded_input_'+ID).val();
			var category_id = $('#category_id_input_'+ID).val();
			var selected = $('#selected_input_'+ID).val();
			var visible = $('#visible_input_'+ID).val();

			// Loading animation while connecting to db
			$('#id_'+ID).html('<img src="../img/load.gif" />'); // Loading image

			// hiding input text and showing span
			$('.cell_edit_box').hide();
			$('.cell_text').show();

			// checking if fields are not empty
			if(name.length > 0 && user_id.length > 0  && author.length > 0 && version.length > 0 && rating.length > 0 && downloaded.length > 0 && category_id.length > 0 && selected.length > 0 && visible.length > 0){

				// Sending data to php
				$.post(BASE+'/addonstable', {
					id : addonid,
					name : name,
					user_id : user_id,
					author : author,
					version : version,
					rating : rating,
					downloaded : downloaded,
					category_id : category_id,
					selected : selected,
					visible : visible,

				}, function(data){

					// Formating data from json to js array
					data = $.parseJSON(data);

					// updating spans with new info
					$('#id_'+ID).html(data['id']);
					$('#name_'+ID).html(data['name']);
					$('#user_id_'+ID).html(data['user_id']);
					$('#author_'+ID).html(data['author']);
					$('#version_'+ID).html(data['version']);
					$('#rating_'+ID).html(data['rating']);
					$('#downloaded_'+ID).html(data['downloaded']);
					$('#category_id_'+ID).html(data['category_id']);
					$('#selected_'+ID).html(data['selected']);
					$('#visible_'+ID).html(data['visible']);
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













