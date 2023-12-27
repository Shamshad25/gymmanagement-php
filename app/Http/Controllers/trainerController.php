<?php

namespace App\Http\Controllers;

use App\Models\trainerModel;
use Illuminate\Http\Request;

class trainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainer = trainerModel::all();
        return view('showAllTrainers')->with('trainer',$trainer);
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
        $trainerObj = new trainerModel;
        $trainerObj->Trainer_Name = $request->Trainer_Name;
        $trainerObj->Trainer_Batch = $request->Trainer_Batch;
        $trainerObj->Save();
        return redirect()->route('trainer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trainerObj = trainerModel::find($id);
        $trainerObj->Trainer_Name = $request->Trainer_Name;
        $trainerObj->Trainer_Batch = $request->Trainer_Batch;
        $trainerObj->Save();
        return redirect('trainer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainerToDelete = trainerModel::find($id);
        $trainerToDelete->delete();
        return redirect()->route('trainer');
    }
}
