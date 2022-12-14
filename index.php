<?php
include './components/head_css.php';
include './components/navbar.php';

$logged_in = '';
if(isset($_SESSION['margaux_user_id'])) {
    $logged_in = 'yes';
}
?>

<input type="hidden" name="" id="logged_in" value="<?= $logged_in ?>">

<!-- Start Hero Section -->
<section id="home" class="hero">
    <div class="container">
        <div class="row py-5 d-flex justify-content-between align-items-center">
            <div class="col-lg-8 ">
                <div class="text-center text-lg-start">
                    <h1><span>Margaux Cacti & Succulents Corner</span></h1>
                    <p class="mb-7">Open for selling Cactus and succulents, and other different plants</p>
                    <p>
                        <a href="shop.php" class="btn btn-secondary me-2">Shop Now</a>
                        <button id="explore" class="btn btn-white-outline">Explore</button>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class=" d-flex justify-content-center">
                    <img src="./assets/images/kawaii2.png" class="w-100">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Section -->

<!-- Start Product Section -->
<section id="products" class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0 text-center text-lg-start">
                <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                <p class="mb-4">Unique and affordable plant Souvenirs/giveaways for all occasions.</p>
                <p><a href="shop.php" class="btn">Go to Shop</a></p>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.php">
                    <img src="./assets/images/cactus1.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluidd">
                    </span>
                </a>
            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.php">
                    <img src="./assets/images/cactus2.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Kruzo Aero Chair</h3>
                    <strong class="product-price">$78.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluidd">
                    </span>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.php">
                    <img src="./assets/images/cactus3.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Ergonomic Chair</h3>
                    <strong class="product-price">$43.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 4 -->

        </div>
    </div>
</section>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="about bg-dark p-2 w-100 text-white text-center bi">
    <h1>WHY CHOOSE US?</h1>
</div>
<div class="why-choose-section text-white" style="background-color: #fe827a;">
    <div class="container">


        <div class="row my-5 bg-white p-lg-3">


            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="./assets/images/truck.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Fast &amp; Free Shipping</h3>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="./assets/images/bag.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Easy to Shop</h3>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="./assets/images/support.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="./assets/images/return.svg" alt="Image" class="imf-fluid">
                    </div>
                    <h3>Hassle Free Returns</h3>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- End Why Choose Us Section -->



<!-- Start Blog Section -->
<div id="comments" class="blog-section">
    <div class="container">
        <h1>COMMENTS</h1><br>
        <div class="row">

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 mb-5">
                <div class="post-entry">

                    <div class="post-content-entry">
                        <h3><a href="#">First Time Home Owner Ideas</a></h3>
                        <div class="meta">
                            <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Section -->

<script>
$(window).on('load', function() {
    if($('#logged_in').val() != '') {
        Swal.fire({
            title: 'Welcome, <?= $_SESSION['margaux_name'] ?>!',
            toast: true,
            position: 'top-right',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            color: '#000',
            background: '#fe827a',
            timer: 5000,
            timerProgressBar: true,
        })
    }
})

$(document).ready(function() {
    $('#explore').on('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Welcome, <?= $_SESSION['margaux_name'] ?>!',
            toast: true,
            position: 'top-right',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            color: '#000',
            background: '#fe827a',
            timer: 5000,
            timerProgressBar: true,
        })
    })
})
</script>

<?php
include './components/footer.php';
include './components/bottom-script.php';
?>