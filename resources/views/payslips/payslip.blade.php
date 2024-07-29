<!-- payslip.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payslip</title>
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
            margin-bottom: 10px; /* Reduced space between logo and header */
        }
        .logo img {
            max-width: 150px;
            height: auto;
        }
        .header {
            text-align: center;
            margin-top: 0; /* Remove or reduce space above header */
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
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
        .p_head {
            text-align: center;
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
        <h2 class="p_head">Payslip Details</h2>
        <table>
            <tr>
                <th>Employee</th>
                <td>{{ $payslip->user->name }}</td>
            </tr>
            <tr>
                <th>Month</th>
                <td>{{ $payslip->month }}</td>
            </tr>
            <tr>
                <th>Basic Salary</th>
                <td>{{ $payslip->basic_salary }}</td>
            </tr>
            <tr>
                <th>Allowances</th>
                <td>{{ $payslip->allowances }}</td>
            </tr>
            <tr>
                <th>Deductions</th>
                <td>{{ $payslip->deductions }}</td>
            </tr>
            <tr>
                <th>Total Days</th>
                <td>{{ $payslip->total_days }}</td>
            </tr>
            <tr>
                <th>Advance Salary</th>
                <td>{{ $payslip->advance_salary }}</td>
            </tr>
            <tr>
                <th>Days Worked</th>
                <td>{{ $payslip->days_worked }}</td>
            </tr>
            <tr>
                <th>Payable Salary</th>
                <td>{{ $payslip->net_salary }}</td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} ACME Electromechanical Solutions. All rights reserved.</p>
    </div>
</body>
</html>
