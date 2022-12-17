<?php
session_start();
require_once '../../database/config.php';

if (isset($_POST['addCategory'])) {
    $addCategoryName = $_POST['addCategoryName'];
    $image = $_FILES['addCategoryThumbnail']['name'];
    $imageTmp = $_FILES['addCategoryThumbnail']['tmp_name'];

    $checkIfCategoryExist = mysqli_query($conn, "SELECT * FROM tbl_category WHERE categoryName = '$addCategoryName'");

    if (mysqli_num_rows($checkIfCategoryExist) > 0) {
        echo 'exist';
    } else {
        $imageExt = explode('.', $image);
        $imageExt = strtolower(end($imageExt));

        $newImageName = uniqid() . '.' . $imageExt;

        $insertCategory = mysqli_query($conn, "INSERT INTO tbl_category (categoryName, categoryThumbnail) VALUES ('$addCategoryName', '$newImageName')");

        if ($insertCategory) {
            move_uploaded_file($imageTmp, '../assets/images/categoryImages/' . $newImageName);

            echo 'success';
        }

    }
}

// Get Category
if (isset($_POST['getCategory'])) {
    $getCategoryId = $_POST['getCategoryId'];
    $get_category = mysqli_query($conn, "SELECT * FROM tbl_category WHERE categoryId = $getCategoryId");

    $result_array = array();
    while ($result = mysqli_fetch_assoc($get_category)) {
        $result_array['categoryId'] = $result['categoryId'];
        $result_array['categoryName'] = $result['categoryName'];
        $result_array['categoryThumbnail'] = $result['categoryThumbnail'];
    }

    echo json_encode($result_array);
}

if (isset($_POST['editCategory'])) {
    $editCategoryId = $_POST['editCategoryId'];
    $editOldImage = $_POST['editOldImage'];
    $editCategoryName = $_POST['editCategoryName'];
    $editCategoryThumbnail = $_FILES['editCategoryThumbnail']['name'];
    $editCategoryThumbnailTmp = $_FILES['editCategoryThumbnail']['tmp_name'];
    $editCategoryThumbnailError = $_FILES['editCategoryThumbnail']['error'];

    if ($editCategoryThumbnailError == 4) {
        $checkIfCategoryExist = mysqli_query($conn, "SELECT * FROM tbl_category WHERE categoryName = '$editCategoryName' AND categoryId != $editCategoryId");

        if (mysqli_num_rows($checkIfCategoryExist) > 0) {
            echo 'exist';
        } else {
            $updateCategory = mysqli_query($conn, "UPDATE tbl_category SET categoryName = '$editCategoryName' WHERE categoryId = $editCategoryId");

            if ($updateCategory) {
                echo 'success';
            }
        }
    } else {
        $checkIfCategoryExist = mysqli_query($conn, "SELECT * FROM tbl_category WHERE categoryName = '$editCategoryName' AND categoryId != $editCategoryId");

        if (mysqli_num_rows($checkIfCategoryExist) > 0) {
            echo 'exist';
        } else {
            $imageExt = explode('.', $editCategoryThumbnail);
            $imageExt = strtolower(end($imageExt));

            $newImageName = uniqid() . '.' . $imageExt;

            $updateCategory = mysqli_query($conn, "UPDATE tbl_category SET categoryName = '$editCategoryName', categoryThumbnail = '$newImageName' WHERE categoryId = $editCategoryId");

            if ($updateCategory) {
                move_uploaded_file($editCategoryThumbnailTmp, '../assets/images/categoryImages/' . $newImageName);

                if(file_exists('../assets/images/categoryImages/' . $editOldImage)) {
                    unlink('../assets/images/categoryImages/' . $editOldImage);
                }

                echo 'success';
            }
        }
    }
}

// Array
// (
//     [editCategoryId] => 3
//     [editOldImage] => 639dc77801f04.jpg
//     [editCategoryName] => Succulents
//     [editCategory] => true
// )
// Array
// (
//     [editCategoryThumbnail] => Array
//         (
//             [name] => ECHEVERIA_BIANTE_2.jpg
//             [full_path] => ECHEVERIA_BIANTE_2.jpg
//             [type] => image/jpeg
//             [tmp_name] => D:\xampp\tmp\php6704.tmp
//             [error] => 0
//             [size] => 119516
//         )

// )
