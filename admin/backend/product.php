<?php
session_start();
require_once '../../database/config.php';

if (isset($_POST['addProduct'])) {
    $addCategoryId = $_POST['addCategoryId'];
    $addProductName = $_POST['addProductName'];
    $addProductDescription = mysqli_real_escape_string($conn, $_POST['addProductDescription']) ?? null;
    $addProductPrice = $_POST['addProductPrice'];
    $addProductStock = $_POST['addProductStock'];
    $addProductStatus = $_POST['addProductStatus'];
    $addProductThumbnail = $_FILES['addProductThumbnail']['name'];
    $addProductThumbnailTmp = $_FILES['addProductThumbnail']['tmp_name'];
    $addProductThumbnailError = $_FILES['addProductThumbnail']['error'];

    if ($addProductThumbnailError == 4) {
        $checkIfProductExist = mysqli_query($conn, "SELECT * FROM tbl_product WHERE productName = '$addProductName' AND categoryId = $addCategoryId");

        if (mysqli_num_rows($checkIfProductExist) > 0) {
            echo 'exist';
        } else {
            $insertProduct = mysqli_query($conn, "INSERT INTO tbl_product (categoryId, productName, productDesc, productThumbnail, productPrice, productStock, productStatus) VALUES ('$addCategoryId', '$addProductName', NULLIF('$addProductDescription', ''), 'no_image_available-product.png', '$addProductPrice', '$addProductStock', '$addProductStatus')");

            if ($insertProduct) {
                echo 'success';
            }
        }
    } else {
        $imageExt = explode('.', $addProductThumbnail);
        $imageExt = strtolower(end($imageExt));

        $newImageName = uniqid() . '.' . $imageExt;

        $insertProduct = mysqli_query($conn, "INSERT INTO tbl_product (categoryId, productName, productDesc, productThumbnail, productPrice, productStock, productStatus) VALUES ('$addCategoryId', '$addProductName', NULLIF('$addProductDescription', ''), '$newImageName', '$addProductPrice', '$addProductStock', '$addProductStatus')");

        if ($insertProduct) {
            move_uploaded_file($addProductThumbnailTmp, '../assets/images/productImages/' . $newImageName);

            echo 'success';
        }
    }
}

// Array
// (
//     [addCategoryId] => 2
//     [addProductName] => Cutie
//     [addProductDescription] => Sheeesh
//     [addProductPrice] => 200
//     [addProductStock] => 20
//     [addProductStatus] => Available
//     [addProduct] => true
// )
// Array
// (
//     [addProductThumbnail] => Array
//         (
//             [name] =>
//             [full_path] =>
//             [type] =>
//             [tmp_name] =>
//             [error] => 4
//             [size] => 0
//         )

// )
