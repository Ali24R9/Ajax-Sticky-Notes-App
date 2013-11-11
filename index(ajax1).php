<?php


require("connection.php");
session_start();
?>

<html>
<head>
		<title>Ajax: Basic Assignment 1</title>
		<link type="text/css" rel="stylesheet" href="ajax1.css">
		<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
		 <script type="text/javascript">
		$(document).ready(function(){
			$('#form').submit(function(){
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data){	
						$('#box').html('');
						if(data)
						{
							for(i=0; i<data.length; i++)
							{
								
								$('#box').append('<div class="box">'+data[i].description+ '<br> Created at: ' +data[i].created_at+'</div>');
							// console.log(data[i].description);
							// $('#box').html(data);
							}
						} 
					},
					"json"
					);
					return false;					

			});
			$('#form').submit();

		});
		</script>
</head>
<body>

<div id="box">
</div>
<form id="form" action="process.php" method="post">
	<!-- <input type="hidden" name="action" value="note"> -->
	<textarea name="note" cols="50" rows="6" placeholder="New Note..."></textarea><br>
	<input type="submit" value="Post Note">
</form>
	
</body>

</html>