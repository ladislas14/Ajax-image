<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title></title> 
    <link rel="stylesheet" href="css/style.css">
    </head> 
    <body>       
      
        <div id="plupload">
        	<div id="droparea">
        		<p>Déposez vos fichiers ici</p>
        		<span class="or">ou</span>
        		<a href="#" id="browse">Parcourir</a>
        	</div>
        	<div id="filelist">
        		<?php foreach(glob('uploads/*.*') as $v): ?>
                    <div class="file">
                        <img src="<?php echo $v; ?>"/>
                        <?php echo basename($v); ?>
                        <div class="actions">
                            <a href="<?php echo basename($v); ?>" class="del">Supprimer</a>
                        </div>  
                    </div>
                <?php endforeach; ?>
        	</div>
        </div>
         
    </body> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/plupload/plupload.js"></script>
    <script type="text/javascript" src="js/plupload/plupload.flash.js"></script>
    <script type="text/javascript" src="js/plupload/plupload.html5.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</html>