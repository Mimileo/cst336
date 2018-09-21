<?php
 
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
//$searchName = $_GET['value'];
?>

<head>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery.min.js"></script>
<style> 
body,html {
    background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: url("http://mdbootstrap.com/img/Photos/Others/images/91.jpg")0 0 no-repeat / cover;
    background-attachment: fixed;
  
}
.btn .fa {
    margin-left: 3px;
}

.top-nav-collapse {
    background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
   
}

.navbar:not(.top-nav-collapse) {
    background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
}
@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
       background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    }
}
h6 {
    line-height: 1.7;
}
.hm-gradient .full-bg-img {
    background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(29, 210, 177, 0.6) 100%);
    background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(29, 210, 177, 0.6) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.6)), to(rgba(29, 210, 177, 0.6)));
    background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(29, 210, 177, 0.6) 100%);
    background: linear-gradient(to 45deg, rgba(42, 27, 161, 0.6), rgba(29, 210, 177, 0.6) 100%);
}
@media (max-width: 450px) {
    .margins {
        margin-right: 1rem;
        margin-left: 1rem;
    }
}
@media (max-width: 740px) {
    .full-height,
    .full-height body,
    .full-height header,
    .full-height header .view {
        height: 1040px;
    }
}


.top-nav-collapse {
  background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
     
    
}
.navbar:not(.top-nav-collapse) {
    background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    
}
@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
        background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
   
    }
}
.rgba-gradient {
    background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
    background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
    height:100%;
  }
.card {
    background-color: rgba(126, 123, 215, 0.2);
     margin-top: -3rem;
     height: 560px;
     color:white;
  
}

#history {
    margin-top: -2rem;
    color: #cfa5cf;
    height:560px;
    overflow-y: scroll;
}

 .md-form .prefix {
    font-size: 1.5rem;
    margin-top: 1rem;
    
}
.md-form label {
    color: #ffffff;
}
h6 {
    line-height: 1.7;
}

@media (max-width: 740px) {
    .full-height,
    .full-height body,
    .full-height header,
    .full-height header .view {
        height: 700px;
    }
}
      </style>
  <script>
 
      
  </script>
</head>
<html lang="en" class="full-height" >
    
<body id="dummybodyid">
   
         <div class="bg">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed-top" float="right">
        <div class="container">
            
            <a class="navbar-brand" href="#"><h1><strong>Weather Search</strong></h1></a>
   
   
    <div class="nav navbar-nav navbar-right">
      
    <form class="form-inline" float="right" text-align="right">
        <div class="md-form form-sm">
           <form method="GET">
                   <div class="col-sm-24">
                        <input type="text" id="search" class="form-control form-control-lg" placeholder="city, state/country..."aria-label="city,state/country">
    			     
    			          <select id="astronomy" class="custom-select custom-select-lg" value="">
    			              <option value="">- Select One -</option>
    			              <option value="Sunrise">Sunrise</option>
    			              <option value="Sunset">Sunset</option>
    			          </select>
    				<button  type="button" class="btn btn-secondary"  id="submit" value="submit">
    				     Submit
    				</button>
    		
			        </div>
			   </div>
			    </div>
			    </div>
		    </form>
	    </div>
	    </form>
    </div>
    </nav>
      
       <div class="view">
      <!-- Mask & flexbox options-->
      <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
        <!-- Content -->
        <div class="container">
          <!--Grid row-->
          <div class="row mt-5">
            <!--Grid column-->
            <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
              
               <div id="history" style="color: #e7b1dd;"></div>
              
              
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-6 col-xl-5 mb-4">
              <!--Form-->
              <div class="card" >
                <div class="card-body">
                  <!--Header-->
                  <div class="text-center">
                    <h3 class="white-text">
                        
                      <i class="fa fa-user white-text" style="color:white; margin-top:-10rem;">Weather</i></h3>
                    <hr class="hr-light">
                  </div>
                  <div id="main" align="center" margin="auto" style="color:white;"height="1040px">
           
                  </div>
    
                </div>
              </div>
             
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Content -->
      </div>
      <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->
  </header>
  <!-- Main navigation -->
 
  
 
      
</div>
  <script> 
  
    function find(){
    $("#submit").click(function(event) {
         $('#main').empty();
    });
   
    var search= $("#search").val();
    
        $.ajax({
          type: "GET", 
          url:'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'+search+'%2C%20il%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys', 
          datatype: 'json',
          success: function(json_weather){
           

        $('<h3 class="white-text"><i class="fa fa-user white-text">').text(json_weather.query.results.channel.title ).appendTo('#main');
        $('<h3 display="inline">').text('Temperature: ').appendTo('#main'); 
        $('#main').append("<p id='temp' class='lead'>" + json_weather.query.results.channel.item.condition.temp + " <b>&deg;F</b></p>");
        $('<h3>').text('Wind Speed: ').appendTo('#main');
        $('#main').append("<p class='lead'>" + json_weather.query.results.channel.wind.speed + " <b>mph</b></p>"); 
        $('<h3>').text('Forecast: ').appendTo('#main');
        $('#main').append("<p class='lead'>" + json_weather.query.results.channel.item.condition.text + "</p>");
        if($("#astronomy").val() == "Sunset"){
            $('<h3>').text('Sunset: ').appendTo('#main');
            var sunSet = json_weather.query.results.channel.astronomy.sunset;
            for(var i in sunSet)
            {
                if (/^\d{1,2}\:\d{1}\s/.test( a[i] ))
                {
                    var value = /^\d{1,2}(\:\d)\s/.exec(a[i])[1];
                    sunSet[i] = sunSet[i].replace( value, ':0' + value.substr(1) )
                }
            }

            $('#main').append("<p class='lead'>" + sunSet + "</p>");
            
        } else if($("#astronomy").val() == "Sunrise"){
             $('<h3>').text('Sunrise: ').appendTo('#main');
             var sunRise = json_weather.query.results.channel.astronomy.sunrise;
            
            $('#main').append("<p class='lead'>" + sunRise + "</p>");
        }
       
       
        
          }
          
        });
}


function update(){
    $.ajax({
         type : 'GET',
          url:'data.php',
          datatype:"",
          data: { toFind: $("#search").val(),
              
          },
          success: function(toFind,success) {
             $("#history").html(toFind);
          },
        });
}





$(document).ready( function(){
    $("#submit").click(function () {
        find();
        update();
        
        
    })
   
     
});



 	</script>
</body>