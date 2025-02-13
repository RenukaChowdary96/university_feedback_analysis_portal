<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-image: url('admin_dashboardimg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h2 {
            margin-bottom: 20px;
            color: #fff;
            padding: 15px;
            background-color: #3498db;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .admin-btn {
            padding: 15px 25px;
            font-size: 18px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .admin-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <h2>Admin Dashboard - Feedback Analysis</h2>

    <div class="button-container">
        <button class="admin-btn" onclick="location.href='admin_dashboard_filter.php'"> View Feedback Analysis Based On Filtering</button>
        <button class="admin-btn" onclick="location.href='overall_feedback_dashboard.php'"> View Overall Feedback</button>
        <button class="admin-btn" onclick="location.href='leaderboard.php'"> View Leaderboard</button>
        
    </div>

</body>

</html>
