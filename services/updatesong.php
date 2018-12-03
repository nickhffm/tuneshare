<?php

session_start();

include '../services/database.php';

$song_id = $_SERVER['QUERY_STRING'];
$title = "";
$description = "";
$genre = "";
$artist = "";
$image = "";

if (isset($_POST['update_info'])) {
    $title = (isset($_POST['title']) ? $_POST['title'] : null);
    $description = (isset($_POST['description']) ? $_POST['description'] : null);
    $genre = (isset($_POST['genre']) ? $_POST['genre'] : null);
    $description = (isset($_POST['artist']) ? $_POST['artist'] : null);
    $description = (isset($_POST['image']) ? $_POST['image'] : null);

    $sql = "UPDATE Songs SET 
    title = '$title', 
    description = '$description', 
    genre =  '$description',
    artist = '$artist',
    image = '$image'
    WHERE song_id = $song_id";

    try {
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        array_push($errors, $e);
    }
}
?>
<script>window.history.back()</script>