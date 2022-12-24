<?php
include './components/head_css.php';
include './components/navbar.php';

$logged_in = '';
if(isset($_SESSION['margaux_user_id'])) {
    $logged_in = 'yes';
}
?>
<head>

<style>
.position {
    margin-top: 84px !important;
}

.swiper {
    width: 100%;
    height: 500px;
}

</style>
</head>
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
                        <!-- <button id="explore" class="btn btn-white-outline">Explore</button> -->
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

<!-- SWIPER JS -->
<?php
$getCategory = mysqli_query($conn, "SELECT * FROM tbl_category WHERE isDeleted = 0");

if(mysqli_num_rows($getCategory) > 0) {
?>
<div class="container mb-5" id="categorySection" style="height: 100%;">
    <h1 class="text-center mb-4 mt-5" style="color: #000;">Categories</h1>
                <div class="row d-flex justify-content-center align-items-stretch" style="height: 100%;">
  <?php
        foreach($getCategory as $category) {
        ?> <a href="product.php?categoryId=<?= $category['categoryId']; ?>" class="col-sm-6 col-md-4 col-xxl-3 mb-4"
            style="height: 100%; text-decoration: none;">
           <div class="card px-2 pt-2" style="height: 100%;">
                <div class="image-cont" style="height: 200px; width: 100%;">
                    <img src="./admin/assets/images/categoryImages/<?= $category['categoryThumbnail']; ?>"
                        class="w-100 h-100" style="object-fit: cover;" alt="">
                </div>
                <div class="category-content mt-1 text-center">
                    <h5 style="text-transform: uppercase; font-weight: 700;"><?= $category['categoryName']; ?></h5>
                </div>
            </div>
        </a>
       
<?php
        }
        ?>  
             
   
     <!--      <a href="product.php?categoryId=<?= $category['categoryId']; ?>" class="col-sm-6 col-md-4 col-xxl-3 mb-4"
            style="height: 100%; text-decoration: none;">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          
                <div class="carousel-inner">
                    <div class="carousel-item active">  
                    <div class="image-cont" style="height: 200px; width: 100%;">
                                    <img src="./admin/assets/images/categoryImages/<?= $category['categoryThumbnail']; ?>"
                                        class="w-100 h-100" style="object-fit: cover;" alt="">
                                </div>
                                <div class="category-content mt-1 text-center">
                                    <h5 style="text-transform: uppercase; font-weight: 700;"><?= $category['categoryName']; ?></h5>
                                </div>
                    </div>  
     </div>
                         
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
     </button>
                </div>
        </a>-->
     
    </div>
</div>   
<?php
}
?>


<section id="products" class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0 text-center text-lg-start">
                <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                <p class="mb-4">Unique and affordable plant Souvenirs/giveaways for all occasions.</p>
                <p><a href="shop.php" class="btn">Go to Shop</a></p>
            </div>
            <?php
            $getProduct = mysqli_query($conn, "SELECT * FROM tbl_product ORDER BY productId ASC LIMIT 3");

            foreach($getProduct as $product) {
            ?>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <a class="product-item" href="cart.php">
                    <img src="./admin/assets/images/productImages/<?= $product['productThumbnail'] ?>"
                        class="img-fluid product-thumbnail">
                    <h3 class="product-title"><?= $product['productName'] ?></h3>
                    <strong class="product-price">P<?= $product['productPrice'] ?></strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluidd">
                    </span>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section> 
<!-- End Product Section-->

<!-- Start Why Choose Us Section -->
<!-- <div class="about bg-dark p-2 w-100 text-white text-center bi">
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
</div> -->
<!-- End Why Choose Us Section -->



<!-- Start Blog Section -->
<!-- <div id="comments" class="blog-section">
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
</div> -->
<!-- End Blog Section -->

<script>
$(window).on('load', function() {
    if (localStorage.getItem('status') == 'welcome') {
        Swal.fire({
            title: 'Welcome, <?= $_SESSION['margaux_name'] ?>!',
            toast: true,
            position: 'top-right',
            iconColor: '#fe827a',
            confirmButtonColor: '#fe827a',
            showConfirmButton: false,
            color: '#fe827a',
            background: '#212529',
            timer: 5000,
            timerProgressBar: true,
            customClass: {
                container: 'position'
            },
        })
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'ordered') {
        Swal.fire({
            icon: 'success',
            title: 'Thank you!',
            text: 'Your order was successfully submitted! Please wait for the order confirmation we\'re about to send you via email.',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            color: '#000',
            background: '#fe827a',
        })
        localStorage.removeItem('status');
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

<script>
const swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    spaceBetween: 15,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>

