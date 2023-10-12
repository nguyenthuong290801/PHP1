<?php

require_once './app/controllers/Home.php';
require_once './app/models/User.php';
require_once './app/views/Client/Auth.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEEWEB</title>
    <!-- link scss -> css -->
    <link rel="stylesheet" href="../public/style/index.css">
    <!-- link bootstrap css -->
    <link rel="stylesheet" href="../public/assets/bootstrap-5/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container-fluid bg-light">
        <!-- header -->
        <?php include "./app/views/Client/Layout/Header.php"; ?>
        <!-- main content -->
        <?php
        $section = new Home();
        $section->yield($_SERVER['REQUEST_URI'], $num ?? "");
        ?>
    </div>
    <!-- link bootstrap javascript -->
    <script src="../public/assets/bootstrap-5/js/bootstrap.js"></script>
    <!-- <script src="./public/app.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
</body>

</html>