<style>

.card-container {
    padding: 10px;
    color: whitesmoke;
}
.chip {
    display: inline-block;
    padding: 0 10px;
    height: 40px;
    font-size: 12px;
    line-height: 40px;
    border-radius: 15px;
    background-color: #999;
    color: black;
    margin: 3px;
}
.card-image {
    margin-right: 5px;
}
.link {
    color: whitesmoke;
}
.link:hover {
    color: #999;
}
.header {
    color: whitesmoke;
    text-decoration: none;
}
.header:hover {
    text-decoration: none;
    color: inherit;
}

</style>

<?php
    function createList($list) {
        foreach($list as $item) {
            echo '
                <div class="container">
                    <a href="content.php?' . $item['id'] . '"><img class="card-image" src="' .
                    $item['image'] . '" alt="' . $item['image_alt'] . 
                    '" style="float:left; width: 180px; height: 180px; padding: 5px;"></a>
                    <a href="content.php?' . $item['id'] . '" class="header"><h2>' . $item['title'] . '</h2></a>
                    <p><a href="#" class="link">' . $item['artist'] . '</a>&nbsp;&#9900;&nbsp;' . $item['date'] . '</p>
                    <p>' . $item['description'] . '</p>';

                    foreach($item['tags'] as $tag) {
                        echo '<div class="chip">' . $tag . '</div>';
                    }
            echo '</div>';
        }
    }
?>