

<head>
    <script src="https://code.jquery.com/jquery.min.js"></script>
</head>
<body id="dummybodyid">
    <header>
      <h1>Earthquake Info</h1>
    </header>

      <form method="get">
				Name:   <input type="text" id="name" > <br><br>
				End Time:     <input type="text" id="endtime" > <br><br>
				Latitude:     <input type="text" id="latitude" > <br><br>
				Longitude:    <input type="text" id="longitude" > <br><br>
				Max Radius:   <input type="text" id="maxradius" > <br><br>
				Magnitud (0 to 7): <input type="range" id="minmag" min="0" value="3" max="7"> <br><br>
			</form>
        Change any value to update results.<br><br>
     
      <div id="earthquakeResult"></div>

  <script> 
		
		$("input").change(getEarthquakes);
  	
  	function getEarthquakes() {        
      $.ajax({
            type: "get",
             url: "http://pokeapi.co/api/v2/pokemon",
        dataType: "json",
            data: {
                   "format":"json",
                   "result['name']":$("#starttime").val()

            },
            success: function(data,status) {
            alert(data);
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
    }

 	</script>
 	</body>