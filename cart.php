<?php
include './components/head_css.php';
include './components/navbar.php';

if(!isset($_SESSION['margaux_user_id'])) {
    $_SESSION["margaux_link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header('location: login.php');
} else {
    if(isset($_SESSION['cartId'])) {
        unset($_SESSION['cartId']);
    }
    $userId = $_SESSION['margaux_user_id'];
}
?>

<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

.c_btn_trash {
    background-color: #000 !important;
    border-color: #000 !important;
}

.c_btn_trash:hover {
    background-color: #1b1b1b !important;
    border-color: #1b1b1b !important;
}

.c_btn_qty {
    background-color: #fe827a !important;
    border-color: #fe827a !important;
}

.c_btn_qty:hover {
    background-color: #1b1b1b !important;
    border-color: #1b1b1b !important;
}

.c_btn_qty_add {
    background-color: #fe827a !important;
    border-color: #fe827a !important;
}

.c_btn_qty_add:hover {
    background-color: #1b1b1b !important;
    border-color: #1b1b1b !important;
}
</style>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateQtyForm">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - 2 items</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $getCart = mysqli_query($conn, "SELECT tbl_product.productThumbnail, tbl_product.productName, tbl_cart.productPrice, tbl_cart.productTotal, tbl_cart.productQty, tbl_cart.productId, tbl_cart.userId, tbl_category.categoryName, tbl_cart.cartId
                        FROM tbl_cart
                        LEFT JOIN tbl_product
                        ON tbl_product.productId = tbl_cart.productId
                        LEFT JOIN tbl_category
                        ON tbl_cart.categoryId = tbl_category.categoryId
                        WHERE tbl_cart.userId = $userId AND (tbl_product.isDeleted = 0 AND tbl_category.isDeleted = 0)");

                        $status = 0;

                        if(mysqli_num_rows($getCart) <= 0) {
                        $status = 0;
                        ?>
                        <h6 class="text-center">No items in cart</h6>
                        <?php
                        } else {
                        $status = 1;
                            foreach($getCart as $row) {
                            ?>
                        <!-- Single item -->
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                    data-mdb-ripple-color="light">
                                    <img src="./admin/assets/images//productImages/<?= $row['productThumbnail'] ?>"
                                        class="w-100" alt="Blue Jeans Jacket" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p><strong><?= $row['productName'] ?></strong><br><span
                                        class="text-danger"><?= $row['categoryName'] ?></span></p>
                                <button type="button" class="btn btn-primary btn-sm me-1 mb-2 c_btn_trash removeItem"
                                    data-id="<?= $row['cartId'] ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Data -->
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 text-start text-md-end">

                                <!-- Price -->
                                <p class="text-start text-md-end">
                                    Quantity: <strong
                                        data-price="<?= $row['productQty'] ?>"><?= $row['productQty'] ?></strong><br>
                                    Price: <strong
                                        data-price="<?= $row['productPrice'] ?>"><?= $row['productPrice'] ?></strong><br>
                                    Subtotal: <strong data-subtotal="<?= $row['productTotal'] ?>"
                                        class="subTotal"><?= $row['productTotal'] ?></strong>
                                </p>
                                <!-- Price -->

                                <button onclick="location.href='update-product.php?cartId=<?= $row['cartId'] ?>'"
                                    type="button" class="btn btn-primary btn-sm me-1 mb-2 updateQty"
                                    data-id="<?= $row['cartId'] ?>">Update Quantity
                                </button>
                            </div>
                        </div>
                        <!-- Single item -->

                        <hr class="my-4" />
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                </div>
                                <span><strong class="totalAmount">0.00</strong></span>
                            </li>
                        </ul>

                        <?php
                        if($status != 0) {
                        ?>
                        <button type="button" onclick="location.href='checkout.php'" class="btn btn-primary btn-sm btn-block c_btn_qty">
                            Go to checkout
                        </button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(window).on('load', function() {
    // ALERTS
    if (localStorage.getItem('status') == 'updated') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Item updated successfully!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            color: '#000',
            background: '#fe827a',
        })
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'deleted') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Item deleted successfully!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            color: '#000',
            background: '#fe827a',
        })
        localStorage.removeItem('status');
    }

    var gdtotal = 0;
    $('.subTotal').each(function() {
        var subtotal = parseFloat($(this).text());
        gdtotal += subtotal;
    })
    $('.totalAmount').text(gdtotal.toFixed(2));
})

$(document).ready(function() {
    $('.removeItem').on('click', function(e) {
        e.preventDefault();

        var cartId = $(this).data('id');


        Swal.fire({
            icon: 'question',
            title: 'Hey!',
            text: 'Are you sure, you want to remove this item?!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: true,
            showDenyButton: true,
            denyButtonText: `Cancel`,
            confirmButtonText: 'Yes',
            color: '#000',
            background: '#fe827a',
        }).then((result) => {
            if (result.isConfirmed) {
                var form = new FormData();
                form.append('deleteItem', true);
                form.append('cartId', cartId);

                $.ajax({
                    type: "POST",
                    url: "./backend/add-to-cart.php",
                    data: form,
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.includes('success')) {
                            localStorage.setItem('status', 'deleted');
                            location.reload();
                        } else if (response.includes('login first')) {
                            <?php
                        $_SESSION["margaux_link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        ?>
                            Swal.fire({
                                icon: 'info',
                                title: 'Welcome to Margaux Corner!',
                                text: 'To order this product you need to login first!',
                                iconColor: '#000',
                                confirmButtonColor: '#000',
                                showConfirmButton: true,
                                confirmButtonText: 'Login',
                                color: '#000',
                                background: '#fe827a',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = 'login.php';
                                }
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
            }
        })
    })
})
</script>

<?php
include './components/bottom-script.php';
?>