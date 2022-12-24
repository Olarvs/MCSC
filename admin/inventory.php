<?php 
include './components/head_css.php'; 
include './components/navbar_sidebar.php'; 
?>

<!-- INSERT MODAL -->
<div class="modal fade stockSettingsModal" id="stockSettingsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5 h2" id="exampleModalLabel">Stock Settings</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="stockSettingsForm" enctype="multipart/form-data">
                    <?php
                    $getStockSett = mysqli_query($conn, "SELECT * FROM stock_settings");

                    foreach($getStockSett as $row) {
                    ?>
                    <div class="form-group d-none">
                        <label for="exampleInputUsername1">stockId</label>
                        <input type="tel" class="form-control" id="stockId" name="stockId"
                            placeholder="Low Stock Quantity" value="<?= $row['id'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Low Stock Qty</label>
                        <input type="tel" class="form-control" id="lowStockQty" name="lowStockQty"
                            placeholder="Low Stock Quantity" value="<?= $row['lowStock'] ?>" required>
                    </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="stockSettingsForm" class="btn btn-primary" id="stockSettingsBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade updateCategoryModal" id="updateCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5 h2" id="exampleModalLabel">Update Category</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" enctype="multipart/form-data">
                    <div class="form-group d-none">
                        <label for="exampleInputUsername1">Category ID</label>
                        <input type="text" class="form-control" id="editCategoryId" name="editCategoryId"
                            placeholder="Category Id" required>
                    </div>
                    <div class="form-group d-none">
                        <label for="exampleInputUsername1">Old Thumbnail</label>
                        <input type="text" class="form-control" id="editOldImage" name="editOldImage"
                            placeholder="Category Id" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="editCategoryName"
                            placeholder="Category Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input class="form-control" accept=".jpg, .jpeg, .png" type="file" id="editCategoryThumbnail"
                            name="editCategoryThumbnail">
                        <span class="error errorEditCategoryThumbnail"
                            style="font-size: 12px; font-weight: 500; color: #fe827a;"></span>
                    </div>
                    <div class="form-group d-flex flex-column gap-2">
                        <label for="exampleInputEmail1">Image preview</label>
                        <img id="file" style="width: 100px;" src="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="editCategoryForm" class="btn btn-primary" id="editCategoryBtn">Update
                    category</button>
            </div>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade deleteCategoryModal" id="deleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-5 h2" id="exampleModalLabel">Category</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteCategoryForm" enctype="multipart/form-data">
                    <div class="form-group d-none">
                        <label for="exampleInputUsername1">Category ID</label>
                        <input type="text" class="form-control" id="deleteCategoryId" name="deleteCategoryId"
                            placeholder="Category ID" required>
                    </div>
                    Are you sure, you want this to move in archive?
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="deleteCategoryForm" class="btn btn-primary"
                    id="deleteCategoryBtn">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="mr-md-3 mr-xl-5 p-0">
                            <h2>Inventory</h2>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <i onclick="location.href='index.php'" class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">/</p>
                            <p class="text-primary mb-0 hover-cursor">Inventory</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockSettingsModal">Stock Settings</button>
            </div>
        </div>
        <div class="row">

        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

<script>
$(window).on('load', function() {
    if (localStorage.getItem('status') == 'insert') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Category added successfully!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            color: '#000',
            background: '#fe827a',
            timer: 5000,
            timerProgressBar: true,
        });
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'update') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Category updated successfully!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            color: '#000',
            background: '#fe827a',
            timer: 5000,
            timerProgressBar: true,
        });
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'archived') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Category moved to archived successfully!',
            iconColor: '#000',
            confirmButtonColor: '#000',
            showConfirmButton: false,
            color: '#000',
            background: '#fe827a',
            timer: 5000,
            timerProgressBar: true,
        });
        localStorage.removeItem('status');
    }
})

