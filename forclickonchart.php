<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "talkaitdb");

if (!$conn) {
    echo json_encode(['error' => 'Connection error: ' . mysqli_connect_error()]);
    exit;
}

if (isset($_SESSION['user_id']) && isset($_GET['mood'])) {
    $user_id = $_SESSION['user_id'];
    $mood = $_GET['mood'];
    $sql = "SELECT comment FROM posts WHERE user_id = ? AND mood = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $mood);
    mysqli_stmt_execute($stmt);
    $postsResult = mysqli_stmt_get_result($stmt);

    $posts = [];
    while ($postRow = mysqli_fetch_assoc($postsResult)) {
        $posts[] = $postRow;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    echo json_encode($posts);
} else {
    echo json_encode(['error' => 'User not logged in or mood not provided.']);
}
?>
