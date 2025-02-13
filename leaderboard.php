<?php
// Database Connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "university_feedback"; // Update with your actual database name

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch best & worst rated locations
$leaderboardQuery = "SELECT location, 
                 AVG(CASE 
                     WHEN question1 = 'Excellent' THEN 4 
                     WHEN question1 = 'Good' THEN 3 
                     WHEN question1 = 'Fair' THEN 2 
                     WHEN question1 = 'Poor' THEN 1 
                 END) AS avg_rating 
          FROM feedback 
          GROUP BY location 
          ORDER BY avg_rating DESC";

$leaderboardResult = $conn->query($leaderboardQuery);
$leaderboardData = [];

if ($leaderboardResult->num_rows > 0) {
    while ($row = $leaderboardResult->fetch_assoc()) {
        $leaderboardData[] = [$row['location'], round($row['avg_rating'], 2)];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>

    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawLeaderboardChart);

    function drawLeaderboardChart() {
        var data = google.visualization.arrayToDataTable([
            ['Location', 'Average Rating'],
            <?php 
                foreach ($leaderboardData as $data) {
                    echo "['{$data[0]}', {$data[1]}],";
                }
            ?>
        ]);

        var options = {
            title: 'University Feedback Leaderboard',
            hAxis: { title: 'Location' },
            vAxis: { title: 'Average Rating (1-4)' },
            bars: 'vertical',
            colors: ['#3498db']
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('leaderboard_chart'));
        chart.draw(data, options);
    }
    </script>

    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        h2 { background: #3498db; color: white; padding: 10px; border-radius: 5px; }
        #leaderboard_chart { width: 80%; height: 500px; margin: auto; }
    </style>
</head>

<body>
    <h2>Feedback Leaderboard</h2>
    <div id="leaderboard_chart"></div>
</body>
</html>
