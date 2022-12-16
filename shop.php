<?php
include './components/head_css.php';
include './components/navbar.php';
?>

<!-- Start Hero Section -->
<div class="hero p-2">
    <div class="container  pt-4">
        <div class="row justify-content-between">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>SHOP</h1>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cacti</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="plant_id" id="plant_id" class="form-control mb-3">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="./assets/images/cactus14.jpg" style="object-fit: cover; width: 250px; height: 250px"
                            alt="">
                    </div>
                    <div class="col-md-12">
                        <p style="font-size: 14px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo,
                            corrupti odit nihil qui
                            exercitationem cumque facere itaque placeat ipsam commodi!</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <p style="font-size: 16px;">Price: <span style="font-size: 21px;" class="fw-bold">1600.00</span>
                        </p>
                    </div>
                    <div class="col-md-12 d-flex flex-row align-items-center justify-content-start">
                        <div class="col-6 col-md-4">
                            <p class="fw-bold">Quantity</p>
                            <div class="d-flex flex-row gap-2 align-items-center qty-container">
                                <button style="padding: 7px 15px;" type="button"
                                    class="btn btn-primary prev qtyBtn">-</button>
                                <input style="height: 40px;" class="form-control number-spinner" type="number"
                                    name="qty" id="qty" value="1" min="1" readonly>
                                <button style="padding: 7px 15px;" type="button"
                                    class="btn btn-primary next qtyBtn">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5" id="plant" data-id="1">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus14.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5" id="plant" data-id="2">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus13.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus12.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Kruzo Aero Chair</h3>
                    <strong class="product-price">$78.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus11.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Ergonomic Chair</h3>
                    <strong class="product-price">$43.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 4 -->


            <!-- Start Column 1 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus10.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 1 -->

            <!-- Start Column 2 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus9.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Nordic Chair</h3>
                    <strong class="product-price">$50.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 2 -->

            <!-- Start Column 3 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus8.jpg" class="img-fluid product-thumbnail">
                    <h3 class="product-title">Kruzo Aero Chair</h3>
                    <strong class="product-price">$78.00</strong>

                    <span class="icon-cross">
                        <img src="./assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 3 -->

            <!-- Start Column 4 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="#">
                    <img src="./assets/images/cactus7.jpg" class="img-fluid product-thumbnail">
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
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#plant', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        $('#plant_id').val(id);
        $('#staticBackdrop').modal('show');
    })
})

$('.prev').on('click', function() {
    var prev = $(this).closest('.qty-container').find('input').val();

    if (prev == 1) {
        var a = 1;
        $(this).closest('.qty-container').find('input').val(a);
    } else {
        var prevVal = prev - 1;
        $(this).closest('.qty-container').find('input').val(prevVal);
    }
});

$('.next').on('click', function() {
    var next = $(this).closest('.qty-container').find('input').val();

    if (next == 100) {
        $(this).closest('.qty-container').find('input').val('100');
    } else {
        var nextVal = ++next;
        $(this).closest('.qty-container').find('input').val(nextVal);
    }
});
</script>

<?php
include './components/bottom-script.php';
?>