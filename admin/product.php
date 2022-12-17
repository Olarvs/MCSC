<?php 
include './components/head_css.php'; 
include './components/navbar_sidebar.php'; 
?>

<!-- MODAL -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5 h2" id="exampleModalLabel">Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Category Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="mr-md-3 mr-xl-5 p-0">
                            <h2>Product</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">Add
                    Category</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="card p-3">
                    <div class="image-cont mb-3" style="height: 200px">
                        <img src="./assets/images/logo.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                    <div>
                        <h5 style="font-weight: 700;">Cacti</h5>
                        <div class="d-flex gap-1">
                            <button class="btn btn-outline-primary btn-sm">Menu</button>
                            <button class="btn btn-outline-info btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="card p-3">
                    <div class="image-cont mb-3" style="height: 200px">
                        <img src="./assets/images/logo.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                    <div>
                        <h5 style="font-weight: 700;">Cacti</h5>
                        <div class="d-flex gap-1">
                            <button class="btn btn-outline-primary btn-sm">Menu</button>
                            <button class="btn btn-outline-info btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="card p-3">
                    <div class="image-cont mb-3" style="height: 200px">
                        <img src="./assets/images/logo.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                    <div>
                        <h5 style="font-weight: 700;">Cacti</h5>
                        <div class="d-flex gap-1">
                            <button class="btn btn-outline-primary btn-sm">Menu</button>
                            <button class="btn btn-outline-info btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="card p-3">
                    <div class="image-cont mb-3" style="height: 200px">
                        <img src="./assets/images/logo.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                    <div>
                        <h5 style="font-weight: 700;">Cacti</h5>
                        <div class="d-flex gap-1">
                            <button class="btn btn-outline-primary btn-sm">Menu</button>
                            <button class="btn btn-outline-info btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-3 mb-4">
                <div class="card p-3">
                    <div class="image-cont mb-3" style="height: 200px">
                        <img src="./assets/images/logo.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                    </div>
                    <div>
                        <h5 style="font-weight: 700;">Cacti</h5>
                        <div class="d-flex gap-1">
                            <button class="btn btn-outline-primary btn-sm">Menu</button>
                            <button class="btn btn-outline-info btn-sm">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<script>

</script>

<?php
include './components/bottom.php';
?>