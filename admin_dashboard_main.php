<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Reset & General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* Background Styling */
        body {
            background: url('admin_background.webp') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Logo Styling */
        .logo {
            width: 120px; /* Adjust as needed */
            margin-bottom: 10px;
        }

        /* Dashboard Header */
        h2 {
            color: white;
            padding: 15px 25px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 100%;
            max-width: 500px;
            font-size: 22px;
        }

        /* Button Container (Stacked) */
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px; /* Space between buttons */
            margin-top: 20px;
            width: 100%;
        }

        /* Admin Dashboard Buttons */
        .admin-btn {
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            background: linear-gradient(135deg, #0072ff, #00c6ff);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px; /* Adjust button width */
            text-align: center;
        }

        /* Button Hover Effect */
        .admin-btn:hover {
            opacity: 0.9;
            transform: translateY(-3px);
        }

    </style>
</head>
<body>

    <!-- Vignan Logo -->
    <img src="logo.jpeg" alt="Vignan Logo" class="logo">

    <!-- Dashboard Heading -->
    <h2>Admin Dashboard - Feedback Analysis</h2>

    <!-- Buttons -->
    <div class="button-container">
        <button class="admin-btn" onclick="location.href='admin_dashboard_filter.php'">View Feedback Analysis Based On Filtering</button>
        <button class="admin-btn" onclick="location.href='overall_feedback_dashboard.php'">View Overall Feedback</button>
        <button class="admin-btn" onclick="location.href='leaderboard.php'">View Leaderboard</button>
    </div>

</body>
</html>
