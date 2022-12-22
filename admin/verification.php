<?php
session_start();

if(!isset($_SESSION['verify_email_admin'])) {
    ?>
<script>
location.href = 'register.php';
</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- endinject -->
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<style>
body {
    background: url(../assets/images/bgpink.png) no-repeat !important;
    background-size: cover !important;
    background-position: center !important;
    background-attachment: fixed !important;
    height: 100vh !important;
}

.auth .auth-form-light {
    border-radius: 7px !important;
    background: #212529 !important;
}

.form-control {
    background-color: #fff !important;
    color: #212529 !important;
    border-radius: 3px !important;
    font-size: 14px !important;
}

.btn {
    box-shadow: none !important;
}

.form-select {
    background-color: #fff !important;
    color: #212529 !important;
    border-radius: 3px !important;
    height: 55px !important;
}

.auth-form-light {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #212529 !important;
    border-radius: 5px;
    width: 500px !important;
    max-width: 94% !important;
}
</style>

<body>
    <div class="row w-100 mx-0">
        <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
            <div class="auth-form-light text-left py-4 px-4 px-sm-5">
                <div class="brand-logo d-flex align-items-center">
                    <img style="width: 50px;" src="./assets/images/logo.png" alt="logo">
                    <span style="font-size: 26px; font-weight: 600; letter-spacing: 1px;"
                        class="text-light">VERIFICATION</span>
                </div>
                <form id="verify_form" class="pt-3">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="Email" value="<?= $_SESSION['verify_email_admin'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="tel" minlength="6" maxlength="6" class="form-control form-control-lg" id="otp"
                            name="otp" placeholder="OTP Code">
                    </div>
                    <div class="my-3">
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg text-dark font-weight-bold auth-form-btn"
                            id="verifyBtn">VERIFY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#verify_form').on('submit', function(e) {
            e.preventDefault();

            var form = new FormData(this);
            form.append('verify', true);

            $.ajax({
                type: "POST",
                url: "./backend/verification.php",
                data: form,
                dataType: 'text',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#verifyBtn').prop('disabled', true);
                    $('#verifyBtn').text('Processing...');
                },
                complete: function() {
                    $('#verifyBtn').prop('disabled', false);
                    $('#verifyBtn').text('VERIFY');
                },
                success: function(response) {
                    if (response.includes('success')) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Verified successfully! Wait for admin to activate your account.',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: true,
                            color: '#000',
                            background: '#fe827a',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = 'login.php'
                            }
                        })
                    } else if (response.includes('invalid email')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops...',
                            text: 'Invalid email!',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fe827a',
                        })
                    } else if (response.includes('expired')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops...',
                            text: 'Verification Code expired! Please try again.',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: true,
                            color: '#000',
                            background: '#fe827a',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = 'register.php'
                            }
                        })
                    } else if (response.includes('invalid otp')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops...',
                            text: 'Invalid verification code!',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fe827a',
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ooops...',
                            text: 'Something went wrong!',
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
        })
    })
    </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./assets/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/template.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- endinject -->
</body>

</html>