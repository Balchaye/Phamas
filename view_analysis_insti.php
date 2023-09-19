<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include('the1.php');?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/restrict.js"></script>
  </head>
  <body>
    <?php include "sections/sidenav.html"; ?>
    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          require 'php/db_connection.php';
          $query = "SELECT PHARMACY_NAME FROM admin_credentials";
          $result = mysqli_query($con, $query);
          $row = mysqli_fetch_array($result);
          createHeader('home', $row['PHARMACY_NAME'], 'Pharmacy Management System Home Page');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 10px;">
          <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <div class="h5">Top 3 Zones with hieghest Bought</div>
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT Region,Zone,AREA_QUANTITY  FROM areas ORDER BY AREA_QUANTITY DESC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name Zone with Its Region" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Region'];
                          $so = $row['Zone'];
                          $tos = $row['AREA_QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 20px;">
          <table class="table table-bordered table-striped table-hover" style=" border:2px solid silver" cellpadding="5px" cellspacing="0px">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                      <div class="h5">Top 3 Medicine hieghest Bought</div>
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT NAME, GENERIC_NAME, MEDICINE_QUAN  FROM medicines ORDER BY MEDICINE_QUAN DESC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name of Medicine and its Generic Name" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['NAME'];
                          $so = $row['GENERIC_NAME'];
                          $tos = $row['MEDICINE_QUAN'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
        <!-- the starting of the Today's report
          the report of the day that was sold by the institution -->

          <div class="col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 30px;">
            <div class="todays-report">
              <div class="h5">Top 3 Institution With Highest Bought</div>
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <?php
                     
                      $query = "SELECT Institutionname,QUANTITY  FROM customers ORDER BY QUANTITY DESC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name of the Institution" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Institutionname'];
                          $total = $row['QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .'</th>';
                          echo '<th class="text-success">' .$total .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        <!-- the end of the report done by the sytem -->
        </div>

        <hr style="border-top: 2px solid #ff5252;">

        <div class="row">
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 10px;">
          <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <div class="h5"><font color = "red">
                      Least 3 Zones with Lowest Bought</div>
                    </font> 
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT Region,Zone,AREA_QUANTITY  FROM areas ORDER BY AREA_QUANTITY ASC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name Zone with Its Region" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Region'];
                          $so = $row['Zone'];
                          $tos = $row['AREA_QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 20px;">
          <table class="table table-bordered table-striped table-hover" style=" border:2px solid silver" cellpadding="5px" cellspacing="0px">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                      <div class="h5"><font color = "red">
                        Least 3 Medicines with Lowest Bought</div>
                        </font> 
                        
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT NAME, GENERIC_NAME, MEDICINE_QUAN  FROM medicines ORDER BY MEDICINE_QUAN ASC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name of Medicine and its Generic Name" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['NAME'];
                          $so = $row['GENERIC_NAME'];
                          $tos = $row['MEDICINE_QUAN'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
          <div class="col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 30px;">
            <div class="todays-report">
              <div class="h5"><font color="red"> Least 3 Institution With Lowest Bought</font></div>
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <?php
                     
                      $query = "SELECT Institutionname,QUANTITY  FROM customers ORDER BY QUANTITY ASC LIMIT 3  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name of the Institution" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Institutionname'];
                          $total = $row['QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .'</th>';
                          echo '<th class="text-success">' .$total .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        <!-- form content end -->
           
        <hr style="border-top: 2px solid #ff5252;"> 
        
        <hr style="border-top: 2px solid #ff5252;"> 

        <div class="row">
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 10px;">
          <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <div class="h5"><font color = "blue-black">
                      List of Zones and Medicine They Bought</div>
                    </font> 
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT Region,Zone,AREA_QUANTITY  FROM areas ORDER BY AREA_QUANTITY DESC  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name Zone with Its Region" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Region'];
                          $so = $row['Zone'];
                          $tos = $row['AREA_QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
          <div class="row col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 20px;">
          <table class="table table-bordered table-striped table-hover" style=" border:2px solid silver" cellpadding="5px" cellspacing="0px">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                      <div class="h5"><font color = "blue-black">
                      List of Zones and Medicine They Bought</div>
                        </font> 
                        
                  </tr>
                  <tr>
                    <?php
                     
                      $query = "SELECT Region,Zone,AREA_QUANTITY  FROM areas ORDER BY AREA_QUANTITY DESC  ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name Zone with Its Region" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Region'];
                          $so = $row['Zone'];
                          $tos = $row['AREA_QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .",".$so.'</th>';
                          echo '<th class="text-success">' .$tos .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
              
          </div>
          <div class="col col-xs-3.5 col-sm-3.5 col-md-3.5 col-lg-3.5" style="padding: 7px 0; margin-left: 30px;">
            <div class="todays-report">
              <div class="h5"><font color="blue-black"> List of Institution that Bought medicine</font></div>
              <table class="table table-bordered table-striped table-hover">
                <tbody>
                  <?php
                    require 'php/db_connection.php';
                    
                  ?>
                  <tr>
                    <?php
                     
                      $query = "SELECT Institutionname,QUANTITY  FROM customers ORDER BY QUANTITY DESC ";
                      // DESC/ASC used for descending and ascending order
                      $result = mysqli_query($con, $query);
                      if(mysqli_num_rows($result)>0)
                      {
                          echo '<tr>';
                          echo '<th>' . "Name of the Institution" . '</th>';
                          echo '<th>' . "Drug in Quantity" . '</th>';
                          echo '</tr>';
                        // out put data of each row
                        while($row = mysqli_fetch_assoc($result)){
                          $name =  $row['Institutionname'];
                          $total = $row['QUANTITY'];
                          echo '<tr>';
                          echo '<th>' .$name .'</th>';
                          echo '<th class="text-success">' .$total .'</th>';
                          echo '</tr>';
                        } 
                      }
                      
                    ?>
                  </tr>  
                </tbody>
              </table>
            </div>
          </div>
        <!-- form content end -->
           
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
  <?php include "root.php"; ?>
</html>
