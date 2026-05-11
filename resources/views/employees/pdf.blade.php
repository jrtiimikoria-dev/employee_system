<!DOCTYPE html>
<html>
<head>

    <title>Employees PDF</title>

    <style>

        body{
            font-family:Arial;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:10px;
        }

    </style>

</head>
<body>

<h2>
    Employee Records
</h2>

<table>

    <thead>

        <tr>

            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>

        </tr>

    </thead>

    <tbody>

        @foreach($employees as $employee)

        <tr>

            <td>
                {{ $employee->first_name }}
                {{ $employee->last_name }}
            </td>

            <td>
                {{ $employee->position }}
            </td>

            <td>
                {{ $employee->email }}
            </td>

            <td>
                {{ $employee->phone_number }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>