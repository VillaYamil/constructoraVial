<?php

namespace App\Http\Controllers;

use App\Models\MachineWork;
use Illuminate\Http\Request;

class MachineWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('machinework.index');
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
    public function show(Machine_Work $machine_Work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine_Work $machine_Work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine_Work $machine_Work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine_Work $machine_Work)
    {
        //
    }
}
