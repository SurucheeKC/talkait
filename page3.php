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
    mysqli_close($conn);
} else {
    echo "User not logged in.";
}
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
        <div id="moodChart" style="width: 125%; height: 600px;"></div>
       
    </div>
    <div class="posts-column">
        <h2>Posts by Mood</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "talkaitdb");

        if (!$conn) {
            echo "Connection error: " . mysqli_connect_error();
            exit;
        }
        if (isset($moodData)) {
            foreach ($moodData as $mood => $count) {
                echo "<h3>$mood ($count posts)</h3>";
           
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
         <h2>Advice</h2>
        <?php
        if (isset($moodData)) {
            foreach ($moodData as $mood => $count) {
                echo "<h3>$mood ($count posts)</h3>";

                // Determine mood-specific advice based on percentage
                $percentage = ($count / array_sum($moodData)) * 100;
                $advice = "";

                if ($mood === 'angry') {
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "You do not have anger issues.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We suggest you plysical exercise to relieve the anger and tension.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest you to use self-care routines.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "We encourage you meditation and seeking professional help if needed.";
                    } else {
                        $advice = "We suggest therapy to address intense anger.";
                    }
                } elseif ($mood === 'happy') {
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "We encourage you to be more happy.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We encourage you to do things that makes you happy.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest you to savor the moment and express gratitude.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "WE suggest setting new goals to maintain motivation.";
                    } else {
                        $advice = "We suggest you to share your happiness with other people.";
                    }

                } elseif ($mood === 'surprise') {
                   
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "We suggest you to embrace the unexpected with curiosity.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We suggest you to take a moment to process the surprise before reacting.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest discussing your feelings and reactions with others.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "We want to remind you that surprises can lead to personal growth and new experiences.";
                    } else {
                        $advice = "We are happy for you.";
                    }
                }
                elseif ($mood === 'sad') {
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "We encourage you to live your life to the fullest.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We encourage you to do things that makes you happy.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest you to write down your thoughts in a journal.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "WE suggest setting new goals to maintain motivation.";
                    } else {
                        $advice = "We suggest you to share your happiness with other people.";
                    }

                }elseif ($mood === 'disgust') {
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "We encourage you to be more happy.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We encourage you to do things that makes you happy.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest you to savor the moment and express gratitude.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "WE suggest setting new goals to maintain motivation.";
                    } else {
                        $advice = "We suggest you to share your happiness with other people.";
                    } 

                }elseif ($mood === 'fear') {
                    if ($percentage >= 0 && $percentage <= 20) {
                        $advice = "We encourage you to be more happy.";
                    } elseif ($percentage > 20 && $percentage <= 40) {
                        $advice = "We encourage you to do things that makes you happy.";
                    } elseif ($percentage > 40 && $percentage <= 60) {
                        $advice = "We suggest you to savor the moment and express gratitude.";
                    } elseif ($percentage > 60 && $percentage <= 80) {
                        $advice = "WE suggest setting new goals to maintain motivation.";
                    } else {
                        $advice = "We suggest you to share your happiness with other people.";
                    } 

                }


                // Display the mood-specific advice
                echo "<p>$advice</p>";
            }
        }
        ?>
    </div>

    <script>
        var moodData = <?php echo json_encode($moodData); ?>;

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

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

