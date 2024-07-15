<!-- resources/views/reports/generate.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Generate Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Generate Reports</h1>

    <form method="GET" action="{{ route('generateReports.generate') }}">
        @csrf
        <label for="floor">Floor Filter:</label>
        <input type="text" id="floor" name="floor">

        <label for="type">Type Filter:</label>
        <select id="type" name="type">
            <option value="">semua</option>
            <option value="normal">Normal</option>
            <option value="deluxe">Deluxe</option>
        </select>

        <label for="month">Month Filter:</label>
        <input type="text" id="month" name="month">

        <label for="job_name">Job Name Filter:</label>
        <select id="job_name" name="job_name">
            <option value=" ">semua</option>
            @foreach ($jobs as $job)
                <option value="{{ $job->name_job }}">{{ $job->name_job }}</option>
            @endforeach
        </select>

        <label for="format">Report Format:</label>
        <select id="format" name="format">
            <option value="">web view</option>
            <option value="pdf">PDF</option>
        </select>

        <button type="submit">Generate Report</button>
    </form>
</body>
</html>
