@extends('layouts.app')

@section('title', 'Employees')

@section('page-title', 'Employees')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<style>

    thead input,
    thead select{
        width:100%;
        padding:8px 10px;
        border-radius:8px;
        border:1px solid #cbd5e1;
        outline:none;
        font-size:12px;
    }

    thead input:focus,
    thead select:focus{
        border-color:#38bdf8;
        box-shadow:0 0 0 3px rgba(56,189,248,0.15);
    }

    .employee-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .employee-header h1{
        font-size:34px;
        color:#0f172a;
        font-weight:700;
    }

    .employee-header p{
        color:#64748b;
        margin-top:8px;
    }

    .create-btn{
        background:linear-gradient(
            135deg,
            #0ea5e9,
            #38bdf8
        );

        color:white;
        padding:14px 22px;
        border-radius:14px;
        text-decoration:none;
        font-weight:600;
        transition:0.3s;
        box-shadow:0 12px 30px rgba(14,165,233,0.25);
    }

    .create-btn:hover{
        transform:translateY(-4px);
        box-shadow:0 18px 35px rgba(14,165,233,0.35);
    }

    /* STATS */

    .employee-stats{
        display:grid;
        grid-template-columns:
        repeat(auto-fit,minmax(220px,1fr));
        gap:25px;
        margin-bottom:30px;
    }

    .stat-card{
        background:white;
        border-radius:22px;
        padding:30px;
        position:relative;
        overflow:hidden;
        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);
        transition:0.3s;
    }

    .stat-card:hover{
        transform:translateY(-6px);
    }

    .stat-card h2{
        font-size:38px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .stat-card p{
        color:#64748b;
        font-size:15px;
    }

    /* TABLE */

    .table-wrapper{
        background:white;
        border-radius:24px;
        overflow-x:auto;
        overflow-y:hidden;
        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);
        width:100%;
        padding-bottom:20px;
    }

    .table-top{
        padding:25px 30px;
        border-bottom:1px solid #e2e8f0;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;
        gap:20px;
    }

    .table-top h2{
        color:#0f172a;
        font-size:24px;
    }

    table{
        width:100%;
        min-width:1500px;
        border-collapse:collapse;
    }

    .table-wrapper::-webkit-scrollbar{
        height:10px;
    }

    .table-wrapper::-webkit-scrollbar-track{
        background:#e2e8f0;
        border-radius:20px;
    }

    .table-wrapper::-webkit-scrollbar-thumb{
        background:#38bdf8;
        border-radius:20px;
    }

    table thead{
        background:#f8fafc;
    }

    table th{
        padding:14px 12px;
        text-align:left;
        font-size:13px;
        color:#64748b;
        font-weight:600;
    }

    table td{
        border-top:1px solid #f1f5f9;
        color:#0f172a;
        vertical-align:middle;
        padding:14px 12px;
        font-size:14px;
    }

    tbody tr{
        transition:0.3s;
    }

    tbody tr:hover{
        background:#f8fafc;
    }

    .employee-avatar{
        width:42px;
        height:42px;
        border-radius:50%;
        object-fit:cover;
        border:3px solid #e0f2fe;
    }

    .employee-name{
        font-weight:600;
        font-size:14px;
    }

    .gender-badge{
        padding:7px 14px;
        border-radius:30px;
        font-size:13px;
        font-weight:600;
        display:inline-block;
    }

    .male{
        background:#dbeafe;
        color:#1d4ed8;
    }

    .female{
        background:#fce7f3;
        color:#be185d;
    }

    .other{
        background:#ede9fe;
        color:#7c3aed;
    }

    .action-buttons{
        display:flex;
        gap:6px;
        align-items:center;
    }

    .action-btn{
        width:40px;
        height:40px;
        border:none;
        border-radius:10px;
        cursor:pointer;
        display:flex;
        align-items:center;
        justify-content:center;
        transition:0.3s;
        text-decoration:none;
        font-size:12px;
        font-weight:600;
    }

    .view-btn{
        background:#e0f2fe;
        color:#0284c7;
    }

    .edit-btn{
        background:#fef3c7;
        color:#d97706;
    }

    .delete-btn{
        background:#fee2e2;
        color:#dc2626;
    }

    .action-btn:hover{
        transform:translateY(-3px);
    }

    .delete-form{
        margin:0;
    }

</style>

<!-- HEADER -->
<div class="employee-header">

    <div>

        <h1>
            Employee Management
        </h1>

        <p>
            Manage all employees and workforce records.
        </p>

    </div>

    <a href="{{ route('employees.create') }}"
       class="create-btn">

        + Add Employee

    </a>

</div>

