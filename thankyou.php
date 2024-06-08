<?php
include('partials/header.php');
require_once("_inc/classes/Contact.php");

?> 
<main>
        <div class="about">
       <div class="container">
          <div class="row d_flex">
             <div class="col-md-5">
                <div class="about_img">
                   <figure><img src="images/about_img.png" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="titlepage">
                  <h2>Thank you!</h2>
                     <p>Thank you.</p>
                     <p>Your contact was submitted.</p>

                        <?php
                        $contact_object = new ContactForm();
                        $contact_object->insert();
                      ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
      </section>
    </main>
    
<?php
    include_once('partials/footer.php')
?> 