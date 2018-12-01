<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

        <style>
            body {
                background-color: #222;
            }
            .body-container {
                background-color: #121212;
                height: calc(100vh - 54px);
                height: -webkit-calc(100vh - 54px);
                display: block;
                overflow: auto;
            }
            .paginator {
                padding-top: 20px;
                color: whitesmoke;
                clear: both;
                width: 100%;
                height: 100px;
            }
            .pagination li a {
                background-color: #222;
                color: white;
            }
            .pagination li a:hover {
                background-color: #555;
                color: white;
            }
            .pagination .disabled a {
                background-color: #777;
                color: white;
            }
        </style>

        <?php
            include 'components/navbar.php';
            include 'components/list.php';
            include 'sample-data/sample-data.php';
        ?>
    </head>

    <body>
        <?php 
            createNavbar('timeline'); 
        ?>
        <div class="container body-container">
            <?php
            createList($list);
            ?>
            <div class="paginator">
                Showing results 4 of 4
                <ul class="pagination" style="display: block; margin-top: 5px;">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="disabled"><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul> 
            </div>
        </div>
    </body>
</html>
