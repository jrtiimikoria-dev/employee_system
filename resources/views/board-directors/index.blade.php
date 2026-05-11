@extends('layouts.app')

@section('title', 'Board of Directors')

@section('page-title', 'Board of Directors')

@section('content')

<style>

    .page-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        flex-wrap:wrap;
        gap:20px;
    }

    .page-header h1{
        font-size:34px;
        color:#0f172a;
        margin-bottom:8px;
    }

    .page-header p{
        color:#64748b;
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
        box-shadow:0 10px 25px rgba(14,165,233,0.25);
    }

    .create-btn:hover{
        transform:translateY(-4px);
    }

    /* STATS */

    .stats-grid{
        display:grid;
        grid-template-columns:
        repeat(auto-fit,minmax(220px,1fr));
        gap:25px;
        margin-bottom:30px;
    }

    .stat-card{
        background:white;
        padding:30px;
        border-radius:22px;
        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);
    }

    .stat-card h2{
        font-size:38px;
        color:#0f172a;
        margin-bottom:10px;
    }

    .stat-card p{
        color:#64748b;
    }

    /* TABLE */

    .table-wrapper{
        background:white;
        border-radius:24px;
        overflow-x:auto;
        padding:25px;
        box-shadow:
        0 10px 30px rgba(0,0,0,0.05);
    }

    table{
        width:100%;
        border-collapse:collapse;
        min-width:1300px;
    }

    table thead{
        background:#f8fafc;
    }

    table th{
        padding:16px;
        text-align:left;
        color:#64748b;
        font-size:13px;
        font-weight:600;
    }

    table td{
        padding:16px;
        border-top:1px solid #f1f5f9;
        font-size:14px;
        color:#0f172a;
        vertical-align:middle;
    }

    tbody tr{
        transition:0.3s;
    }

    tbody tr:hover{
        background:#f8fafc;
    }

    .director-info{
        display:flex;
        align-items:center;
        gap:15px;
    }

    .director-avatar{
        width:50px;
        height:50px;
        border-radius:50%;
        object-fit:cover;
        border:3px solid #e0f2fe;
    }

    .director-name{
        font-weight:600;
        font-size:14px;
    }

    .gender-badge{
        padding:6px 14px;
        border-radius:30px;
        font-size:12px;
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
        align-items:center;
        gap:8px;
    }

    .action-btn{
        width:34px;
        height:34px;
        border:none;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        text-decoration:none;
        cursor:pointer;
        transition:0.3s;
        font-size:11px;
        font-weight:600;
    }

    .action-btn:hover{
        transform:translateY(-3px);
    }

    .view-btn{
        background:#dbeafe;
        color:#2563eb;
    }

    .edit-btn{
        background:#fef3c7;
        color:#d97706;
    }

    .delete-btn{
        background:#fee2e2;
        color:#dc2626;
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

</style>

<!-- HEADER -->
<div class="page-header">

    <div>

        <h1>
            Board of Directors
        </h1>

        <p>
            Manage board members and leadership.
        </p>

    </div>

    <a href="{{ route('board-directors.create') }}"
       class="create-btn">

        + Add Director

    </a>

</div>

<!-- STATS -->
<div class="stats-grid">

    <div class="stat-card">

        <h2>
            {{ $totalBoardDirectors }}
        </h2>

        <p>
            Total Directors
        </p>

    </div>

    <div class="stat-card">

        <h2>
             {{ $maleDirectors }}
        </h2>

        <p>
            Male Directors
        </p>

    </div>

    <div class="stat-card">

        <h2>
            {{ $femaleDirectors }}
        </h2>

        <p>
            Female Directors
        </p>

    </div>

</div>

<!-- TABLE -->
<div class="table-wrapper">

    <table id="directorsTable">

        <thead>

            <tr>

                <th>Director Full Name</th>
                <th>Gender</th>
                <th>Board Position</th>
                <th>Occupation</th>
                <th>Contact #</th>
                <th>Email</th>
                <th>Date Joined</th>
                <th>Term Finish</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach($boardDirectors as $director)

            <tr>

                <!-- FULL NAME -->
                <td>

                    <div class="director-info">

                        <img
                            src="{{ $director->bio_data
                            ? asset('storage/' . $director->bio_data)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($director->full_name) }}"
                            class="director-avatar">

                        <div>

                            <div class="director-name">

                                {{ $director->full_name }}

                            </div>

                        </div>

                    </div>

                </td>

                <!-- GENDER -->
                <td>

                    @if($director->gender)

                        <span class="gender-badge {{ strtolower($director->gender) }}">

                            {{ $director->gender }}

                        </span>

                    @else

                        N/A

                    @endif

                </td>

                <!-- POSITION -->
                <td>

                    {{ $director->board_position ?? 'N/A' }}

                </td>

                <!-- OCCUPATION -->
                <td>

                    {{ $director->occupation ?? 'N/A' }}

                </td>

                <!-- CONTACT -->
                <td>

                    {{ $director->contact_number ?? 'N/A' }}

                </td>

                <!-- EMAIL -->
                <td>

                    {{ $director->email ?? 'N/A' }}

                </td>

                <!-- DATE JOINED -->
                <td>

                    {{ $director->date_joined_kfha
                        ? \Carbon\Carbon::parse($director->date_joined_kfha)->format('M d, Y')
                        : 'N/A' }}

                </td>

                <!-- TERM FINISH -->
                <td>

                    {{ $director->term_finish_date
                        ? \Carbon\Carbon::parse($director->term_finish_date)->format('M d, Y')
                        : 'N/A' }}

                </td>

                <!-- ACTIONS -->
                <td>

                    <div class="action-buttons">

                        <!-- SHOW -->
                        <a href="{{ route('board-directors.show', $director->id) }}"
                           class="action-btn view-btn">

                            show

                        </a>

                        <!-- EDIT -->
                        <a href="{{ route('board-directors.edit', $director->id) }}"
                           class="action-btn edit-btn">

                            edit

                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('board-directors.destroy', $director->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="action-btn delete-btn"
                                    onclick="return confirm('Delete this board director?')">

                                del

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<!-- DATATABLE -->
<script>

$(document).ready(function () {

    $('#directorsTable').DataTable({

        responsive: true,

        pageLength: 10,

        scrollX: true,

        dom: 'Bfrtip',

        buttons: [

            'excel',
            'csv',
            'pdf',
            'print'

        ]

    });

});

</script>

@endsection