<?php

	session_start();
	require("connection.php");

if(isset($_POST['note']) AND !empty($_POST['note']))
{
	post();
}
else{
	show_note();
}
function post()
{

	$post_query= "INSERT INTO posts(description, created_at, updated_at) VALUES('{$_POST['note']}', NOW(), NOW())";
	// echo $post_query;
	// die();
	mysql_query($post_query);
	show_note();
}

function show_note()
{
		$posted_note="";
		$notes_query="SELECT posts.description, posts.created_at FROM posts ORDER BY created_at DESC";
		$notes = fetch_all($notes_query);
	// var_dump($notes);
		// foreach($notes as $note)
		// 	{
		// $posted_note.="
		// 	<div class='box'>
	
		// 	{$note['description']}<br>{$note['created_at']}
	
		// 	</div>";
		// }
	// var_dump($posted_note);
	// var_dump($notes);
		echo json_encode($notes);
}


?>