<!DOCTYPE html>
<html>
    <head>
        <title>DropArea</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="http://www.grafikart.fr/demo/coreadmin/css/style.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        
        <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript" src="js/dropfile.js"></script>
        <script type="text/javascript">
            jQuery(function($){
                $('.dropfile').dropfile();
            });
        </script>   
    </head>
    <body class="wood dark">
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="" class="button profile"><img src="http://www.grafikart.fr/demo/coreadmin/img/icons/top/huser.png" alt="" /></a>
                Bonjour, 
                <a href="#">Grafikart.fr</a>
            </div>
        </div>
        <div id="content" class="nosidebar">
            <h1>Upload en Drag & Drop</h1>
            <div class="bloc">
                <div class="title">Ajout d'une nouvelle image</div>
                <div class="content">
                        <div class="dropfile"></div>
                        <div class="progress">
                            <div class="percent">50%</div>
                            <div class="bar" style="width: 50%"></div>
                        </div>
                </div>
            </div>
        </div>
        
        
    </body>
</html>