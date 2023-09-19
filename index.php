<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include('the1.php');?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
     <script>
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if(xhttp.readyState = 4 && xhttp.status == 200)
          xhttp.responseText;
      };
      xhttp.open("GET", "php/db_connection.php?action=is_logged_in", false);
      xhttp.send();

      //alert(xhttp.responseText);
      if(xhttp.responseText == "")
        window.location.href = "http://localhost/Pharmacy-Management/index.html";
      if(xhttp.responseText == "true")
        window.location.href = "http://localhost/Pharmacy-Management/home.php";

    </script>
  </head>
  <body>
    <div class="container">
      <div class="card m-auto p-2">
        <div class="card-body">
          <form  method="POST" action="">   
            <div class="logo">
           <?php include('the.php'); ?>
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="Username " type="text" class="form-control" placeholder="username" required>
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="Password" type="password" class="form-control" placeholder="password" required>
            </div> <!-- input-group class -->
            <div class="form-group">
            <td></td><td><input type="reset" value ="clear" name="cancel"> 
			<input type="submit" value ="Login" name="solve" ></td>
            </div>
          </form>
          <?php
     if (isset($_POST['solve'])){
       $user='root';
       $pass='';
       $db="pharmacy";
       $conn =new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
      $Username=$_POST['Username'];
       $Password=$_POST['Password'];
     $check_user = "select * from admin_credentials where Username='$Username' and Password='$Password'";
     $run = $conn->query($check_user);
     $result = mysqli_num_rows($run);
     if($result>0){
         $_SESSION['log']['login']    = TRUE;
        $_SESSION['log']['Username'] = $_POST['Username'];
         $session = "1";
     header("Location: home.php");
           }
     else{
 
       echo '<div class="alert alert-dismissable alert-error">';
       echo '<font size="4" color="red">'."Incorrect Administrator Password or Username".'</font>';
       echo '</div>';
     }
   }
     ?>
          <!-- form close -->
        </div> <!-- cord-body class -->
        <div class="card-footer">
          <div class="text-center">
            <a class="text-light" href="forget_pass.php">Forgot password?</a>
          </div>
        </div> <!-- cord-footer class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
