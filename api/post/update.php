<?php 
	
	header('Access-Control-Allow-Origin: *');
  	header('Content-Type: application/json');
  	header('api-key-auth:@promocode$');
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-Width');

	  include_once '../../config/Database.php';
	  include_once '../../models/Post.php';

	  // Instantiate DB & connect
	  $database = new Database();
	  $db = $database->connect();

	  $post = new Post($db);
	  $header = apache_request_headers();
	  $data = json_decode(file_get_contents("php://input"));
	  if ($header['api-key-auth'] =='@promocode$') { }
	  	$post->title 		= $data->title;
		$post->body 		= $data->body;
		$post->author 	= $data->author;
		$post->category_id = $data->category_id;
		$post->id = $data->id;


		  if ($post->update()) {
		  	echo json_encode(
		   		array('status' => "true")
		  	);
		  }else{
		  	echo json_encode(
		 		array('status' => 'false')
		  	);
		  }