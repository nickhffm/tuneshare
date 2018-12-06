<!--
1. Your website should have a name, a simple logo, and follow a design theme.
2. Your website should have a Landing Page, which is the first page the non-registered 
users will see after typing the URL for your site.
3. Your website needs to offer registration option for new users, as well as login/logout 
options for registered users.
4. Each user should have a simple My Account page where they can change user specific 
settings such as passwords, profile picture, and have the ability to delete the account.
5. You should use JavaScript or jQuery for user input validation and other effects.
6. Your website need to look visually pleasing and intuitive for the users. Make the best 
use of the  Bootstrap framework and CSS Design.
BONUS Your website can integrate some form of web service or API, such as:
    Google Maps: To show the location in a map, for a user.
    Weather: To show the weather for a user’s location.
    Use of AJAX for asynchronous server requests.

1. Your website will allow registered user to upload images and add information to the 
image such as: title, short description, and tags. 
2. Every image uploaded to the system should have its unique URL. This URL will be used 
to access the image. The page displaying the image should have the following options for 
registered users:
    Like and Dislike options.
    Display the Popularity of the image based on the amount of likes minus the amount of dislikes.
    Add to Favorite option.
    Display the amount of times the image has been viewed.
    A comment section where users can leave comments about the picture.
3. Non-registered users can see and share all the images. They also can see the comments, 
tags and popularity of the image.
4. Your website should have the most popular images of the day on the Landing Page. The 
metric to select such images is up to you.
5. The user that owns the image should be able to delete any comment on the image as well 
as the image itself. If a main comment is deleted, so are their children (reply comments).
6. Your website should have an image search functionality based on tags.
7. Develop other features appropriate to the design theme of your website.

-->

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

        <?php
            include 'components/navbar.php'; 
            include 'components/carousel.php';
        ?>

        <style>
            body {
                background-color: #222;
            }
        </style>

    </head>

    <body>
        <?php 
            createNavbar('home'); 
        ?>
        <div class="fluid-container">
            <?php
                $items = array();
                $items[0] = array("number" => 0, "active"=> true, "name" => 'Liste', "file" => "images/listening.jpg", "caption" => '
                <div class="carousel-caption">
                    <h3>Listen</h3>
                    <p>Listen to our diverse music library, uploaded by people like you</p>
                </div>
                ');
                $items[1] = array("number" => 1, "active"=> false, "name" => 'Upload', "file" => "images/audio.jpg", "caption" => '
                <div class="carousel-caption">
                    <h3>Share</h3>
                    <p>Share you own music and interact with your listeners</p>
                </div>
                ');
                $items[2] = array("number" => 2, "active"=> false, "name" => 'Discover', "file" => "images/concert.jpg", "caption" => '
                <div class="carousel-caption">
                    <h3>Discover</h3>
                    <p>Discover music you would have never heard otherwise and interact with the artists</p>
                </div>
                ');
                createCarousel($items);

                include 'services/database.php';
                $sql = "SELECT * FROM Songs ORDER BY Views DESC LIMIT 3";
                $topsongs = $pdo->query($sql);

                echo '
                <div class="jumbotron" style="background-color: #121212; color: whitesmoke; padding: 40px;">
                <h1 class="row">Top Songs</h1>
                <div class="row">
                ';
            
                    foreach ($topsongs as $song) {
                        echo '<a style="color: inherit; text-decoration: none" href="content.php?' . $song['song_id'] . '">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="' . $song['image_url'] . '" alt = "' . $song['title'] . '" style="width:100%">
                            <h3>' . $song['title'] . '</h3>
                        </div></a>';
                    }
                echo '</div>
            </div>
        </div>
    </body>
</html>';

?>
