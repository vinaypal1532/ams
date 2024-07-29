<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
    <style>
        /* Add your custom styles for PDF here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
            height: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://acmeindian.com/assets/images/logo/logo.jpg" alt="Company Logo">
        </div>
        <div class="header">
            <h2>ACME Electromechanical Solutions</h2>
            <p>11A/1 Govind Garden, Raisen Road, Govindpura, 462023</p>
        </div>
        <h2 style="text-align:center;">Attendance Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->user->name }}</td>
                        <td>{{ $attendance->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} ACME Electromechanical Solutions. All rights reserved.</p>
    </div>
</body>
</html>
