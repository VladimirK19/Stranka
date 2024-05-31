<?php
 include("partials/header.php");
 require("partials/connection.php");

   $name="";
   $phone="";
   $email="";
   $message="";
   
   $name_error="";
   $phone_error="";
   $email_error="";
   $message_error="";
   
   $error=false;
   if($_SERVER['REQUEST_METHOD']=='POST'){
      $name=$_POST["name"];
      $phone=$_POST["phone"];
      $email=$_POST["email"];
      $message=$_POST["message"];
      
      do{
         if(empty($name)){
            $name_error="First name is required";
            $error=true;
            break;
         }
         if (!preg_match("/^(\+|00\d{1,3})?[- ]?\d{7,12}$/", $phone)) {
            $phone_error = "Phone format is not valid";
            $error = true;
            break;
         }
         if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error = "Email format is not valid";
            $error=true;
            break;
         }
         if(empty($message)){
            $message_error="message is empty";
            $error=true;
            break;
         }
         if(!$error){
            $sql="INSERT INTO contact(name,phone,email,message) VALUES('$name','$phone','$email','$message')";
            $result = $connection->query($sql);
         }
         if(!$result){
            $errorMessage="Invalid query" . $connection->error;
            break;
         }
         
         $successMessage="Message was sent";
                  
      }while(false);
   }
   ?>
   <main>
   <!-- contact section -->
   <div id="contact" class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <form id="request" class="main_form" method="POST">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h3>Contact Us</h3>
                        <?php
                           if(!empty($successMessage)){
                           echo"
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                       <strong>$successMessage</strong>
                                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                           ";
                        }
                        ?>
                     </div>
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name"  type="text" name="name" value="" required> 
                        <span class="text-danger"><?=$name_error?></span>
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Phone number"   type="phone" name="phone" value=""> 
                        <span class="text-danger"><?=$phone_error?></span>
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Email"   type="email" name="email" value="">   
                        <span class="text-danger"><?=$email_error?></span>                       
                     </div>
                     <div class="col-md-12">
                     <input class="contactus" placeholder="Message"   type="message" name="message" value="">   
                        <span class="text-danger"><?=$message_error?></span>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" value="SEND" class="send_btn">Send</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
    <div class="container-fluid">
       <div class="map_section">
          <div id="map">
             </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: 48.306141, lng: 18.076376},
         });
         
         var image = 'images/maps-and-flags.png';
         var beachMarker = new google.maps.Marker({
            position: {lat: 48.306141, lng: 18.076376},
            map: map,
            icon: image
         });
      }
   </script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js --> 
</main>
<?php
   include("partials/footer.php");
?>