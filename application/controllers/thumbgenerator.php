<?php

class Thumbgenerator_Controller extends Base_Controller{

	// public $restful = true;

	public function action_generate(){

		$pictures = Picture::order_by('id', 'asc')->get();


			foreach( $pictures as $picture){

				$pictureExtension = File::extension($picture->name);

				$thumbDirectory = 'public/_uploads/thumbs/'.sha1(Auth::user()->id);

				$thumbFilename = sha1(Auth::user()->id.time()).".{$pictureExtension}";

				 $image = File::get($picture->location);

				var_dump($picture->location);

				$thumb_upload_success = Resizer::open( $image )
				    ->resize(260 , 200 , 'crop')
				    ->save( $thumbDirectory.'/'.$thumbFilename , 90);

				$picture = new Picture(array(
					'thumb' => '..public/_uploads/thumbs/'.sha1(Auth::user()->id).'/'.$thumbFilename,
					));

				if($thumb_upload_success){
				$picture_save = $picture->save();
				}

				if($picture_save){
					echo 'success';
				}else{
					echo 'failed';
				}

			}



	}

}

?>