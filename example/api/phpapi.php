<?php
	header('Access-Control-Allow-Origin: *');

	header('Content-Type: application/json');

	/*
		API Example, this will return a json object
	*/

	$order = '';
	
	try{
		$order = $_GET['order'];
	} catch(Exception $e){
		echo 'No order';
	}
	switch ($order) {
		case 'value':
			echo '{"Msg":"Get Something","Content":"Some content here"}';
			break;

		case 'pag1':
			echo '{"Msg":"Get Something","Content":"Page one from API connection"}';
			break;

		case 'pag1':
			echo '{"Msg":"Get Something","Content":"Page two from API connection"}';
			break;	
		
		default:
			echo '{"Msg":"No input","Content":"No order detected"}';
			break;
	}
	
?>