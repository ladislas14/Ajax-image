<?php
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	/**
	* PENSER A SECURISER CETTE LIGNE (vérifier le format de file)
	**/
	unlink('uploads/'.$_GET['file']); 
	die();
}
$file = $_FILES['file'];
$name = $file['name'];
if(filesize($file['tmp_name']) > 10000000){
	die('{"error":true, "message": "Image trop grande"}'); 
}
if(file_exists('uploads/'.$name)){
	die('{"error":true, "message": "L\'image existe déjà"}'); 
}
/**
* PENSER A SECURISER CETTE LIGNE (vérifier le format de file)
**/
move_uploaded_file($_FILES['file']['tmp_name'],'uploads/'.$_FILES['file']['name']);
$v = 'uploads/'.$_FILES['file']['name']; 
$html = '<div class="file"><img src="'.$v.'"/> '.basename($v).'<div class="actions"><a href="'.basename($v).'" class="del">Supprimer</a></div> </div>';
$html = str_replace('"','\\"',$html);
die('{"error":false, "html": "'.$html.'"}'); 
?>