<?php



		$searchInput = Input::get('searchInput');

		// if ($searchInput != '') {
			$results = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->take(5)->get();

			foreach ($results as $result) {
				echo '<li>'.$result->name.'</li>';
			}

	var_dump($searchInput);


?>