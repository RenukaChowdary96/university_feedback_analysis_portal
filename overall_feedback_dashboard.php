<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overall Feedback Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        .form-container { width: 50%; margin: auto; padding: 20px; border-radius: 5px; background: #f4f4f4; }
        label { font-size: 16px; font-weight: bold; }
        select, input { width: 100%; padding: 10px; margin: 10px 0; }
        .submit-btn { background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .submit-btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h2>Overall Feedback Dashboard</h2>

    <div class="form-container">
        <form action="overall_feedback.php" method="GET">
            <label for="location">Location:</label>
            <select id="location" name="location" required>
                <option value="">Select Location</option>
                <option value="NTR Library">NTR Library</option>
                <option value="Vehicle parking">Vehicle Parking</option>
                <option value="Girls hostel">Girls Hostel</option>
                <option value="Boys hostel">Boys Hostel</option>
                <option value="Medical Room">Medical Room</option>
                <option value="E Cell">E Cell</option>
                <option value="Guesthouse">Guesthouse</option>
                <option value="Ground">Ground</option>
                <option value="UCO Bank">Bank</option>
                <option value="Administrative Block">Administrative Block</option>
                <option value="IT Department">IT Department</option>
            </select>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" required>

            <button type="submit" class="submit-btn">View Feedback Analysis</button>
        </form>
    </div>

</body>
</html>
