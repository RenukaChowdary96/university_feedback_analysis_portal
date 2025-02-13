<?php
// Database connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "university_feedback";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filter values from URL parameters
$stakeholder = $_GET['stakeholder'] ?? '';
$location = $_GET['location'] ?? '';
$year = $_GET['year'] ?? '';
$branch = $_GET['branch'] ?? '';
$specialization = $_GET['specialization'] ?? '';
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';
$format = $_GET['format'] ?? 'csv'; // Default to CSV

// Build the SQL query dynamically
$query = "SELECT * FROM feedback WHERE 1=1";
if (!empty($stakeholder)) $query .= " AND stakeholder = '$stakeholder'";
if (!empty($location)) $query .= " AND location = '$location'";
if (!empty($year)) $query .= " AND academic_year = '$year'";
if (!empty($branch)) $query .= " AND branch = '$branch'";
if (!empty($specialization)) $query .= " AND specialization = '$specialization'";
if (!empty($start_date) && !empty($end_date)) $query .= " AND date BETWEEN '$start_date' AND '$end_date'";

// Execute Query
$result = $conn->query($query);

// Check if there is data
if ($result->num_rows > 0) {
    // Define headers for CSV and Excel
    $columns = array("ID", "Stakeholder", "Academic Year", "Branch", "Specialization", "Date", "Location", 
                     "Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7", "Q8", "Q9", "Q10");

    if ($format == 'csv') {
        // Set headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="filtered_feedback.csv"');

        $output = fopen("php://output", "w");
        fputcsv($output, $columns);

        while ($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }

        fclose($output);
    } else {
        // Set headers for Excel download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="filtered_feedback.xls"');

        echo implode("\t", $columns) . "\n";

        while ($row = $result->fetch_assoc()) {
            echo implode("\t", $row) . "\n";
        }
    }
    
    exit();
} else {
    echo "No data found";
}

$conn->close();
?>
