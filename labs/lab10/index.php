<?php
 // print_r($_FILES);


//  echo "File size " . $_FILES['myFile']['size'];

  
  
   if($_FILES['myFile']['size'] > 1000000) {
        echo "<p>Error: Large file</p>";
    }
    
   else if($_FILES['myFile']['size'] < 1000000) {
      //move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"]);
       move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
      
  } 

 //echo "<img src='gallery/". $_FILES['myFile']['name'] . "'>";
    //$size = $_FILES['myFile']['size'];
    
    $files = scandir("gallery/", 1);
    print_r($files);
    for($i = 0; $i < count($files) - 2;$i++){
      echo "<img src='gallery/" . $files[$i] . "' width='100' class='img-thumbnail'>";
    }
    
   
    // print_r($files);
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
                
                $('img').on('click', function(){
                   if($('#focus').length != 0) {
                      $('#focus').attr('id','');
                   }
                   
                   $(this).attr('id', 'focus');
                    
                });
            });
            
        </script>
        <style type="text/css">
            #focus{
                width: 400px;
                height:400px;
                
                
            }
            
            img {
                margin: 120px 40px 0 0;
                
                
            }
            body{
                background:#d5e1df;
                
            }
            
            p{
                color:red;
            }
            
            header{
                background:#009688;
                margin:20px auto;
                width:50%;
                border-radius:50px;
            }
            h1{
                margin:0 auto;
                text-align:center;
                width:50%;
                padding:20px;
                color:white;
                
            }
            #gallery{
                text-align:center;
                background:grey;
                
                margin:0 90px;
                height:70%;
            }
            #buttons{
             text-align:center;
             margin-bottom:40px;
            }
            
            #btn {
                 color: #009688;
                 background: #fff;
                 border: 1px solid #009688;
                 font-size: 17px;
                 padding: 7px 12px;
                 font-weight: normal;
                 margin: 6px 0;
                 margin-right: 12px;
                 display: inline-block;
                 text-decoration: none;
                 font-family: 'Open Sans', sans-serif;
                 min-width: 120px;
            }
            
            #btn:hover{
                color:#fff;
                background:#009688;
            }
            
            .inputfile{
                 	width: 0.1px;
                	height: 0.1px;
                	opacity: 0;
                	overflow: hidden;
                	position: absolute;
                	z-index: -1;
            }
            
            label {
               color: #009688;
                 background: #fff;
                 border: 1px solid #009688;
                 font-size: 17px;
                 padding: 7px 12px;
                 font-weight: normal;
                 margin: 6px 0;
                 margin-right: 12px;
                 display: inline-block;
                 text-decoration: none;
                 font-family: 'Open Sans', sans-serif;
                 min-width: 120px;
                 border-radius: 4px;
            }
            
            input[type="file"] {
                display: none;
            }
        .inputfile {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
                    
         label:focus,
         label:hover {
            color:#fff;
                background:#009688;
            }
        </style>
        
    </head>
    <body>
        <header>
        <h1>Photo Gallery</h1>
       
        </header>
        <br>
       <div id="gallery">
        <form method="POST" enctype="multipart/form-data"> 
        <div id="buttons">
            <label class="custom-file-upload">
                <input class="inputfile" type="file" name="myFile" /> 
                Choose File
            </label>
            
            <input id="btn" type="submit"  name="submit" value="Upload File!"/>
        </div>

        
        </form>
        
       
            <?php
           /* 
        for ($i = 0; $i < count($files) - 2; $i++) {
        
        createThumbnail('gallery/'.$files[$i]);
        if($i % 3 == 2){
            echo"<br>";
        }
          // echo "<img src='gallery/" .   $files[$i] . "' width='50' >";
      
        }*/
            ?>
        </div>

    </body>
</html>