<!-- STATS -->
<div class="employee-stats">

    <div class="stat-card">

        <h2>
            {{ $employees->count() }}
        </h2>

        <p>
            Total Employees
        </p>

    </div>

    <div class="stat-card">

        <h2>
            {{ $totalDivisions }}
        </h2>

        <p>
            Total Divisions
        </p>

    </div>

    <div class="stat-card">

        <h2>
            10
        </h2>

        <p>
            Male Staff
        </p>

    </div>

    <div class="stat-card">

        <h2>
            9
        </h2>

        <p>
            Female Staff
        </p>

    </div>

    <div class="stat-card">

        <h2>
            1
        </h2>

        <p>
            Other
        </p>

    </div>

</div>

<!-- TABLE -->
<div class="table-wrapper">

    <div class="table-top">

        <h2>
            Employee Records
        </h2>

    </div>

    @if($employees->count() > 0)

    <table id="employeeTable">

        <thead>

            <!-- MAIN HEADER -->
            <tr>

                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Position</th>
                <th>Division</th>
                <th>Phone #</th>
                <th>Personal Email</th>
                <th>Official Email</th>
                <th>Address</th>
                <th>Bio-Data</th>
                <th>Actions</th>

            </tr>

            <!-- FILTER ROW -->
            <tr>

                <th>
                    <input type="text" placeholder="Search First Name">
                </th>

                <th>
                    <input type="text" placeholder="Search Last Name">
                </th>

                <th>
                    <input type="text" placeholder="Search DOB">
                </th>

                <th>
                    <select>
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </th>

                <th>
                    <input type="text" placeholder="Search Position">
                </th>

                <th>
                    <input type="text" placeholder="Search Division">
                </th>

                <th>
                    <input type="text" placeholder="Search Phone">
                </th>

                <th>
                    <input type="text" placeholder="Search Email">
                </th>

                <th>
                    <input type="text" placeholder="Search Official Email">
                </th>

                <th>
                    <input type="text" placeholder="Search Address">
                </th>

                <th></th>

                <th></th>

            </tr>

        </thead>

        <tbody>

            @foreach($employees as $employee)

            <tr>

                <!-- FIRST NAME -->
                <td>

                    <div class="employee-name">

                        {{ $employee->first_name }}

                    </div>

                </td>

                <!-- LAST NAME -->
                <td>

                    {{ $employee->last_name }}

                </td>

                <!-- DATE OF BIRTH -->
                <td>

                    {{ $employee->date_of_birth ?? 'N/A' }}

                </td>

                <!-- GENDER -->
                <td>

                    @if($employee->gender)

                        <span class="gender-badge {{ strtolower($employee->gender) }}">

                            {{ $employee->gender }}

                        </span>

                    @else

                        N/A

                    @endif

                </td>

                <!-- POSITION -->
                <td>

                    {{ $employee->position ?? 'N/A' }}

                </td>

                <!-- DIVISION -->
                <td>

                    {{ $employee->division->name ?? 'N/A' }}

                </td>

                <!-- PHONE -->
                <td>

                    {{ $employee->phone_number ?? 'N/A' }}

                </td>

                <!-- PERSONAL EMAIL -->
                <td>

                    {{ $employee->email ?? 'N/A' }}

                </td>

                <!-- OFFICIAL EMAIL -->
                <td>

                    {{ $employee->official_email ?? 'N/A' }}

                </td>

                <!-- ADDRESS -->
                <td>

                    {{ Str::limit($employee->address, 40) }}

                </td>

                <!-- BIO DATA -->
                <td>

                    @if($employee->bio_data)

                        <a href="{{ asset('storage/' . $employee->bio_data) }}"
                           target="_blank">

                            View File

                        </a>

                    @else

                        N/A

                    @endif

                </td>

                <!-- ACTIONS -->
                <td>

                    <div class="action-buttons">

                        <!-- VIEW -->
                        <a href="{{ route('employees.show', $employee->id) }}"
                           class="action-btn view-btn">

                            👁

                        </a>

                        <!-- EDIT -->
                        <a href="{{ route('employees.edit', $employee->id) }}"
                           class="action-btn edit-btn">

                            ✏

                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('employees.destroy', $employee->id) }}"
                              method="POST"
                              class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="action-btn delete-btn"
                                    onclick="return confirm('Delete this employee?')">

                                🗑

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    @else

    <div style="padding:40px; text-align:center;">

        <h3>
            No Employees Found
        </h3>

    </div>

    @endif

</div>

<!-- DATATABLE -->
<script>

$(document).ready(function () {

    let table = $('#employeeTable').DataTable({

        responsive: true,

        pageLength: 10,

        orderCellsTop: true,

        fixedHeader: true,

        scrollX: true,

        dom: 'Bfrtip',

        buttons: [

            'excel',
            'csv',
            'pdf',
            'print'

        ]

    });

    // FILTERS
    $('#employeeTable thead tr:eq(1) th').each(function (i) {

        $('input, select', this).on('keyup change', function () {

            if (table.column(i).search() !== this.value) {

                table
                    .column(i)
                    .search(this.value)
                    .draw();

            }

        });

    });

});

</script>

@endsection