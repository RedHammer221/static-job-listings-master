<?php
include("config.php");
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `job_listing` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Deleted Successfully";
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
