

<?php session_start(); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Admin Login Page </title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <style>
            @import url('css/styles.css');
            </style>
    </head>
    <body>
    <div class="container">
        <div class="row">
      
       <h1> Admin Login </h1>
      
        
        <form class="form-signin" method="POST" action="loginProcess.php" >
            <div class="input-group input-group-lg">
             <label class="input-group-addon" id="sizing-addon1" for="formGroupExampleInput"> Username:</label>
                <input type="text" class="form-control input-group-lg" id="formGroupExampleInput" name="username"/> <br />
             </div>
             <br/><br/>
             <div class="form-group">
                 <div class="input-group input-group-lg">
                <label class="input-group-addon" id="sizing-addon1" for="formGroupExampleInput"> Password: </label>
                    <input type="password" class="form-control input-md chat-input" id="formGroupExampleInput" name="password"/> <br />
                 </div>
             
             <br/> 
            <input type="submit"  class="btn btn-info btn-block btn-lg" name="login" value="Login"/>
            </div>
            </div>
            
        </form>
        <?php
       if (isset($_SESSION['error'])) {
  echo "<p class='text-warning'>" . $_SESSION['error']. "</p>";
  unset($_SESSION['error']);
 
}
?>
    </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>     
    </body>
</html>