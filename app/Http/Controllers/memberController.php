<?php

namespace App\Http\Controllers;

use App\Models\memberModel;
use Illuminate\Http\Request;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = memberModel::all();
        return view('showAllMembers')->with('member',$member);
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
        $memberObj = new memberModel;
        $memberObj->Member_Name = $request->Member_Name;
        $memberObj->Member_Phone = $request->Member_Phone;
        $memberObj->Trainer_id = $request->Trainer_id;
        $memberObj->Save();
        return redirect('member');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $memberToDelete = memberModel::find($id);
        $memberToDelete->delete();
        return redirect('member');
    }
}
