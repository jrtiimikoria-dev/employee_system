<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardDirector;

class BoardDirectorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $boardDirectors = BoardDirector::latest()->get();

        $totalBoardDirectors = BoardDirector::count();

        $maleDirectors = BoardDirector::where(
            'gender',
            'Male'
        )->count();

        $femaleDirectors = BoardDirector::where(
            'gender',
            'Female'
        )->count();

        $otherDirectors = BoardDirector::where(
            'gender',
            'Other'
        )->count();

        return view(
            'board-directors.index',
            compact(
                'boardDirectors',
                'totalBoardDirectors',
                'maleDirectors',
                'femaleDirectors',
                'otherDirectors'
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
        return view(
            'board-directors.create'
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

            'full_name' => 'required',

            'date_of_birth' => 'nullable|date',

            'date_joined_kfha' => 'nullable|date',

            'term_finish_date' => 'nullable|date',

            'gender' => 'nullable',

            'board_position' => 'nullable',

            'occupation' => 'nullable',

            'contact_number' => 'nullable',

            'email' => 'nullable|email',

            'home_address' => 'nullable',

            'bio_data' => 'nullable|image',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Bio Data
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('bio_data')) {

            $validated['bio_data'] =
                $request->file('bio_data')
                        ->store(
                            'board-directors',
                            'public'
                        );
        }

        /*
        |--------------------------------------------------------------------------
        | Create Director
        |--------------------------------------------------------------------------
        */

        BoardDirector::create($validated);

        return redirect()
            ->route('board-directors.index')
            ->with(
                'success',
                'Board Director created successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(BoardDirector $boardDirector)
    {
        return view(
            'board-directors.show',
            compact('boardDirector')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(BoardDirector $boardDirector)
    {
        return view(
            'board-directors.edit',
            compact('boardDirector')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        BoardDirector $boardDirector
    ) {

        $validated = $request->validate([

            'full_name' => 'required',

            'date_of_birth' => 'nullable|date',

            'date_joined_kfha' => 'nullable|date',

            'term_finish_date' => 'nullable|date',

            'gender' => 'nullable',

            'board_position' => 'nullable',

            'occupation' => 'nullable',

            'contact_number' => 'nullable',

            'email' => 'nullable|email',

            'home_address' => 'nullable',

            'bio_data' => 'nullable|image',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload New File
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('bio_data')) {

            $validated['bio_data'] =
                $request->file('bio_data')
                        ->store(
                            'board-directors',
                            'public'
                        );
        }

        /*
        |--------------------------------------------------------------------------
        | Update Director
        |--------------------------------------------------------------------------
        */

        $boardDirector->update($validated);

        return redirect()
            ->route('board-directors.index')
            ->with(
                'success',
                'Board Director updated successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy(BoardDirector $boardDirector)
    {
        $boardDirector->delete();

        return redirect()
            ->route('board-directors.index')
            ->with(
                'success',
                'Board Director deleted successfully.'
            );
    }
}