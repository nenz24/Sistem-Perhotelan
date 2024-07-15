<!-- resources/views/presence/form.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Record Presence</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Record Presence</h1>
    
    @if (session('success'))
        <div style="text-align: center; color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('presence.record') }}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Worker Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $worker)
                    <tr>
                        <td>{{ $worker->name_worker }}</td>
                        <td>
                            <input type="checkbox" name="workers[{{ $worker->id_worker }}][status_pres]" value="1" checked>                        
                            <input type="hidden" name="workers[{{ $worker->id_worker }}][id_worker]" value="{{ $worker->id_worker }}">                        </td>
                    </tr>
                @endforeach
                <label for="tanggal"></label>
                <input type="date" name="date">
            </tbody>
        </table>
        <button type="submit" style="margin-top: 20px;">Submit</button>
    </form>
</body>
</html>
