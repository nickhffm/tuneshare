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
            #edit-button:hover, #save-button:hover, #delete-button:hover {
                cursor: pointer;
            }
            #delete-button {
                position: relative;
                float: right;
                z-index: 100;
                font-size: 12px;
                color: whitesmoke;
                margin: 5px;
            }
            .feedback-form {
                display: inline-block;
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
    <?php
    createNavbar('');
    $_SESSION['song_id'] = $_SERVER['QUERY_STRING'];
    $songid = $_SERVER['QUERY_STRING'];

    //update likes
    include 'services/database.php';
    $songid = $_SESSION['song_id'];
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM Feedback WHERE song_id = $songid AND likes = true";
    $result = $pdo->query($sql);
    $likes = $result->rowCount();
    $sql = "SELECT * FROM Feedback WHERE song_id = $songid AND dislikes = true";
    $result = $pdo->query($sql);
    $dislikes = $result->rowCount();
    $sql = "UPDATE Songs SET likes = $likes, dislikes = $dislikes WHERE song_id = $songid";
    $pdo->query($sql);
    ?>
    <script>
    function initButtons(title, description, tags) {
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
            <form id="save-form" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" method="post" action="services/updatesong.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="imageFile">Upload cover art</label>
                    <input type="file" class="form-control-file" id="image" name="imageFile">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter the title of your work" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Tags (seperate by commas)</label>
                    <textarea class="form-control" id="tags" rows="2" name="tags"></textarea>
                </div>
            </form>
            `);
            $('#title').val(title);
            $('#description').val(description);
            $('#tags').val(tags);
            initButtons();
        });
        $("#save-button").click(function(){
            $('#save-form').submit();
        });
    }
    </script>
    <?php
    $sql = "SELECT * FROM Songs WHERE song_id = $songid";
    $result = $pdo->query($sql);
    foreach($result as $item) {
        $sql = "UPDATE Songs SET views = views + 1 WHERE song_id = $songid";
        $result = $pdo->query($sql);
    ?>
    <div id="button-container">
        <?php 
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $item['user_id']) {
                echo '<span id="edit-button" class="glyphicon glyphicon-pencil" 
                data-placement="bottom" data-toggle="tooltip" title="Edit"></span>'; 
            }
        }
        ?>
        </div>
        <script>
            <?php 
                echo 'initButtons("' . 
                $item['title'] . '", "' . 
                $item['description'] . '", "' .  
                $item['tags'] . '");';
            ?>
        </script>
        <?php

        echo '
        <div id="content" class="card-container">
            <div class="image-container">
                <img class="card-image" src="' . $item['image_url'] . '" alt="' . $item['title'] . '">
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
            <span class="field"> Views: ' . $item['views'] . ' </span>
            <span class="field" id="likes"> Likes: ' . $item['likes'] . ' </span>
            <span class="field" id="dislikes"> Dislikes: ' . $item['dislikes'] . ' </span>
            <form class="feedback-form" action="services/likecontent.php" method="post">
                <button type="submit" name="like_content" class="btn-secondary feedback-button">
                    <span class="glyphicon glyphicon-thumbs-up"></span> Like
                </button>
            </form>
            <form class="feedback-form" action="services/dislikecontent.php" method="post">
                <button type="submit" name="dislike_content" class="btn-secondary feedback-button">
                    <span class="glyphicon glyphicon-thumbs-down"></span> Dislike
                </button>
            </form>
            <form class="feedback-form" action="services/favoritecontent.php" method="post">
                <button type="submit" name="favorite_content" class="btn-secondary feedback-button">
                    <span class="glyphicon glyphicon-heart-empty"></span> Add to favorites
                </button>
            </form>
        </div>

        <div class="comment-container">';

        $sql = "SELECT * FROM Comments WHERE song_id = $songid ORDER BY date ASC";
        $comments = $pdo->query($sql);

        foreach($comments as $comment) {
            $commentuserid = $comment['user_id'];
            $sql = "SELECT username FROM Users WHERE user_id = $commentuserid";
            $usernames = $pdo->query($sql);
            foreach($usernames as $username) {
                echo '
                <div class="comment">
                    <span id="delete-button" class="glyphicon glyphicon-trash" 
                    data-placement="bottom" data-toggle="tooltip" title="Delete"></span>
                    <b>' . $username['username'] . 
                    '</b>&nbsp;&#9900;&nbsp;' .
                    $comment['date'] . 
                    '<p>' . $comment['comment'] . '</p>
                </div>
                ';
            }
        }
        
        echo '
            <form class="comment-form" action="services/commentcontent.php" method="post">
                <div class="comment">
                    <textarea name="comment" class="new-comment" placeholder="Leave a comment..."></textarea>
                </div>
                <button name="submit_comment" type="submit">Post comment</button>
            </form>
        </div>';
    }
    ?>
    </body>
</html>