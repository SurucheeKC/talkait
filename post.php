<?php
$conn = mysqli_connect("localhost", "root", "", "talkaitdb");

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
    exit;
}
// else{ echo "conn success";}

$mood = key($_POST);
$post = current($_POST);

switch ($mood) {
    case 'happy':
    case 'sad':
    case 'suprise':
    case 'disgust':
    case 'fear':
    case 'angry':
    case 'journal':
        // Insert the post into the database
        $query = "INSERT INTO posts (user_id, mood, comment) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iss", $user_id, $mood, $post);
        // Replace $user_id with the actual user ID associated with the post

        if (mysqli_stmt_execute($stmt)) {
            echo "Post saved successfully.";
        } else {
            echo "Error occurred while saving the post.";
        }

        mysqli_stmt_close($stmt);
        break;

    default:
        echo "Invalid mood.";
        break;
}

mysqli_close($conn);
?>