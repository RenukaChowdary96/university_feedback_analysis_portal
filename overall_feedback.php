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

// Get filters from URL
$location = $_GET['location'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// Build the SQL query dynamically
$query = "SELECT question1, question2, question3, question4, question5, question6, question7, question8, question9, question10 FROM feedback WHERE 1=1";
if (!empty($location)) $query .= " AND location = '$location'";
if (!empty($start_date) && !empty($end_date)) $query .= " AND date BETWEEN '$start_date' AND '$end_date'";

// Execute Query
$result = $conn->query($query);

// Data storage for charts
$data = array_fill(1, 9, []);
$suggestions = [];

// Fetch results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        for ($i = 1; $i <= 9; $i++) {
            if (!empty($row["question$i"])) {
                $data[$i][] = $row["question$i"];
            }
        }
        if (!empty($row['question10'])) {
            $suggestions[] = $row['question10'];
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overall Feedback Analysis</title>

    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        <?php for ($i = 1; $i <= 9; $i++): ?>
            var data<?php echo $i; ?> = google.visualization.arrayToDataTable([
                ['Response', 'Count'],
                <?php
                    if (!empty($data[$i])) {
                        $counts = array_count_values($data[$i]);
                        foreach ($counts as $response => $count) {
                            echo "['$response', $count],";
                        }
                    }
                ?>
            ]);

            var options<?php echo $i; ?> = {
                title: 'Question <?php echo $i; ?> Feedback',
                is3D: true,
                colors: ['#2ecc71', '#3498db', '#f1c40f', '#e74c3c']
            };

            var chart<?php echo $i; ?> = new google.visualization.PieChart(document.getElementById('chart<?php echo $i; ?>'));
            chart<?php echo $i; ?>.draw(data<?php echo $i; ?>, options<?php echo $i; ?>);
        <?php endfor; ?>
    }
    </script>

    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        .chart-container { display: flex; flex-wrap: wrap; justify-content: center; }
        .chart { width: 45%; height: 400px; margin: 10px; }
        h2 { background: #3498db; color: white; padding: 10px; border-radius: 5px; }
        .download-btn { background-color: #007bff; color: white; padding: 10px; border-radius: 5px; cursor: pointer; font-size: 16px; margin: 10px; }
    </style>
</head>

<body>
    <h2>Overall Feedback Analysis</h2>

    <!-- Download Buttons -->
    <button id="downloadCSV" class="download-btn">Download CSV</button>
    <button id="downloadExcel" class="download-btn">Download Excel</button>

    <div class="chart-container">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div id="chart<?php echo $i; ?>" class="chart"></div>
        <?php endfor; ?>
    </div>

    <h3>Suggestions (Question 10)</h3>
    <ul>
        <?php foreach ($suggestions as $suggestion): ?>
            <li><?php echo htmlspecialchars($suggestion); ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- JavaScript for Download Functionality -->
    <script>
    document.getElementById("downloadCSV").addEventListener("click", function () {
        window.location.href = "download_data.php?format=csv";
    });

    document.getElementById("downloadExcel").addEventListener("click", function () {
        window.location.href = "download_data.php?format=excel";
    });
    </script>

</body>
</html>
