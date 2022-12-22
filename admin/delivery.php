<?php 
include './components/head_css.php'; 
include './components/navbar_sidebar.php'; 
?>

<style>
table .btn {
    padding: 5px 10px !important;
}
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="mr-md-3 mr-xl-5 p-0">
                            <h2>Delivery Orders</h2>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <i onclick="location.href='index.php'" class="mdi mdi-home text-muted hover-cursor"></i>
                            <p class="text-muted mb-0 hover-cursor">/</p>
                            <p class="text-primary mb-0 hover-cursor">Delivery Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card p-3 pt-0">
                    <ul class="nav nav-tabs" style="border: none;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#lalamove"
                                data-toggle="tab">Lalamove</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lbcExpress" data-toggle="tab">LBC Express</a>
                        </li>
                    </ul>

                    <div class="tab-content pt-3 px-0">
                        <div class="tab-pane fade show active" id="lalamove" role="tab-panel">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Lalamove</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="enableTable">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Profile Image
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Username
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Role
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lbcExpress" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">LBC Express</h4>
                                    <ul class="nav nav-tabs" style="border: none;">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#pickUpLbcBranch"
                                                data-toggle="tab">Pick Up in LBC Branch</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#door-to-door" data-toggle="tab">Door-to-Door</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content pt-3 px-0">
                                        <div class="tab-pane fade show active" id="pickUpLbcBranch" role="tab-panel">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Pick Up in LBC Branch</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" id="enableTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Profile Image
                                                                    </th>
                                                                    <th>
                                                                        Name
                                                                    </th>
                                                                    <th>
                                                                        Username
                                                                    </th>
                                                                    <th>
                                                                        Email
                                                                    </th>
                                                                    <th>
                                                                        Role
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="door-to-door" role="tab-panel">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Door-to-Door</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" id="enableTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Profile Image
                                                                    </th>
                                                                    <th>
                                                                        Name
                                                                    </th>
                                                                    <th>
                                                                        Username
                                                                    </th>
                                                                    <th>
                                                                        Email
                                                                    </th>
                                                                    <th>
                                                                        Role
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
$(document).ready(function() {
    // DATATABLES
    var enable = $('#enableTable').DataTable({
        // "processing": true,
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./tables/admin-accounts-enable.php",
            type: "post",
            error: function() {}
        },
        "order": [
            [3, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });

    setInterval(function() {
        enable.ajax.reload(null, false);
    }, 60000);

    var disable = $('#disableTable').DataTable({
        // "processing": true,
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./tables/admin-accounts-disable.php",
            type: "post",
            error: function() {}
        },
        "order": [
            [3, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });

    setInterval(function() {
        disable.ajax.reload(null, false);
    }, 60000);

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    }); // END DATATABLES

    // ENABLE
    $(document).on('click', '#getEnable', function(e) {
        e.preventDefault();
        var adminId = $(this).data('id');

        var form = new FormData();
        form.append('enable', true);
        form.append('adminId', adminId);

        $.ajax({
            type: "POST",
            url: "./backend/admin-accounts.php",
            data: form,
            cache: false,
            dataType: "text",
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.includes('success')) {
                    enable.ajax.reload(null, false);
                    disable.ajax.reload(null, false);
                }
                console.log(response);
            }
        })
    })

    // ENABLE
    $(document).on('click', '#getDisable', function(e) {
        e.preventDefault();
        var adminId = $(this).data('id');

        var form = new FormData();
        form.append('disable', true);
        form.append('adminId', adminId);

        $.ajax({
            type: "POST",
            url: "./backend/admin-accounts.php",
            data: form,
            cache: false,
            dataType: "text",
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.includes('success')) {
                    enable.ajax.reload(null, false);
                    disable.ajax.reload(null, false);
                }
                console.log(response);
            }
        })
    })
})
</script>

<?php
include './components/bottom.php';
?>