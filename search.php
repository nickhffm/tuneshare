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
                color: whitesmoke;
                height: calc(100vh - 54px);
                height: -webkit-calc(100vh - 54px);
                display: block;
                overflow-y: auto;
            }
        </style>
        <?php
            include 'components/navbar.php';
            include 'components/list.php';
            include 'sample-data/sample-data.php';
            include 'services/database.php';

            $sql = "SELECT * FROM Songs WHERE 
            title LIKE '%" . $_POST['search'] . "%' OR 
            description LIKE '%" . $_POST['search'] . "%' OR 
            genre LIKE '%" . $_POST['search'] . "%' OR 
            tags LIKE '%" . $_POST['search'] . "%' OR 
            artist LIKE '%" . $_POST['search'] . "%' 
            ORDER BY date_added DESC;";
            $result = $pdo->query($sql);
        ?>
    </head>

    <body>
        <?php 
            createNavbar(''); 
        ?>
        <div class="container body-container">
            <?php
            createList($result);
            ?>
        </div>
    </body>
</html>
