<?php
include './components/head_css.php';
include './components/navbar.php';

if(!isset($_SESSION['margaux_user_id'])) {
    $_SESSION["margaux_link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header('location: login.php');
} else {
    $userId = $_SESSION['margaux_user_id'];
}
?>

<?php
$getUserInfo = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $userId");

foreach($getUserInfo as $userInfo) {
?>
<div class="container my-5">
    <main>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <?php
                $getCart = mysqli_query($conn, "SELECT tbl_product.productName, tbl_category.categoryName, tbl_cart.productQty, tbl_cart.productTotal
                FROM tbl_cart
                LEFT JOIN tbl_product
                ON tbl_cart.productId = tbl_product.productId
                LEFT JOIN tbl_category
                ON tbl_cart.categoryId = tbl_category.categoryId
                WHERE tbl_cart.userId = $userId");
                ?>
                <div class="card p-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        foreach($getCart as $row) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?= $row['productName'] ?></h6>
                                <small class="text-muted"><?= $row['categoryName'] ?></small><br>
                                <small class="text-muted">x<?= $row['productQty'] ?></small>
                            </div>
                            <span class="text-muted"><strong>&#8369;</strong> <strong
                                    class="price"><?= $row['productTotal'] ?></strong> </span>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (PHP)</span>
                            <div>
                                <strong style="font-size: 21px;">&#8369;</strong> <strong style="font-size: 21px;"
                                    class="totalPrice">0.00</strong>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            $getInfo = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $userId");

            foreach($getInfo as $row) {
            ?>
            <div class="col-md-7 col-lg-8">
                <div class="card p-4">
                    <h4 class="mb-3">Checkout form</h4>
                    <form id="checkoutForm">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="fullName" class="form-label">Fullname</label>
                                <input type="text" class="form-control" id="fullName" placeholder=""
                                    value="<?= $userInfo['name'] ?>" id="fullName" name="fullName" required>
                                <span class="error error_fullName"
                                    style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Contact Number</label>
                                <div class="input-group mb-3">
                                    <span style="font-size: 14px;" class="input-group-text" id="basic-addon1">+63</span>
                                    <input type="text" class="form-control" placeholder="9912937615" id="contactNumber"
                                        name="contactNumber" value="<?= $userInfo['mobile_no'] ?>" required>
                                </div>
                                <span class="error error_contactNumber"
                                    style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                            </div>

                            <!-- <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div> -->




                        </div>

                        <hr class="my-4">

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Choose Delivery Method</label>
                                <select class="form-select form-control" id="deliveryMethod" name="deliveryMethod">
                                    <option value="PICK UP">PICK UP</option>
                                    <option value="DELIVERY">DELIVERY</option>
                                </select>
                            </div>
                            <div class="col-sm-6 d-none" id="courierContainer">
                                <label for="courier" class="form-label">Choose Preferred Courier</label>
                                <select class="form-select form-control" id="preferredCourier" name="preferredCourier">
                                    <option value="LALAMOVE">LALAMOVE</option>
                                    <option value="LBC EXPRESS">LBC EXPRESS</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6  d-none" id="lbcModeContainer">
                                <label for="lastName" class="form-label">Choose LBC Mode</label>
                                <select class="form-select form-control" id="lbcMode" name="lbcMode">
                                    <option value="PICK UP">PICK UP</option>
                                    <option value="DOOR-TO-DOOR">DOOR-TO-DOOR</option>
                                </select>
                            </div>
                            <div class="col-sm-6  d-none" id="lbcBranchContainer">
                                <label for="lastName" class="form-label">Nearest LBC Branch</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    id="lbcBranch" name="lbcBranch">
                            </div>
                        </div>

                        <div class="row g-3 mb-3" id="pickupDateTimeContainer">
                            <div class="col-sm-6">
                                <label>Date</label>
                                <input type="date" class="form-control" name="pickUpDate" id="pickUpDate" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Time</label>
                                <input type="time" class="form-control" name="pickUpTime" id="pickUpTime" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3 d-none" id="addressContainer">
                            <div class="col-sm-4">
                                <label for="province" class="form-label">Province</label>
                                <select class="form-select form-control" id="province" name="province">
                                </select>
                                <input class="form-control" type="hidden" name="provinceValue" id="provinceValue"
                                    value="<?= $userInfo['province'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select form-control" id="city" name="city">
                                </select>
                                <input class="form-control" type="hidden" name="cityValue" id="cityValue"
                                    value="<?= $userInfo['city'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="barangay" class="form-label">Barangay</label>
                                <select class="form-select form-control" id="barangay" name="barangay">
                                </select>
                                <input class="form-control" type="hidden" name="barangayValue" id="barangayValue"
                                    value="<?= $userInfo['barangay'] ?>">
                            </div>

                            <div class="col-12">
                                <label for="">Blk/Lot/Street/Floor No.</label>
                                <textarea style="resize: none;" class="form-control" id="block" name="block"
                                    rows="3"><?= $userInfo['block'] ?></textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Choose Payment Method</label>
                                <select class="form-select form-control" id="paymentMethod" name="paymentMethod">
                                    <option value="CASH ON DELIVERY/PICKUP">CASH ON DELIVERY/PICKUP</option>
                                    <option value="GCASH">GCASH</option>
                                </select>
                            </div>
                            <div class="col-sm-6 d-none" id="gcashNumberContainer">
                                <label for="lastName" class="form-label">Gcash Number <small>(For refund purposes if
                                        order gets cancelled)</small></label>
                                <div class="input-group mb-3">
                                    <span style="font-size: 14px;" class="input-group-text" id="basic-addon1">+63</span>
                                    <input type="text" class="form-control" placeholder="9912937615" id="gcashNumber"
                                        name="gcashNumber" value="">
                                </div>
                                <span class="error error_gcashNumber"
                                    style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                            </div>
                        </div>

                        <div class="row g-3 mb-3 d-none" id="gcashContainer">
                            <div class="col-12 text-center">
                                <div class="d-flex flex-column gap-2 justify-content-center align-items-center">
                                    <label for="">Scan to pay</label>
                                    <img style="width: 150px;" src="./admin/assets/images/gcash/gcashQr.jpg" alt="">
                                    <label for="">Or pay to this number 09915362419 (JE*****R S.)</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Proof of Payment</label>
                                <input style="line-height: 37.5px;" type="file" name="proofOfPayment"
                                    id="proofOfPayment" class="form-control">
                                <span class="error error_proofOfPayment"
                                    style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Reference Number</label>
                                <input style="line-height: 37.5px;" type="tel" name="referenceNum" id="referenceNum"
                                    class="form-control">
                                <span class="error error_referenceNum"
                                    style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg" type="submit" id="checkoutBtn">Continue to
                            checkout</button>
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
</div>
<?php
}
?>

<script>
$(window).on('load', function() {
    // GET TOTAL
    var overall_total = 0;
    $('.price').each(function() {
        var subtotal = parseFloat($(this).text());
        overall_total += subtotal;
    })

    $('.totalPrice').text(parseFloat(overall_total).toFixed(2));

    // GET ADDRESS
    var province_value = $('#provinceValue').val();
    var city_value = $('#cityValue').val();
    var barangay_value = $('#barangayValue').val();

    $.ajax({
        url: "./backend/get-address.php",
        type: "POST",
        data: {
            get_all_prov: true,
        },
        success: function(data) {
            $('#province').html(data);
            if (province_value == '' || province_value == null) {
                $('#city').attr('disabled', true);
                $('#barangay').attr('disabled', true);
                $('#block').attr('disabled', true);
                $('#province').val('');
            } else {
                $('#province').val(province_value);
                $('#city').attr('disabled', false);
            }
        }
    })

    if (province_value == '') {
        var data = '<option value="">Select Province First</option>';
        $('#city').html(data);
    } else {
        $.ajax({
            url: "./backend/get-address.php",
            type: "POST",
            data: {
                prov_db: province_value,
                get_all_city: true,
            },
            success: function(data) {
                $('#city').html(data);
                if (city_value == '' || city_value == null) {
                    $('#city').attr('disabled', false);
                    $('#barangay').attr('disabled', true);
                    $('#block').attr('disabled', true);
                    $('#city').val('');
                } else {
                    $('#city').val(city_value);
                }
            }
        })
    }

    if (city_value == '') {
        var data = '<option value="">Select Province First</option>';
        $('#barangay').html(data);
    } else {
        $.ajax({
            url: "./backend/get-address.php",
            type: "POST",
            data: {
                city_db: city_value,
                get_all_brgy: true,
            },
            success: function(data) {
                $('#barangay').html(data);
                if (barangay_value == '' || barangay_value == null) {
                    $('#city').attr('disabled', false);
                    $('#barangay').attr('disabled', false);
                    $('#block').attr('disabled', true);
                    $('#barangay').val('');
                } else {
                    $('#barangay').val(barangay_value);
                }
            }
        })
    }
})

$(document).ready(function() {
    // VALIDATIONS
    var $regexFullName = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
    var $regexPhoneNumber = /^9\d{9}$/;
    var $regexReferenceNum = /^[0-9]{13}$/;

    $('#fullName').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexfullName)) {
            $('.error_fullName').html(
                '<i class="bi bi-exclamation-circle-fill"></i> Invalid format! No number should be included.'
            );
            $('#fullName').addClass('border-danger');
        } else {
            $('.error_fullName').text('');
            $('#fullName').removeClass('border-danger');
        }
    })

    $('#contactNumber').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexPhoneNumber)) {
            $('.error_contactNumber').html(
                '<i class="bi bi-exclamation-circle-fill"></i> Invalid format! No letters should be included and minimum and maximum of 10 numbers only.'
            );
            $('#contactNumber').addClass('border-danger');
        } else {
            $('.error_contactNumber').text('');
            $('#contactNumber').removeClass('border-danger');
        }
    })

    $('#gcashNumber').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexPhoneNumber)) {
            $('.error_gcashNumber').html(
                '<i class="bi bi-exclamation-circle-fill"></i> Invalid format! No letters should be included and minimum and maximum of 10 numbers only.'
            );
            $('#gcashNumber').addClass('border-danger');
        } else {
            $('.error_gcashNumber').text('');
            $('#gcashNumber').removeClass('border-danger');
        }
    })

    $('#referenceNum').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexReferenceNum)) {
            $('.error_referenceNum').html(
                '<i class="bi bi-exclamation-circle-fill"></i> Invalid format! No letters should be included and minimum and maximum of 13 numbers only.'
            );
            $('#referenceNum').addClass('border-danger');
        } else {
            $('.error_referenceNum').text('');
            $('#referenceNum').removeClass('border-danger');
        }
    })

    // GET CITY
    $("#province").change(function() {
        if ($(this).val() == '') {
            $('#provinceValue').val('');
            $('#cityValue').val('');
            $('#barangayValue').val('');
            $('#city').val('');
            $('#barangay').val('');
            $('#block').val('');
            $('#city').attr('disabled', true);
            $('#barangay').attr('disabled', true);
            $('#block').attr('disabled', true);
        } else {
            $('#provinceValue').val($(this).val());
            $('#barangay').val('');
            $('#cityValue').val('');
            $('#block').val('');
            $('#barangayValue').val('');
            $('#city').attr("disabled", false);
            $('#barangay').attr('disabled', true);
            $('#block').attr('disabled', true);
            var province_id = $(this).val();
            $.ajax({
                url: "./backend/get-address.php",
                type: "POST",
                data: {
                    province_id: province_id,
                    get_city: true,
                },
                success: function(data) {
                    $('#city').html(data);
                }
            })
        }
    })

    // GET BARANGAY
    $("#city").change(function() {
        if ($(this).val() == '') {
            $('#cityValue').val('');
            $('#barangayValue').val('');
            $('#barangay').val('');
            $('#block').val('');
            $('#city').attr('disabled', false);
            $('#barangay').attr('disabled', true);
            $('#block').attr('disabled', true);
        } else {
            $('#cityValue').val($(this).val());
            $('#barangayValue').val('');
            $('#city').attr("disabled", false);
            $('#barangay').attr('disabled', false);
            $('#block').attr('disabled', true);
            var city_id = $(this).val();
            console.log(city_id);
            $.ajax({
                url: "./backend/get-address.php",
                type: "POST",
                data: {
                    city_id: city_id,
                    get_barangay: true,
                },
                success: function(data) {
                    $('#barangay').html(data);
                }
            })
        }
    })

    $('#barangay').change(function() {
        if ($(this).val() == '') {
            $('#barangayValue').val('');
            $('#block').val('');
            $('#city').attr('disabled', false);
            $('#barangay').attr('disabled', false);
            $('#block').attr('disabled', true);
        } else {
            $('#barangayValue').val($(this).val());
            $('#block').attr("disabled", false);
        }
    })

    // DELIVERY METHOD ON CHANGE
    $('#deliveryMethod').on('change', function(e) {
        e.preventDefault();

        var deliveryMethod = $('#deliveryMethod').val();

        if (deliveryMethod == 'DELIVERY') {
            $('#pickUpDate').attr('required', false);
            $('#pickUpTime').attr('required', false);
            $('#province').attr('required', true);
            $('#city').attr('required', true);
            $('#barangay').attr('required', true);
            $('#block').attr('required', true);
            $('#proofOfPayment').attr('required', true);
            $('#referenceNum').attr('required', true);
            $('#gcashNumber').attr('required', true);
            $('#courierContainer').removeClass('d-none');
            $('#addressContainer').removeClass('d-none');
            $('#pickupDateTimeContainer').addClass('d-none');
            $('#gcashContainer').removeClass('d-none');
            $('#gcashNumberContainer').removeClass('d-none');
            $('#paymentMethod')
                .find('option')
                .remove()
                .end()
                .append('<option value="GCASH">GCASH</option>');
        } else {
            $('#pickUpDate').attr('required', true);
            $('#pickUpTime').attr('required', true);
            $('#province').attr('required', false);
            $('#city').attr('required', false);
            $('#barangay').attr('required', false);
            $('#block').attr('required', false);
            $('#proofOfPayment').attr('required', false);
            $('#referenceNum').attr('required', false);
            $('#gcashNumber').attr('required', false);
            $('#courierContainer').addClass('d-none');
            $('#addressContainer').addClass('d-none');
            $('#pickupDateTimeContainer').removeClass('d-none');
            $('#gcashContainer').removeClass('d-none');
            $('#gcashNumberContainer').addClass('d-none');
            $('#paymentMethod')
                .find('option')
                .remove()
                .end()
                .append('<option value="CASH ON HAND/PICKUP (LBC)">CASH ON DELIVERY/PICKUP</option>')
                .append('<option value="GCASH">GCASH</option>');
        }
    })

    // COURIER ON CHANGE
    $('#preferredCourier').on('change', function(e) {
        e.preventDefault();

        var selectedCourier = $(this).val();

        if (selectedCourier == 'LBC EXPRESS') {
            $('#lbcModeContainer').removeClass('d-none');
            $('#lbcBranchContainer').removeClass('d-none');
        } else {
            $('#lbcModeContainer').addClass('d-none');
            $('#lbcBranchContainer').addClass('d-none');
            $('#lbcMode').val('PICK UP');
        }
    })

    // LBC MODE ON CHANGE
    $('#lbcMode').on('change', function(e) {
        if ($(this).val() == 'PICKUP') {
            $('#lbcBranchContainer').removeClass('d-none');
            $('#lbcBranch').attr('required', true);
        } else {
            $('#lbcBranchContainer').addClass('d-none');
            $('#lbcBranch').attr('required', false);
        }
    })

    $('#paymentMethod').on('change', function(e) {
        e.preventDefault();

        if ($(this).val() == 'GCASH') {
            $('#gcashContainer').removeClass('d-none');
            $('#gcashNumberContainer').removeClass('d-none');
            $('#proofOfPayment').attr('required', true);
            $('#referenceNum').attr('required', true);
            $('#gcashNumber').attr('required', true);
        } else {
            $('#gcashContainer').addClass('d-none');
            $('#gcashNumberContainer').addClass('d-none');
            $('#proofOfPayment').attr('required', false);
            $('#referenceNum').attr('required', false);
            $('#gcashNumber').attr('required', false);
        }
    })

    // CHECKOUT
    $('#checkoutForm').on('submit', function(e) {
        e.preventDefault();

        if ($('#proofOfPayment').val().length != 0) {
            var user_id = $('#user_id').val();
            var proofOfPayment = $('#proofOfPayment').val();
            var image_ext = $('#proofOfPayment').val().split('.').pop().toLowerCase();

            if ($.inArray(image_ext, ['png', 'jpg', 'jpeg']) == -1) {
                $('.error_proofOfPayment').html(
                    '<i class="bi bi-exclamation-circle-fill"></i> File not supported!');
                $('#proofOfPayment').addClass('border-danger');
            } else {
                var imageSize = $('#proofOfPayment')[0].files[0].size;

                if (imageSize > 10485760) {
                    $('.error_proofOfPayment').html(
                        '<i class="bi bi-exclamation-circle-fill"></i> File too large!');
                    $('#proofOfPayment').addClass('border-danger');
                } else {
                    if ($('.error_fullName').text() == '' && $('.error_contactNumber').text() == '' &&
                        $(
                            '.error_proofOfPayment').text() == '' && $('.error_referenceNum').text() ==
                        '') {
                        var getForm = $('#checkoutForm')[0];
                        var form = new FormData(getForm);
                        form.append('orderTotal', $('.totalPrice').text());
                        form.append('checkout', true);

                        $.ajax({
                            url: "./backend/checkout.php",
                            type: "POST",
                            data: form,
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                                $('#checkoutBtn').prop('disabled', true);
                                $('#checkoutBtn').text('Processing...');
                            },
                            complete: function() {
                                $('#checkoutBtn').prop('disabled', false);
                                $('#checkoutBtn').text('Continue to checkout');
                            },
                            success: function(response) {
                                if (response.includes('success')) {
                                    localStorage.setItem('status', 'ordered');
                                    location.href = 'index.php';
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Ooops!',
                                        text: 'Something went wrong!!',
                                        iconColor: '#000',
                                        confirmButtonColor: '#000',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        color: '#000',
                                        background: '#fe827a',
                                    })
                                }
                                console.log(response);
                            }
                        })
                    }
                }
            }
        } else {
            if ($('.error_fullName').text() == '' && $('.error_contactNumber').text() == '' && $(
                    '.error_proofOfPayment').text() == '' && $('.error_referenceNum').text() == '') {
                var getForm = $('#checkoutForm')[0];
                var form = new FormData(getForm);
                form.append('orderTotal', $('.totalPrice').text());
                form.append('checkout', true);

                $.ajax({
                    url: "./backend/checkout.php",
                    type: "POST",
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#checkoutBtn').prop('disabled', true);
                        $('#checkoutBtn').text('Processing...');
                    },
                    complete: function() {
                        $('#checkoutBtn').prop('disabled', false);
                        $('#checkoutBtn').text('Continue to checkout');
                    },
                    success: function(response) {
                        if (response.includes('success')) {
                            localStorage.setItem('status', 'ordered');
                            location.href = 'index.php';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ooops!',
                                text: 'Something went wrong!!',
                                iconColor: '#000',
                                confirmButtonColor: '#000',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                color: '#000',
                                background: '#fe827a',
                            })
                        }
                        console.log(response);
                    }
                })
            }
        }
    })
})
</script>

<?php
include './components/bottom-script.php';
?>