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
            .card-container {
                margin: 0 20px 0 20px;
                width: calc(100% - 40px);
                width: -webkit-calc(100% - 40px);
                background-color: #121212;
                display: flex;
            }
            .card-image {
                width: 400px;
                height: 100%;
                margin: 0;
            }
            .info-container {
                float: left;
                height: 400px;
                padding-left: 10px;
            }
            .image-container {
                float: left;
                height: 400px;
            }
            audio {
                margin: 0 20px 20px 20px;
                clear: both;
                display: block;
                width: calc(100% - 40px);
                width: -webkit-calc(100% - 40px);
            }
            .comment-container {
                margin: 0 20px 20px 20px;
                width: calc(100% - 40px);
                width: -webkit-calc(100% - 40px);
                background-color: #121212;
            }
            .comment {
                color: whitesmoke;
            }
            .new-comment {
                width: 100%;
                color: black;
            }
            .field {
                margin: 0 15px 0 15px;
                color: white;
            }
            #edit-button, #save-button {
                position: absolute;
                right: 40px;
                top: 65px;
                z-index: 100;
                font-size: 20px;
                color: whitesmoke;
            }
            #edit-button:hover, #save-button:hover {
                cursor: pointer;
            }
        </style>
    <?php
        include 'components/navbar.php';
        include 'components/list.php';
        include 'services/database.php';
        $comments = array();
    ?>
    </head>

    <body>
        <div id="button-container">
        <span id="edit-button" class="glyphicon glyphicon-pencil" 
        data-placement="bottom" data-toggle="tooltip" title="Edit"></span>
        </div>
        <?php

            createNavbar('');
            $SESSION['song_id'] = $_SERVER['QUERY_STRING'];
            $songid = $_SERVER['QUERY_STRING'];
            $sql = "SELECT * FROM Songs WHERE song_id = $songid";
            $result = $pdo->query($sql);

            foreach($result as $item) {

                echo '
                <div id="content" class="card-container">
                    <div class="image-container">
                        <img class="card-image" src="' . $item['image'] . '" alt="' . $item['title'] . '">
                    </div>
                    <div class="info-container">
                        <h1>' . $item['title'] . '</h1>
                        <p><a href="#" class="link">' . $item['artist'] . '</a>&nbsp;&#9900;&nbsp;' . $item['date_added'] . '</p>
                        <p>' . $item['description'] . '</p>
                        <p><b>Tags:</b> ' . $item['tags'] . '</p>
                    </div>
                </div>

                <audio controls>
                    <source src="' . $item['song_url'] . '" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>

                <div class="comment-container">
                    <span class="field"> Views: 55 </span>
                    <span class="field"> Likes: 10 </span>
                    <span class="field"> Dislikes: 2 </span>
                    <button type="button" class="btn-secondary">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Like
                    </button>
                    <button type="button" class="btn-secondary">
                        <span class="glyphicon glyphicon-thumbs-down"></span> Dislike
                    </button>
                    <button type="button" class="btn-secondary">
                        <span class="glyphicon glyphicon-heart-empty"></span> Add to favorites
                    </button>
                </div>

                <div class="comment-container">';

                foreach($comments as $comment) {
                    echo '
                    <div class="comment">
                        <b>' . $comment['name'] . 
                        '</b>&nbsp;&#9900;&nbsp;' .
                        $comment['date'] . 
                        '<p>' . $comment['comment'] . '</p>
                    </div>
                    ';
                }
                
                echo '
                    <div class="comment">
                        <textarea class="new-comment" placeholder="Leave a comment..."></textarea>
                    </div>
                </div>';
            }

        ?>

        <script>
        initButtons($item);
        function initButtons($item) {

            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
            $("#edit-button").click(function(){
                $("#edit-button").remove();
                $("#content div").remove();
                $(".tooltip-inner").remove();
                $('#button-container').html(`
                <span id="save-button" class="glyphicon glyphicon-floppy-disk" 
                data-placement="bottom" data-toggle="tooltip" title="Save"></span>
                `);
                $('#content').html(`
                <form id="save-form" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" method="post" action="services/updatesong.php">
                    <div class="form-group">
                        <label for="imageFile">Upload cover art</label>
                        <input type="file" class="form-control-file" id="image">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter the title of your work">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags (seperate by commas)</label>
                        <textarea class="form-control" id="tags" rows="2"></textarea>
                    </div>
                </form>
                `);
                $('#image').val($item['image']);
                $('#title').val($item['title']);
                $('#description').val($item['description']);
                $('#tags').val($item['tags']);
                initButtons();
            });
            $("#save-button").click(function(){
                $('#save-form').submit();
            });


        }
        </script>
    </body>
</html>