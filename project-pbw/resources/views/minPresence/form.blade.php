<!-- resources/views/minPresence/form.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Record Minimum Presence</title>
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
    <h1 style="text-align: center;">Record Minimum Presence</h1>
    
    @if (session('success'))
        <div style="text-align: center; color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('minPresence.record') }}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Worker Name</th>
                    <th>Minimum Presence Days</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workers as $worker)
                    <tr>
                        <td>{{ $worker->name_worker }}</td>
                        <td>
                            <input type="number" name="workers[{{ $worker->id_worker }}]" min="0" required>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        <label for="commonMinPres">Isilah min kehadiran untuk semuanya:</label>
                        <input type="number" id="commonMinPres" name="common_min_pres" min="0">
                        <button type="button" onclick="applyCommonMinPres()">Apply</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" style="margin-top: 20px;">Submit</button>
    </form>

    <script>
        function applyCommonMinPres() {
            var commonMinPres = document.getElementById('commonMinPres').value;
            var inputs = document.querySelectorAll('input[name^="workers["]');
            inputs.forEach(function(input) {
                input.value = commonMinPres;
            });
        }
    </script>
</body>
</html>
