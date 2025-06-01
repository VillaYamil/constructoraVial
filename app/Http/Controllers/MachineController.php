<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\TypeMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{

    //humilde index
    public function index()
    {
        $machines = Machine::with('typeMachine')->get()->groupBy(function ($machine) {
        return $machine->typeMachine->name;
        });

        return view('machine.index', ['machinesByType' => $machines]);
    }
    //humilde crear maquina
    public function create()
    {
        $tipos = TypeMachine::all(); // Trae todos los tipos

        return view('machine.create', compact('tipos'));
    }
    //humilde guardar maquina
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

        return redirect('/machine')->with('success', 'Máquina guardada correctamente.');
    }
    //humilde editar maquina
    public function edit(Machine $machine)
    {
        $tipos = TypeMachine::all();

        return view('machine.edit', compact('machine', 'tipos'));
    }
    //humilde actualizar maquina
    public function update(Request $request, Machine $machine)
    {
        $request->validate([
        'serial_number' => 'required|string|max:255',
        'brand_model' => 'required|string|max:255',
        'km' => 'required|numeric',
        'type_machine_id' => 'required|exists:type_machines,id',
        ]);

        $machine->serial_number = $request->serial_number;
        $machine->brand_model = $request->brand_model;
        $machine->km = $request->km;
        $machine->type_machine_id = $request->type_machine_id;

        $machine->save();

        return redirect('/machine')->with('success', 'Máquina actualizada correctamente.');
    }
    //humilde pero dañino eliminar maquina
    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect('/machine')->with('success', 'Máquina eliminada correctamente.');
    }

}
