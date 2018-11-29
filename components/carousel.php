<?php

function createCarousel($items) {

    echo '
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">';

            foreach ($items as $item) {
                echo '<li data-target="#carousel" data-slide-to="' . $item['number'] . '" '; 
                    if ($item['active']) echo 'class="active"';
                echo '></li>';
            }
        echo '
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">';

            foreach ($items as $item) {
                echo '<div class="item'; if($item['active']) echo ' active'; 
                echo '">
                <img src="' . $item['file'] . '" alt="' . $item['name'] . '" style="max-height: 70vh; margin: auto;">';
                echo $item['caption'];
                echo '</div>';
            }
        echo '</div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    ';
}
?>