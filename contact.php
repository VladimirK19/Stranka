<?php
   include_once("partials/header.php");
   require_once("_inc/classes/Contact.php");
   
   ?>
   <main>
   <!-- contact section -->
   <div id="contact" class="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <form id="request" class="main_form" action="thankyou.php" method="POST">
                  <div class="row">
                     <div class="col-md-12 ">
                        <h3>Contact Us</h3>
                        <?php
                        ?>
                     </div>
                     <div class="col-md-12 ">
                        <input class="contactus" placeholder="Name"  type="text" name="name" value="" required> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Phone number"   type="phone" name="phone" value=""required> 
                     </div>
                     <div class="col-md-12">
                        <input class="contactus" placeholder="Email"   type="email" name="email" value=""required>   
                     </div>
                     <div class="col-md-12">
                     <input class="contactus" placeholder="Message"   type="message" name="message" value=""required>   
                     </div>
                     <div class="col-md-12">
                        <input type="checkbox" name="acceptance" value="1" required>
                        <label> Súhlasím so spracovaním osobných údajov.</label><br>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" value="SEND" name="contact_submitted" class="send_btn">Send</button>
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