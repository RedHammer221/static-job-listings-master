<?php
// Code used to create and display a new position in the job listing site
include("config.php");
if (isset($_POST['submit'])) {
    $company = $_POST['company'];
    $logo = $_POST['logo'];
    $featured = $_POST['featured'];
    $position = $_POST['position'];
    $role = $_POST['role'];
    $level = $_POST['level'];
    $contract = $_POST['contract'];
    $location = $_POST['location'];
    $languages = $_POST['languages'];
    $tools = $_POST['tools'];

    $sql = "INSERT INTO `job_listing` (company, logo, featured, position, role, level, contract, location, languages, tools) values('$company', '$logo', $featured,
    '$position', '$role', '$level', '$contract', '$location', '$languages', '$tools')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Data inserted successfully";
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <title>Add New Job</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" placeholder="Enter the company name" name="company" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Company Logo</label>
                <input type="text" class="form-control" placeholder="Company Logo" name="logo" autocomplete="off">
            </div>

            <label for="selectFeatured">Featured:</label>

            <select name="featured" id="selectFeatured">
                <option value="--Featured--"></option>
                <option value=1>Yes</option>
                <option value=0>No</option>
            </select>

            <div class="form-group">
                <label>Position</label>
                <input type="text" class="form-control" placeholder="Job Position" name="position" autocomplete="off">
            </div>

            <label for="roleSelect">Job Role:</label>

            <select name="role" id="roleSelect">
                <option value="--Select a role--"></option>
                <option value="Frontend">Frontend</option>
                <option value="Backend">Backend</option>
                <option value="Fullstack">Fullstack</option>
            </select>

            <label for="levelSelect">Level Required:</label>

            <select name="level" id="levelSelect">
                <option value="--Select a level--"></option>
                <option value="Junior">Junior</option>
                <option value="Midweight">Midweight</option>
                <option value="Senior">Senior</option>
            </select>

            <label for="contractSelect">Contract:</label>

            <select name="contract" id="contractSelect">
                <option value="--Select a contract--"></option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Contract">Contract</option>
            </select>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Job Location" name="location" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Languages</label>
                <input type="text" class="form-control" placeholder="Programming languages required" name="languages" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Tools</label>
                <input type="text" class="form-control" placeholder="Tools used" name="tools" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>
