<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Division;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Exports\EmployeesExport;

use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $employees = Employee::with('division')
            ->latest()
            ->get();

        $totalEmployees = Employee::count();

        $totalDivisions = Division::count();

        return view(
            'employees.index',
            compact(
                'employees',
                'totalEmployees',
                'totalDivisions'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $divisions = Division::all();

        return view(
            'employees.create',
            compact('divisions')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'first_name'     => 'required',

            'last_name'      => 'required',

            'date_of_birth'  => 'nullable|date',

            'gender'         => 'nullable',

            'position'       => 'nullable',

            'phone_number'   => 'nullable',

            'email'          => 'nullable|email',

            'official_email' => 'nullable|email',

            'address'        => 'nullable',

            'bio_data'       => 'nullable|image',

            'division_id'    => 'required|exists:divisions,id',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('bio_data')) {

            $validated['bio_data'] =
                $request->file('bio_data')
                        ->store(
                            'employees',
                            'public'
                        );
        }

        /*
        |--------------------------------------------------------------------------
        | Create Employee
        |--------------------------------------------------------------------------
        */

        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee created successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(Employee $employee)
    {
        return view(
            'employees.show',
            compact('employee')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Employee $employee)
    {
        $divisions = Division::all();

        return view(
            'employees.edit',
            compact(
                'employee',
                'divisions'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Employee $employee
    ) {

        $validated = $request->validate([

            'first_name'     => 'required',

            'last_name'      => 'required',

            'date_of_birth'  => 'nullable|date',

            'gender'         => 'nullable',

            'position'       => 'nullable',

            'phone_number'   => 'nullable',

            'email'          => 'nullable|email',

            'official_email' => 'nullable|email',

            'address'        => 'nullable',

            'bio_data'       => 'nullable|image',

            'division_id'    => 'required|exists:divisions,id',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('bio_data')) {

            /*
            |--------------------------------------------------------------------------
            | Delete Old Image
            |--------------------------------------------------------------------------
            */

            if ($employee->bio_data) {

                Storage::disk('public')
                    ->delete($employee->bio_data);
            }

            /*
            |--------------------------------------------------------------------------
            | Store New Image
            |--------------------------------------------------------------------------
            */

            $validated['bio_data'] =
                $request->file('bio_data')
                        ->store(
                            'employees',
                            'public'
                        );
        }

        /*
        |--------------------------------------------------------------------------
        | Update Employee
        |--------------------------------------------------------------------------
        */

        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(Employee $employee)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Employee Image
        |--------------------------------------------------------------------------
        */

        if ($employee->bio_data) {

            Storage::disk('public')
                ->delete($employee->bio_data);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Employee
        |--------------------------------------------------------------------------
        */

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with(
                'success',
                'Employee deleted successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT EXCEL
    |--------------------------------------------------------------------------
    */

    public function exportExcel()
    {
        return Excel::download(
            new EmployeesExport,
            'employees.xlsx'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT CSV
    |--------------------------------------------------------------------------
    */

    public function exportCSV()
    {
        return Excel::download(
            new EmployeesExport,
            'employees.csv'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EXPORT PDF
    |--------------------------------------------------------------------------
    */

    public function exportPDF()
    {
        $employees = Employee::with('division')->get();

        $pdf = Pdf::loadView(
            'employees.pdf',
            compact('employees')
        );

        return $pdf->download('employees.pdf');
    }
}