<?php
include("config.php");

// Initial values to be taken from a db and query
$role = '';
$level = '';
$date = $row['postedAt'];
$days = '';
$id = $row['id'];



$query = "SELECT * FROM job_listing";

// Filtering the role and level
if (isset($_GET['role'])) {
    if ($_GET['role'] == 'Frontend') {
        $role = 'Frontend';
    } elseif ($_GET['role'] == 'Fullstack') {
        $role = 'Fullstack';
    } elseif ($_GET['role'] == 'Backend') {
        $role = 'Backend';
    }
    $query .= " WHERE role='$role'";
}

if (isset($_GET['level'])) {
    if ($_GET['level'] == 'Senior') {
        $level = 'Senior';
    } elseif ($_GET['level'] == 'Midweight') {
        $level = 'Midweight';
    } elseif ($_GET['level'] == 'Junior') {
        $level = 'Junior';
    }
    if ($role == '') {
        $query .= " WHERE level='$level'";
    } else {
        $query .= " AND level ='$level'";
    }
}

// Initializing the Database
$r = mysqli_query($con, $query);

// Manipulating the href tag with the help of params and parsing
function getHref($roleParam, $levelParam)
{
    $href = '?';
    if ($roleParam != '') {
        $href .= "role=$roleParam";
    }
    if ($levelParam != '') {
        if ($href != '') {
            $href .= '&';
        }
        $href .= "level=$levelParam";
    }
    return $href;
}

$tag = substr($href, 0, strrpos($href, "level=$level"));


// Converting date posted into how long ago a post was added
function timeAgo($date)
{
    $diff = time() - strtotime($date);
    $dayNum = round($diff / 86400);
    $days = '';
    if ($dayNum <= 7) {
        if ($dayNum == 1) {
            $days .= "1d ago";
        } else {
            $days .= $dayNum . "d ago";
        }
    }
    if ($dayNum > 7) {
        if ($dayNum < 14) {
            $days .= "1w ago";
        } elseif ($dayNum > 14 && $dayNum <= 21) {
            $days .= "2w ago";
        } elseif ($dayNum > 21 && $dayNum <= 30) {
            $days .= "3w ago";
        } else {
            $days .= "1mo ago";
        }
    }
    return $days;
}

// Helping function for listing languages and roles
function strToArr($string)
{
    return explode(' ', $string);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Spartan:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Frontend Mentor | Job Listings</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        #filters {
            margin-left: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
    <header class="header"></header>

    <div class="container">
        <div class="search">
            <div class="search__content">
                <?php if ($role != '') { ?>
                    <a href="<?php echo getHref($row['role'], $level) ?>"><span class="closeTag">
                            <?php echo $role; ?>
                        </span>
                    <?php } ?>
                    <?php if ($level != '') { ?>
                        <a href="<?php echo getHref($role, $row['level']) ?>"><span class="closeTag">
                                <?php echo $level; ?>
                            </span></a>
                    <?php } ?>
            </div>
            <a href="?"><button class="search__clear">
                    Clear
                </button></a>
        </div>
        <?php

        while ($row = mysqli_fetch_assoc($r)) {

        ?>
            <div class="jobs">
                <div class="jobsItem">
                    <div class="jobsColumn jobsColumn--left">
                        <p><img src="<?php echo $row['logo'] ?>" class="img-circle" width="150"></p>
                        <div class="jobInfo">
                            <span class="jobCompany"><?php echo $row['company'] ?></span>
                            <?php if (timeAgo($row['postedAt']) == "0d ago" || timeAgo($row['postedAt']) == "1d ago" || timeAgo($row['postedAt']) == "2d ago") { ?>
                                <span class="jobNew">NEW!</span>
                            <?php } ?>
                            <?php if ($row['featured'] == 1) { ?>
                                <span class=jobFeatured>FEATURED</span>
                            <?php } ?>
                            <span class="jobTitle"><?php echo $row['position'] ?></span>
                            <ul class="jobDetails">
                                <li class="jobDetails-item"><?php echo timeAgo($row['postedAt']) ?></li>
                                <li class="jobDetails-item"><?php echo $row['contract'] ?></li>
                                <li class="jobDetails-item"><?php echo $row['location'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="jobsColumn jobsColumn--right">
                        <a href="<?php echo getHref($row['role'], $level) ?>"><span class="tag" name="frontend">
                                <p><?php echo $row['role'] ?></p>
                            </span></a>
                        <a href="<?php echo getHref($role, $row['level']) ?>"><span class="tag">
                                <p><?php echo $row['level'] ?></p>
                            </span></a>
                        <?php if ($row['languages'] != '') {
                            foreach (strToArr(($row['languages'])) as $language) { ?>
                                <span class="tag">
                                    <p><?php echo $language ?></p>
                                </span>
                        <?php }
                        } ?>
                        <?php if ($row['tools'] != '') {
                            foreach (strToArr(($row['tools'])) as $tool) { ?>
                                <span class="tag">
                                    <p><?php echo $tool; ?></p>
                                </span>
                        <?php }
                        } ?>
                        <a href="delete.php?deleteid=<?php echo $row['id']; ?>"><span class="jobDelete">Delete</span></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <a class="btn btn-primary" href="/static-job-listings-master/create.php" role="button">Create New Listing</a>
    </div>

</body>

</html>
