<?php
session_start();
include '../services/database.php';

if (isset($_POST['submit_comment'])) {

    $songid = $_SESSION['song_id'];
    $userid = $_SESSION['user_id'];

    $comment = (isset($_POST['comment']) ? $_POST['comment'] : "");

    $sql = "INSERT INTO Comments (user_id, song_id, comment) 
    VALUES (:userid, :songid, :comment)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':songid', $songid);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
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