<?php

require_once './app/views/Client/Auth.php';
require_once './app/models/User.php';

if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard Panel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./public/style/index.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <?php include "./app/views/Admin//components/style.php"; ?>
    </head>

    <body>
        <?php include "./app/views/Admin/components/body.php"; ?>

        <?php include "./app/views/Admin//components/script.php"; ?>
        <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
        <script>
            $(document).ready(function() {
                // 
                $('.main-dashboard').load('ProductAdmin');
                // 
                $(".formadmin").on("click", function() {
                    $('.main-dashboard').empty();
                    $.get("FormAdmin", function(data) {
                        $('.main-dashboard').html(data);
                    })
                });
                // 
                $(".productadmin").on("click", function() {
                    $('.main-dashboard').empty();
                    $.get("ProductAdmin", function(data) {
                        $('.main-dashboard').html(data);
                    })
                });
                $(".productdelete").on("click", function() {
                    $('.main-dashboard').empty();
                    $.get("ProductDelete", function(data) {
                        $('.main-dashboard').html(data);
                    })
                });
                //
                // Ajax product more
                var count = 1;
                count++;
                $('#more').on("click", function() {
                    var url = "ProductMore/page/count";
                    var updatedUrl = url.replace("count", count);
                    $.get(updatedUrl, function(data) {
                        $('.list').append(data);
                        count++;
                    });
                });
            });
        </script>
    </body>

    </html>
<?php
else :
    header('Location: /login');
endif;
?>