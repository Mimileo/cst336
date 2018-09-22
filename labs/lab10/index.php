<?php
 // print_r($_FILES);
 function createThumbnail($file){
     
          
           
 }
function display() {
   
if(isset($_FILES['fileName'])) {
    //echo $_FILES['fileName']['name'];
    $errors     = array();
    $maxsize    = 1000000;
    $acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );

    if(($_FILES['fileName']['size'] >= $maxsize) || ($_FILES["fileName"]["size"] == 0)) {
        $errors[] = 'Error: file too large';
    }


if(count($errors) === 0) {
      
             //creates jpg image file called "thumb.jpg"
      //echo "<img src='".$tmp_file."'/>";
      move_uploaded_file($_FILES["fileName"]["tmp_name"], "gallery/" . $_FILES['fileName']['name']);
     // echo "   ".$_FILES['fileName']['name'];
} else {
    foreach($errors as $error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><h6>'.$error.'</h6><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
    }

    //die(); //Ensure no more processing is done
}

   
    //$thumbs = scandir("testing/",1);
    $files = scandir("gallery/", 1);
   
    $count = 0;
    echo "<div class='row justify-content-center'>";
     for($i = 0; $i < count($files) - 2; $i++){
         $count++;
          echo "<a href='#' class='pop'><div class='col-xs-3'><div class='square'>
          <img src='gallery/" . $files[$i] . "' width='100' class='img-thumbnail'></div></div></a>";
           if ($count % 3 == 0)
                echo "</div><div class='row justify-content-center'>";
     }
    echo "<br/>Thumbs<br/>";
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
           // rename("testing/thumb".($i+1).".jpg", "gallery/thumb".($i+1).".jpg");
           
         echo "<a href='#' class='pop'>
                <div class='col-lg-4 col-6'>
                    <div class='square'><img src='thumb".($i+1).".jpg' width='100' class='img'>
                    </div>
                </div>
            </a>";
    }
    //print_r($files);
    echo "files</br>";
    
    for($i=0;$i < count($files)-2;$i++){
            $count++;
            //echo $count;
            echo "<a href='#' class='pop'>
                <div class='col-lg-4 col-6'>
                    <div class='square'>
                        <img class='img-thumbnail img-fluid' src='gallery/".$files[$i]."' >
                    </div>
                </div>
            </a>";
            if ($count % 3 == 0)
                echo "</div><div class='row justify-content-center'>";
    }
    //print_r($files);
    echo '<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content">              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div> 
      <div class="modal-footer">
         

      </div>
          
          
    </div>
  </div>
</div>';
    
}
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
    
 
    

/*

   $error = "";
   if($_FILES['myFile']['size'] > 1000000) {
        $error = "<h1>Error: Large file</h1>";
        echo $error;
    }
    
   if($_FILES['myFile']['size'] < 1000000) {

      //move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
       move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
       $error ="Success";
       echo $error;
  } 

 //echo "<img src='gallery/". $_FILES['myFile']['name'] . "'>";
    //$size = $_FILES['myFile']['size'];
    
        $files = scandir("gallery/", 1);
   
     function display($files){
         
        for($i = 0; $i < count($files) - 2;$i++){
            echo "printing".$files[$i];
            $sourcefile = imagecreatefromstring(file_get_contents('gallery/' . $files[$i]));
            $newx = 150; $newy = 150;  //new size
           
            $thumb = imagecreatetruecolor($newx,$newy);
            imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
            imagesx($sourcefile), imagesy($sourcefile)); 
            imagejpeg($thumb, "thumb".($i+1).".jpg"); //creates jpg image file called "thumb.jpg"
            echo "<img src='thumb".($i+1).".jpg' width='100' class='img-thumbnail'>";
        }
        
}
    
*/
    //print_r($files);
/*
function createThumbnail($file){
    $sourcefile = imagecreatefromstring(file_get_contents($file));
    $newx = 150; $newy = 150;  //new size
    $thumb = imagecreatetruecolor($newx,$newy);
    imagecopyresampled($thumb, $sourcefile, 0,0, 0,0, $newx, $newy,     
     imagesx($sourcefile), imagesy($sourcefile)); 
    imagejpeg($thumb,$file); //creates jpg image file called "thumb.jpg"
    echo "<img class='img-thumbnail' src=$file>";
}

*/
  

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
               $('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
            
            });
           // $('element').css('position', 'absolute');
            
        </script>
        <style type="text/css">
       
        body, html{
            height:100%;
        }
        #gallery {
           
            padding-top:60px;
            
  
         
        }
        img{
            
            width: 100%;
            height:auto;
        }
        .square {
            height:300px;
            width:300px;
            padding-bottom: 10%;
            background-size: cover;
            background-position: center;
            margin: 2%;
           
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