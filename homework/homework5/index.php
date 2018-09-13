<head>
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery.min.js"></script>
  
</head>
<body id="dummybodyid">
    <header>
      <h1 class="jumbotron jumbotron-fluid">Weather Search</h1>
    </header>
    <br/><br>
       <form method="GET">
           <div class="row">
               <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">Search</span>
                        <input type="text" id="search" class="form-control" placeholder="city, state/country..."aria-label="city,state/country">
    			 <span class="input-group-btn">
    				<button type="button" class="btn btn-secondary" onclick='find()' id="submit" value="submit">
    				     Submit
    				     <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    				</button>
    			 </span>
			        </div>
			   </div>
			</div>
				<br><br>
		</form>
      <div id="main" align="center"></div>
      <div id="history">
           <?php
          $date = new DateTime();
            echo date('Y-m-d H:i:s');
          ?>

      </div>

  <script> 
	$("#submit").change(find);
	$("#submit").click(function(){insert(); });
	$("#submit").click(function(){timeStamp(); });

    function find(){
    $("#submit").click(function(event) {
         $('#main').empty();
    });
   
    var search= $("#search").val();
        $.ajax({
          url:'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'+search+'%2C%20il%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys', success: function(json_weather){
           
        
        $('<h1>').text(json_weather.query.results.channel.title ).appendTo('#main');
        $('<h2>').text('Date: ').appendTo('#main');
        $('#main').append(json_weather.query.results.channel.lastBuildDate); 
        $('<h2>').text('Temperature: ').appendTo('#main');    
        $('#main').append(json_weather.query.results.channel.item.condition.temp);
        $('<h2>').text('Wind Chill: ').appendTo('#main');
       
        $('#main').append(json_weather.query.results.channel.wind.chill);
        
          }
          
        });
}

function insert(){
     $.ajax({
         type : 'GET',
          url:'data.php?search=',
          datatype:"",
          data: { value: $("#search").val()
              
          },
          success: function(value) {
              alert(value);
              $("#history").append(value);
          },
          complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
          
        });
}

function timeStamp(){
         $.ajax({
         type : 'GET',
          url:'timestamps.php',
          datatype:"",
          data: { value: $("#search").val()
              
          },
          success: function(value) {
              //alert(value);
              $("#history").append(value);
          },
          complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
          
        });
}

 	</script>
</body>