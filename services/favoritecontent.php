<?php
session_start();
include '../services/database.php';

if (isset($_POST['favorite_content'])) {

    $songid = $_SESSION['song_id'];
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM Favorites WHERE user_id = $userid AND song_id = $songid";
    $result = $pdo->query($sql);
    if ($result->rowCount() == 0) {
        $sql = "INSERT INTO Favorites (user_id, song_id) 
        VALUES ($userid, $songid);";
        $pdo->query($sql);
    }
}
?>

<script>
window.history.back();
</script>