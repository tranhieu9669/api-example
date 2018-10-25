<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('API-KEY-AUTH:@Promocode$');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  $post->read_single();

  //creat array 
  $post_arr = array(
  	'id'		=> $post->id,
  	'title'		=> $post->title,
  	'body'		=> $post->body,
  	'author'	=> $post->author,
  	'category_id'	=> $post->category_id,
  	'category_name' => $post->category_name
  );

  // Make Json 
  print_r(json_encode($post_arr));