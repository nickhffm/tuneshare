<style>

.card-container {
    padding: 10px;
    background-color: #222;
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
</style>

<?php
    function createList($list) {
        foreach($list as $item) {
            echo '
                <div class="card-container">
                    <img class="card-image" src="' . $item['image'] . '" alt="' . $item['image_alt'] . 
                    '" style="float:left; width: 180px; height: 180px; padding: 5px;">
                    <h2>' . $item['title'] . '</h2>
                    <p><a href="#">' . $item['artist'] . '</a>&nbsp;&#9900;&nbsp;' . $item['date'] . '</p>
                    <p>' . $item['description'] . '</p>';

                    foreach($item['tags'] as $tag) {
                        echo '<div class="chip">' . $tag . '</div>';
                    }
            echo '</div>';
        }
    }
?>