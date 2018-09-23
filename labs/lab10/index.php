<?php
 // print_r($_FILES);

function display() {
   

    //echo $_FILES['fileName']['name'];

   
    $maxsize    = 1000000;
   //echo filesize($_FILES['fileName']['size']);
    
    $error = 'Error: file too large';
    


if($_FILES['fileName']['size'] < $maxsize) {
      
             //creates jpg image file called "thumb.jpg"
      //echo "<img src='".$tmp_file."'/>";
      move_uploaded_file($_FILES["fileName"]["tmp_name"], "gallery/" . $_FILES['fileName']['name']);
      
     // echo "   ".$_FILES['fileName']['name'];
} else {
    //foreach($errors as $error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h6>'.$error.'</h6><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>';
   // }

    //die(); //Ensure no more processing is done
}

   
    //$thumbs = scandir("testing/",1);
    $files = scandir("gallery/", 1);
   
    $count = 0;
    
    echo "<div class='row justify-content-center'>";
     for($i = 0; $i < count($files) - 2; $i++){
         $count++;
          echo "<a href='#' class='pop'>
                            
                                <div class='square'>
                                    <img id ='thumb' src='gallery/" . $files[$i] . "' width='250' height='250' >
                                </div>
                        
                    </a>";
           if ($count % 3 == 0)
                echo "</div>
                <div class='row justify-content-center'>";
     }
     
     
   /*  
   <div class='row justify-content-center'>"
   echo "<a href='#' class='pop'>
                            <div class='col-lg-4 col-6'>
                                <div class='square'>
                                    <img id ='thumb' src='gallery/" . $files[$i] . "' width='70' height='70' class='img-thumbnail'>
                                </div>
                        </div>
                    </a>";*/
     
   /* echo "thumbs<div class='row justify-content-center'>";
    for($i = 0; $i < count($files) - 2; $i++){
            
            $sourcefile = imagecreatefromstring(file_get_contents('gallery/' . $files[$i]));
            $newx = 300; $newy = 300;  //new size
            //echo "<img src='galley/".$files[$i]."' width='100' class='img-thumbnail'>";
            $thumb = imagecreatetruecolor($newx,$newy);
            imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
            imagesx($sourcefile), imagesy($sourcefile)); 
            
            imagejpeg($thumb, "thumb".($i+1).".jpg"); //creates jpg image file called "thumb.jpg"
            
            //if()
            //rename('gallery/' . $files[$i],'testing/' . $files[$i] );
            //echo "<img src='testing/".$files[$i]."' width='100' class='img-thumbnail'>";
           rename("thumb".($i+1).".jpg", "gallery/".$files[$i]);
           
         echo "<a href='#' class='pop'>
                <div class='col-lg-4 col-6'>
                    <div class='square'><img src='".$files[$i]."' width='100' class='img'>
                    </div>
                </div>
            </a>";
    }*/
    //print_r($files);
    
    //print_r($files);
    echo '<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="height:;" >
      </div> 
      <div class="modal-footer">
         

      </div>
          
          
    </div>
  </div>
</div>';
    
}


/*
    $maxSize = 1000000;
    $filterError="";
    echo "file name " . $_FILES['myFile']['size'];
    if($_FILES['myFile']['size'] > 1000000) {
        $error = "<h1>Error: Large file</h1>";
        echo $error;
    }
    else{
        
    }*/
    
 
    


  

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Image Gallery</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script>
        
           $(document).ready( function(){
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if(this.files[0].size > 1000000){
                   //alert("File is too big!");
                   $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><h6>Error: file too large</h6><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>');
                   this.value = "";
                };
            };
                
               $('.pop').on('click', function() {
               
    			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			    $('#imagemodal').modal('show');   
		});	
		
               //thumb.padding
            
            });
         
            
        </script>
        <style type="text/css">
       
        body, html{
            height:100%;
        }
         
        #gallery {
            padding: 30px;
        }
        
        .imagepreview{
            
            display:block;
           
            padding bottom:200px;
            margin:auto;
            transform: scale(2.2);
            -ms-transform:scale(2.2);
        }
       
        img{
            
             height:250px;
            width:250px;
        }
        
        #thumb{
             border: 1px solid #ddd; /* Gray border */
            border-radius: 4px;  /* Rounded border */
            padding: 5px; /* Some padding */
            height:250px;
            width:250px;
            margin:5px;
        }
        #thumb:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
        .modal-dialog {
            margin: 30vh auto 0px auto
        }
        .square {
            height:250px;
            width:250px;
           margin:5px;
           margin-bottom:10px;
           
           
            background-position: center;
            
           
}
        
        form {
            display: flex; 
            flex-direction: row;
        }
            img{
                display:inline-block;
                margin:10px 0 10px 0;
            }
            
            
             input[type=submit], input[type=file] {
               
                border: none;
                color: white;
                padding: 5px 5px;
                text-decoration: none;
                margin: 4px 50px;
                display:inline-block;
                
            }
            
            #buttons{
                margin:0 auto;
                margin-bottom:0;
            }
            #alert{
               
            }
            .alert {
                
               width:40%;
               margin:10px auto;
            }
            
            header{
                text-align: center;
                padding-top:20px;
                
            }
            .container{
               
               height: 100%;
  
                
            }
        </style>
        
    </head>
    <body>
        <header>
        <h1 class="text-primary">Photo Gallery</h1><hr>
       
        </header>
        <br>
      
        <form method="POST" enctype="multipart/form-data">
            <div id="buttons">
            <span id="submit" class="btn btn-primary">Select file:
            
            
             <input type="file" name="fileName" id="file"/> <br />
              </span>
             <input class="btn btn-primary"type="submit" name="uploadForm" value="Upload File"/>
            
        </div>
       
        </form>
         <div id="alert"></div>
       
      <div id="gallery" class="container">
        <?php
       display();
        /*
            display($files);
            */
        ?>
       
        </div>

    </body>
</html>