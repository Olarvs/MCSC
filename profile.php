<?php
include './components/head_css.php';
include './components/navbar.php';

if(!isset($_SESSION['margaux_user_id'])) {
    $_SESSION["margaux_link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
} else {
    $user_id = $_SESSION['margaux_user_id'];
}
?>

<style>
.custom_cont {
    max-width: 90%;
}
</style>

<!-- Start Contact Form -->
<div class="untree_co-section pt-5"
    style="background-image: url('./assets/images/bannercactus.png'); background-size: cover; ">
    <div class="container">

        <div class="block">
            <div class="row justify-content-center">


                <div class="col-md-8 col-lg-10 p-4 bg-dark text-white rounded custom_cont">
                    <?php
                    $get_user_info = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $user_id");

                    $gender = '';

                    foreach($get_user_info as $row) {
                    $gender = $row['gender'];
                    ?>
                    <form action="">
                        <div class="row">
                            <div class="col-lg-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center mb-3"><img
                                        class="rounded-circle mt-5" width="150px"
                                        src="./assets/images/profile_image/profile.png"><span
                                        class="font-weight-bold"><?= $row['name'] ?></span><span
                                        class="text-white-50"><?= $row['email'] ?></span><span> </span></div>
                            </div>
                            <div class="col-lg-5 border-right">
                                <div class="px-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                                class="form-control" placeholder="Name" value="<?= $row['name'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels">Birthday</label>
                                            <input type="date" class="form-control" value="<?= $row['birthday'] ?>">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Gender</label>
                                            <select class="form-select form-control" id="gender" name="gender">
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12"><label class="labels">Province</label>
                                            <select class="form-select form-control" id="province"
                                                style="font-size: 14px;">
                                            </select>
                                            <input class="form-control" type="hidden" name="provinceValue"
                                                id="provinceValue" value="<?php echo $row['province']; ?>">
                                        </div>
                                        <div class="col-md-12"><label class="labels">City</label>
                                            <select class="form-select form-control" id="city" style="font-size: 14px;">
                                            </select>
                                            <input class="form-control" type="hidden" name="cityValue" id="cityValue"
                                                value="<?php echo $row['city']; ?>">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Barangay</label>
                                            <select class="form-select form-control" id="barangay"
                                                style="font-size: 14px;">
                                            </select>
                                            <input class="form-control" type="hidden" name="barangayValue"
                                                id="barangayValue" value="<?php echo $row['barangay']; ?>">
                                        </div>
                                        <div class="col-md-12"><label class="labels">Block</label><input type="text"
                                                class="form-control" placeholder="Enter block address" value=""></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="px-3">
                                    <div class="d-none d-lg-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right invisible">Profile Settings</h4>
                                    </div>
                                    <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                            class="form-control" placeholder="Enter email address"
                                            value="<?= $row['email'] ?>"></div>
                                    <div class="col-md-12">
                                        <label class="form-label mb-0" for="username">Mobile No</label>
                                        <div class="input-group input-group-merge">
                                            <span style="font-size: 14px;" class="input-group-text">+63</span>
                                            <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control"
                                                value="<?= $row['mobile_no'] ?>" placeholder="9992736514" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12 "><label class="labels">Old Password</label><input type="text"
                                            class="form-control" placeholder="Old Password" value=""></div>
                                    <div class="col-md-12"><label class="labels">New Password</label><input type="text"
                                            class="form-control" placeholder="New Password" value=""></div>
                                    <div class="col-md-12"><label class="labels">Repeat New Password</label><input
                                            type="text" class="form-control" placeholder="Repeat New Password" value="">
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn text-dark profile-button"
                                            type="button" style="background-color: #fe827a;">Save Profile</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>

</div>

<script>
$(window).on('load', function() {
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
    // GET GENDER
    $("#gender").val("<?= $gender ?>").attr("selected", "selected");

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
})
</script>

<?php
include './components/bottom-script.php';
?>