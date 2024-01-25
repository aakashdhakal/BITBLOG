<?php
session_start();
define('BASE_URL', 'http://localhost/A.D-Blogs/');
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo BASE_URL ?>images/favicon.svg">

    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>UI/dashboard/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>CSS/style.css">
</head>

<body>
    <header>
        <nav class=" side-navigation">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="add.php">Add</a></li>
                <li><a href="view.php">View</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section></section>
    <?php
    include_once 'includes/footer.php';
    ?>
</body>