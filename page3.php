<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "talkaitdb");

if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
    exit;
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Fetch mood distribution data from the database
    $sql = "SELECT mood, COUNT(*) as count FROM posts WHERE user_id = ? GROUP BY mood";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $moodData = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $moodData[$row['mood']] = intval($row['count']);
    }

    mysqli_stmt_close($stmt);

    // Close the connection and proceed to create the pie chart
    mysqli_close($conn);
} else {
    echo "User not logged in.";
}

// Now, let's create the pie chart using Google Charts
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mood Distribution and Posts</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        body {
            display: flex;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .chart-column {
            flex: 1;
            background-color: #f4f4f4;
            padding: 20px;
            box-sizing: border-box;
        }
        .posts-column {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="chart-column">
        <div id="moodChart" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="posts-column">
        <h2>Posts by Mood</h2>
        <?php
        // Display posts based on mood
        if (isset($moodData)) {
            foreach ($moodData as $mood => $count) {
                echo "<h3>$mood ($count posts)</h3>";
                
                // Fetch and display posts of this mood
                $sql = "SELECT comment FROM posts WHERE user_id = ? AND mood = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "is", $user_id, $mood);
                mysqli_stmt_execute($stmt);
                $postsResult = mysqli_stmt_get_result($stmt);
                
                echo "<ul>";
                while ($postRow = mysqli_fetch_assoc($postsResult)) {
                    echo "<li>" . htmlspecialchars($postRow['comment']) . "</li>";
                }
                echo "</ul>";

                mysqli_stmt_close($stmt);
            }
        }
        ?>
    </div>

    <script>
        // Mood data from PHP
        var moodData = <?php echo json_encode($moodData); ?>;

        // Load the Google Charts library
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Function to draw the pie chart
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mood');
            data.addColumn('number', 'Count');
            data.addRows([
                <?php foreach ($moodData as $mood => $count) {
                    echo "['$mood', $count],";
                } ?>
            ]);

            var options = {
                title: 'Mood Distribution'
            };

            var chart = new google.visualization.PieChart(document.getElementById('moodChart'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>

