<?php 
    header('content-type: application/json');
    $h = getallheaders();
    $o = new stdClass();
    $source = file_get_contents('php://input');
    $types = Array('image/png', 'image/gif', 'image/jpeg');

    if(!in_array($h['x-file-type'],$types)){
        $o->error = 'Format non supporté';
    }else{
        file_put_contents('img/'.$h['x-file-name'],$source);  
        $o->name = $h['x-file-name'];
        $o->content = '<img src="img/'.$h['x-file-name'].'"/>';
    }
    echo json_encode($o);
    
 ?>