<div class="fbg">
  <div class="fbg_resize">
    <div class = "footer">
       <div class="footer_resize">
         <font color = "white">
          <div class="col c2">
           <!-- <h4><span><u>Developer's</span> Information</u> </h4></u>
          <p class="contact_info"> 
       </p> -->
       <?php
      $query = "SELECT * From admin_credentials";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);  
       ?>
       <table style=" border:2px solid silver" cellpadding="5px" cellspacing="0px"
       align="center" border="0">
        <tr> <td>  <h4><span><u>Institution's</span> Information</u> </h4></u>  </td>
             <td><h4><span><u>Developer's</span> Information</u> </h4></u></td>
        </tr>
        <tr> 
          <td><span>Name: - </span> <?php echo $row['PHARMACY_NAME']; ?></td>
          <td> <span>Designed by: - </span><a href="http://www.hellasc.com/">HELLA SOFTWARE COMPANY</a></td>
        </tr>
        <tr>
          <td><span>Address: - </span><?php echo $row['ADDRESS']; ?></td>
          <td><span>Manager: - </span>Balcha Bekele Lawca</td>
        </tr>
        <tr>
          <td><span>Email: - </span><?php echo $row['EMAIL']; ?></td>
          <td><span>Programer: - </span>Balcha Bekele Lawca</td>
        </tr>
        <tr>
          <td><span>Phone: - </span><?php echo $row['CONTACT_NUMBER'] ?></td>
          <td><span>E-mail: - </span> <a href="http://www.gmail.com/balchabekeles">balchabekeles@gmail.com</a></td>
        </tr>
        <tr>
          <td><span>TIN NUMBER: - </span><?php echo $row['TIN_Number']; ?></td>
          <td><span>Telephone: - </span>+2519-3870-9459</td>
        </tr>
        <tr>
          <td><span>Owner: - </span><?php echo $row['Owner_name']; ?></td>
          <td><span>Designer: - </span>Georgis Konaya </td>
        </tr>
        <tr>
          <td><span>Manager: - </span><?php echo $row['Manager']; ?></td>
          <td><span>Address: - </span> Xonso Zone, ETHIOPIA</td>
        </tr>
       </table>
     </font>
        </div>
       </div>
  </div>
   
</div>