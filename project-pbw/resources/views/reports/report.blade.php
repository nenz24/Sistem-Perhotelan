<!DOCTYPE html>
<html>
<head>
    <title>Hotel Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Hotel Report</h1>

    <h2>Income Report</h2>
    <table>
        <tr>
            <th>Floor</th>
            <th>Room Type</th>
            <th>Month</th>
            <th>Income</th>
        </tr>
        <tr>
            <td>{{ request('floor') }}</td>
            <td>{{ request('type') }}</td>
            <td>{{ request('month') }}</td>
            <td>Rp {{ number_format($income, 2) }}</td>
        </tr>
    </table>

    <h3>Detailed Transactions</h3>
    <table>
        <tr>
            <th>Room</th>
            <th>Check-In Date</th>
            <th>Check-Out Date</th>
            <th>Payment</th>
        </tr>
        @foreach ($incomeData as $transaction)
        <tr>
            <td>{{ $transaction->room->name_room }}</td>
            <td>{{ $transaction->checkIn_date }}</td>
            <td>{{ $transaction->checkOut_date }}</td>
            <td>Rp {{ number_format($transaction->payment, 2) }}</td>
        </tr>
        @endforeach
    </table>

    <h2>Payroll Report</h2>
    <table>
        <tr>
            <th>Job Name</th>
            <th>Payroll</th>
        </tr>
        <tr>
            <td>{{ request('job_name') }}</td>
            <td>Rp {{ number_format($payroll, 2) }}</td>
        </tr>
    </table>

    <h3>Detailed Payroll</h3>
    <table>
        <tr>
            <th>Worker</th>
            <th>Job</th>
            <th>Wage</th>
        </tr>
        @foreach ($payrollData as $worker)
        <tr>
            <td>{{ $worker->name_worker }}</td>
            <td>{{ $worker->job->name_job }}</td>
            <td>Rp {{ number_format($wages[$worker->id_worker],2) }}</td>
        </tr>
        @endforeach
    </table>

    <h2>Profit</h2>
    <table>
        <tr>
            <th>Profit</th>
        </tr>
        <tr>
            <td>Rp {{ number_format($profit, 2) }}</td>
        </tr>
    </table>
</body>
</html>
