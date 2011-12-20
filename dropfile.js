(function($){
  
    var o = {
        message : 'Déposez vos fichier ici',
        script : 'upload.php'
    }

    $.fn.dropfile = function(oo){
        if(oo) $.extend(o,oo);         
        this.each(function(){
            $('<span>').addClass('instructions').append(o.message).appendTo(this);
            $('<span>').addClass('progress').append(o.message).appendTo(this);
            $(this).bind({
                dragenter : function(e){
                    e.preventDefault();
                    console.log('dragenter');
                },
                dragover : function(e){
                    e.preventDefault();
                    $(this).addClass('hover');
                    console.log('dragover');
                },
                dragleave : function(e){
                    e.preventDefault();
                    $(this).removeClass('hover');
                    console.log('dragleave');
                }
            });
            this.addEventListener('drop', function(e){
               e.preventDefault(); 
               var files = e.dataTransfer.files;
               if(files.length > 1){
                   alert('Vous ne pouvez envoyer qu\'un seul fichier à la fois.');
                   $(this).removeClass('hover');
                   return false;
               }
               upload(files,$(this));
           }, false); 
        });

        function upload(file,area){
            file = file[0];
            var xhr = new XMLHttpRequest();
            var progress = area.find('.progress');
            // Evenements
            xhr.addEventListener('load',function(e){
                var json = jQuery.parseJSON(e.target.responseText); 
                area.removeClass('hover');
                progress.css({height:0});
                if(json.error){
                    alert(json.error);
                    return false;
                }
                area.append(json.content);
            },false);
            xhr.upload.addEventListener('progress',function(e){
                if(e.lengthComputable){
                    var perc = (Math.round(e.loaded/e.total) * 100)+ '%';
                    progress.css({height:perc}).html(perc);
                }
            },false);
            xhr.open('post',o.script, true);
            xhr.setRequestHeader('content-type', 'multipart/form-data');
            xhr.setRequestHeader('x-file-type', file.type);
            xhr.setRequestHeader('x-file-size', file.fileSize);
            xhr.setRequestHeader('x-file-name', file.fileName);
            xhr.send(file);
        }
    }

})(jQuery);