$(document).ready(function() {
    // Image preview
    $('#editCategoryThumbnail').on('change', function() {
        var file = this.files[0];

        if (file) {
            var reader = new FileReader();

            reader.addEventListener('load', function() {
                $('#file').attr("src", this.result);
            })

            reader.readAsDataURL(file);
        }
    })

    // Get Category
    $('.editBtn').on('click', function(e) {
        e.preventDefault();

        var editCategoryId = $(this).data('id');

        $.ajax({
            url: './backend/category.php',
            type: 'POST',
            data: {
                'getCategory': true,
                'getCategoryId': editCategoryId,
            },
            success: function(response) {
                var obj = JSON.parse(response);
                $(".updateCategoryModal").modal("show");
                $("#editCategoryId").val(obj.categoryId);
                $("#editCategoryName").val(obj.categoryName);
                $("#editOldImage").val(obj.categoryThumbnail);
                $("#file").attr("src", "./assets/images/categoryImages/" + obj
                    .categoryThumbnail);
                // console.log(response);
            }
        })
    })

    // Update Category
    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();

        if ($('#editCategoryThumbnail').val().length != 0) {
            var editCategoryThumbnail = $('#editCategoryThumbnail').val();
            var image_ext = $('#editCategoryThumbnail').val().split('.').pop().toLowerCase();

            if ($.inArray(image_ext, ['png', 'jpg', 'jpeg']) == -1) {
                $('.errorEditCategoryThumbnail').html(
                    '<i class="bi bi-exclamation-circle-fill"></i> File not supported!'
                );
            } else {
                var imageSize = $('#editCategoryThumbnail')[0].files[0].size;

                if (imageSize > 10485760) {
                    $('.errorEditCategoryThumbnail').html(
                        '<i class="bi bi-exclamation-circle-fill"></i> File too large!'
                    );
                } else {
                    var form = new FormData(this);
                    form.append('editCategory', true);

                    $.ajax({
                        type: "POST",
                        url: "./backend/category.php",
                        data: form,
                        dataType: 'text',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#editCategoryBtn').attr('disabled', true);
                            $('#editCategoryBtn').text('Processing');
                        },
                        complete: function() {
                            $('#editCategoryBtn').attr('disabled', false);
                            $('#editCategoryBtn').text('Update category');
                        },
                        success: function(response) {
                            if (response.includes('success')) {
                                localStorage.setItem('status', 'update');
                                location.reload();
                            } else if (response.includes('exist')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed',
                                    text: 'Category already exist!',
                                    iconColor: '#000',
                                    confirmButtonColor: '#000',
                                    showConfirmButton: false,
                                    color: '#000',
                                    background: '#fe827a',
                                    timer: 5000,
                                    timerProgressBar: true,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed',
                                    text: 'Something went wrong!',
                                    iconColor: '#000',
                                    confirmButtonColor: '#000',
                                    showConfirmButton: false,
                                    color: '#000',
                                    background: '#fe827a',
                                    timer: 5000,
                                    timerProgressBar: true,
                                });
                            }
                            console.log(response);
                        }
                    })
                }
            }
        } else {
            var form = new FormData(this);
            form.append('editCategory', true);

            $.ajax({
                type: "POST",
                url: "./backend/category.php",
                data: form,
                dataType: 'text',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#editCategoryBtn').attr('disabled', true);
                    $('#editCategoryBtn').text('Processing');
                },
                complete: function() {
                    $('#editCategoryBtn').attr('disabled', false);
                    $('#editCategoryBtn').text('Update category');
                },
                success: function(response) {
                    if (response.includes('success')) {
                        localStorage.setItem('status', 'update');
                        location.reload();
                    } else if (response.includes('exist')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Category already exist!',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: false,
                            color: '#000',
                            background: '#fe827a',
                            timer: 5000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong!',
                            iconColor: '#000',
                            confirmButtonColor: '#000',
                            showConfirmButton: false,
                            color: '#000',
                            background: '#fe827a',
                            timer: 5000,
                            timerProgressBar: true,
                        });
                    }
                    console.log(response);
                }
            })
        }
    })

    // ARCHIVE CATEGORY
    $('.archiveCategory').on('click', function(e) {
        e.preventDefault();

        var archiveCategoryId = $(this).data('id');

        $('#deleteCategoryId').val(archiveCategoryId);
        $('#deleteCategoryModal').modal('show');

    })

    $('#deleteCategoryForm').on('submit', function(e) {
        e.preventDefault();

        var form = new FormData(this);
        form.append('deleteCategory', true);

        $.ajax({
            type: "POST",
            url: "./backend/category.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#deleteCategoryBtn').attr('disabled', true);
                $('#deleteCategoryBtn').text('Processing');
            },
            complete: function() {
                $('#deleteCategoryBtn').attr('disabled', false);
                $('#deleteCategoryBtn').text('Yes');
            },
            success: function(response) {
                if (response.includes('success')) {
                    localStorage.setItem('status', 'archived');
                    location.reload();
                } else if (response.includes('invalid')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Invalid category!',
                        iconColor: '#000',
                        confirmButtonColor: '#000',
                        showConfirmButton: false,
                        color: '#000',
                        background: '#fe827a',
                        timer: 5000,
                        timerProgressBar: true,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Something went wrong!',
                        iconColor: '#000',
                        confirmButtonColor: '#000',
                        showConfirmButton: false,
                        color: '#000',
                        background: '#fe827a',
                        timer: 5000,
                        timerProgressBar: true,
                    });
                }
                console.log(response);
            }
        })
    })

    // RESET MODAL
    $('.addCategoryModal').on('hidden.bs.modal', function() {
        $('#addCategoryForm')[0].reset();
    });

    $('.updateCategoryModal').on('hidden.bs.modal', function() {
        $('#editCategoryForm')[0].reset();
    });
})
</script>

<?php
include './components/bottom.php';
?>