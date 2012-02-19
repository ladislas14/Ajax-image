<?php
$d = array();

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	/**
	* PENSER A SECURISER CETTE LIGNE (vérifier le format de file)
	**/
	unlink('uploads/'.$_GET['file']); 
	die();
}
$file = $_FILES['file'];
$name = $file['name'];

$d['file']['name'] = $file['name'];
$d['file']['title'] = explode('.',$file['name']);
$d['file']['title'] = $d['file']['title'][0];
$d['file']['type'] = $file['type'];
$d['file']['size'] = $file['size'];
$d['file']['online'] = date('Y-m-d');

if(filesize($file['tmp_name']) > 10000000){
	$d['error'] = 'true';
	$d['message'] = 'Image trop grande';
}
if(file_exists('uploads/'.$name)){
	$d['error'] = 'true';
	$d['message'] = "L'image existe déjà";
}

try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=ajax-image', 'root', '', $pdo_options);
    
    $req = $bdd->prepare('INSERT INTO medias(name, title, type, size, online) VALUES(:name, :title, :type, :size, :online)');
	$req->execute($d['file']);
	}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
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