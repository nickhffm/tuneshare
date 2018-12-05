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
            color: whitesmoke;
        }
        .card-container {
            margin: 0 20px 0 20px;
            width: calc(100% - 40px);
            width: -webkit-calc(100% - 40px);
            background-color: #121212;
            display: flex;
        }
        .btn-secondary {
            background-color: #444;
        }

        </style>
        <?php
            include 'components/navbar.php';
            include 'components/list.php';
        ?>
    </head>

    <body>
        <?php 
            createNavbar('upload');

        ?>

        <div class="container card-container">
            <form class="col-xs-12 col-sm-12 col-md-6 col-lg-6" action="services/newupload.php" method="post" enctype="multipart/form-data">
                <h2>Upload a song</h2>
                <div class="form-group">
                    <label for="musicFile">Upload mp3 file</label>
                    <input type="file" class="form-control-file" name="musicFile">
                </div>
                <div class="form-group">
                    <label for="imageFile">Upload cover art</label>
                    <input type="file" class="form-control-file" name="imageFile">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter the title of your work">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Tags (seperate by commas)</label>
                    <textarea class="form-control" name="tags" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary" name="new_song">Submit</button>
            </form>
        </div>
    </body>
</html>