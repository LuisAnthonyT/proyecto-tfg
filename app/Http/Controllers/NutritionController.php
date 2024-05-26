<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use App\Models\Athlete;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNutritionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nutrition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idAthlete)
    {
        try {
            $athlete = Athlete::findOrFail($idAthlete);
            $registers = Nutrition::where('athlete_id', $athlete->id)->get();

            return view('nutrition.index', compact('registers', 'athlete'));

        } catch (Exception $e) {
            Log::error('Error al obtener la nutrición del atleta: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al obtener la nutrición del atleta');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nutrition $nutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nutrition $nutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nutrition $nutrition)
    {
        //
    }
}
