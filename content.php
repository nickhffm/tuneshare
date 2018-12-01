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
        </style>
    <?php
        include 'components/navbar.php';
        include 'components/list.php';
        include 'sample-data/sample-data.php';
    ?>
    </head>

    <body>
        <?php 
            createNavbar('');
            $edit = false;

            $item = $list[$_SERVER['QUERY_STRING']];
            echo '
            <div class="card-container">
                <div class="image-container">
                    <img class="card-image" src="' . $item['image'] . '" alt="' . $item['image_alt'] . '">
                </div>
                <div class="info-container">
                    <h1>' . $item['title'] . '</h1>
                    <p><a href="#" class="link">' . $item['artist'] . '</a>&nbsp;&#9900;&nbsp;' . $item['date'] . '</p>
                    <p>' . $item['description'] . '</p>
                </div>
            </div>

            <audio controls>
                <source src="' . $item['song'] . '" type="audio/mpeg">
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

        ?>
    </body>
</html>