<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\TypeMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('machine.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = TypeMachine::all(); // Trae todos los tipos

        return view('machine.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|string|max:255',
            'brand_model' => 'required|string|max:255',
            'km' => 'required|numeric',
            'type_machine_id' => 'required|exists:type_machines,id', //en validaciones se tiene que poner el nombre tal cual de la tabla
        ]);

        $data = $request->all();
    
        $machine = new Machine();
        $machine->serial_number = $data['serial_number'];
        $machine->brand_model = $data['brand_model'];
        $machine->km = $data['km'];
        $machine->type_machine_id = $data['type_machine_id'];

        $machine->save();

        return redirect('/machine');
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machines)
    {
        //
    }
}
