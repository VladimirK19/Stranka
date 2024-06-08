<?php
include_once("partials/header.php");
?>
<main>
    <div class="glasses">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="titlepage">
                        <h2>Our Glasses</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <?php
                include_once('_inc/classes/Glasses_Display.php');
                $glasses_display = new Glasses_Display();
                $glasses_display->getGlasses();
                ?>
            </div>
        </div>
    </div>
</main>
<!-- end Our Glasses section -->
<?php
include_once("partials/footer.php");
?>