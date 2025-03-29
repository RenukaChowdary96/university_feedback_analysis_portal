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
        .header {
            text-align: center;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
        }
        .header img {
            width: 80px;
            height: auto;
            margin-right: 15px;
        }
        .header h2 {
            color: #3498db;
            font-size: 22px;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 500px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            display: flex;
            flex-direction: column;
            width: 48%;
            margin-bottom: 15px;
        }
        .full-width {
            width: 100%;
        }
        label {
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }
        select, input[type="date"], button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            padding: 12px;
            font-size: 18px;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="logo.jpeg" alt="Vignan Logo">
        <h2>Admin Dashboard - Feedback Analysis</h2>
    </div>

    <form action="admin_analysis.php" method="GET">
        <div class="form-group">
            <label for="stakeholderType">Type of Stakeholder:</label>
            <select id="stakeholderType" name="stakeholderType" required>
                <option value="">Select Stakeholder</option>
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <select id="location" name="location">
                <option value="">Select Location</option>
                <option value="NTR Library">NTR Library</option>
                <option value="Vehicle parking">Vehicle parking</option>
                <option value="Girls hostel">Girls Hostel</option>
                <option value="Boys hostel">Boys hostel</option>
                <option value="Medical Room">Medical Room</option>
                <option value="E Cell">E Cell</option>
                <option value="Guesthouse">Guesthouse</option>
                <option value="Ground">Ground</option>
                <option value="UCO Bank">Bank</option>
                <option value="Administrative Block">Administrative Block</option>
                <option value="IT Department">IT Department</option>
            </select>
        </div>

        <div class="form-group">
            <label for="academic_year">Academic Year</label>
            <select id="academic_year" name="academic_year">
                <option value="">Select Year</option>
                <option value="2022-2023">2022-2023</option>
                <option value="2023-2024">2023-2024</option>
                <option value="2024-2025">2024-2025</option>
            </select>
        </div>

        <div class="form-group">
            <label for="branch">Branch:</label>
            <select name="branch" id="branch" onchange="updateSpecializationDropdown()">
                <option value="">Select Branch</option>
                <option value="B.Tech">B.Tech</option>
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="MCA">MCA</option>
                <option value="MBA">MBA</option>
                <option value="M.Tech">M.Tech</option>
            </select>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <select name="specialization" id="specialization">
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date">
        </div>

        <div class="form-group full-width">
            <button type="submit">Analyze Feedback</button>
        </div>
    </form>

    <script>
        // Define available specializations
        const specializationOptions = {
            "B.Tech": ["CSE", "IT", "EEE", "ECE", "Mechanical", "Civil", "Biotech", "FoodTech", "Bioinformatics"],
            "BCA": ["General"],
            "BBA": ["General"],
            "MBA": ["General"],
            "MCA": ["General"],
            "M.Tech": ["General"]
        };

        // Function to update specialization dropdown based on selected branch
        function updateSpecializationDropdown() {
            const branch = document.getElementById("branch").value;
            const specializationDropdown = document.getElementById("specialization");

            specializationDropdown.innerHTML = '<option value="">All Specializations</option>';
            if (specializationOptions[branch]) {
                specializationOptions[branch].forEach(spec => {
                    const option = document.createElement("option");
                    option.value = spec;
                    option.textContent = spec;
                    specializationDropdown.appendChild(option);
                });
            }
        }
    </script>

</body>

</html>
