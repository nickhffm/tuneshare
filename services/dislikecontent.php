<?php
session_start();
include '../services/database.php';

if (isset($_POST['dislike_content'])) {

    $songid = $_SESSION['song_id'];
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM Feedback WHERE user_id = $userid AND song_id = $songid";
    $result = $pdo->query($sql);
    if ($result->rowCount() == 0) {
        $sql = "INSERT INTO Feedback (user_id, song_id, likes, dislikes) 
        VALUES ($userid, $songid, false, true);";
        $pdo->query($sql);
    }
    else {
        foreach($result as $item) {
            $sql = "UPDATE Feedback SET likes = false, dislikes = true WHERE feedback_id = " . $item['feedback_id'];
            $result = $pdo->query($sql);
        }
    }
}
?>
<script>
window.history.back();
</script>
<style>
    body {
        background-color: #222;
    }
</style>