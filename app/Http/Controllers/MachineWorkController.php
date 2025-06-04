<?php

namespace App\Http\Controllers;

use App\Models\MachineWork;
use App\Models\Machine;
use App\Models\Work;
use Illuminate\Http\Request;

class MachineWorkController extends Controller
{
    public function index(Request $request)
    {
        $query = MachineWork::query()->with(['machine.typeMachine', 'work']);

        if ($request->filled('machine_type')) {
            $query->whereHas('machine.typeMachine', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->machine_type . '%');
            });
        }

        if ($request->filled('serial_number')) {
            $query->whereHas('machine', function($q) use ($request) {
                $q->where('serial_number', 'like', '%' . $request->serial_number . '%');
            });
        }

        $assignments = $query->paginate(10);

        return view('machinework.index', compact('assignments'));
    }


    // Mostrar formulario para crear
    public function create()
    {
        $machines = Machine::all();
        $works = Work::all();

        return view('machinework.create', compact('machines', 'works'));
    }

    // Guardar nueva asignación
    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'work_id' => 'required|exists:works,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'km_start' => 'nullable|numeric|min:0',
            'km_end' => 'nullable|numeric|min:0|gte:km_start',
        ]);


        $existeAsignacionActiva = MachineWork::where('machine_id', $request->machine_id)

            ->where(function ($query) use ($request) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', $request->start_date);
            })
            ->exists();

        if ($existeAsignacionActiva) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['machine_id' => 'La máquina ya está asignada a otra obra en esa fecha.']);
        }

        MachineWork::create([
            'machine_id' => $request->machine_id,
            'work_id' => $request->work_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'km_start' => $request->km_start,
            'km_end' => $request->km_end,
            // 'km' NO se calcula aquí
        ]);

        return redirect()->route('machinework.index')->with('success', 'Asignación creada correctamente.');
    }

    public function show($id)
    {
        $machine = Machine::with('machineWorks.work')->findOrFail($id);

        return view('machinework.show', compact('machine'));
    }

    // Mostrar formulario para editar
    public function edit(MachineWork $machinework)
    {
        $machines = Machine::all();
        $works = Work::all();

        return view('machinework.edit', [
            'assignment' => $machinework,
            'machines' => $machines,
            'works' => $works,
        ]);
    }

    // Actualizar asignación
    public function update(Request $request, MachineWork $machinework)
    {
        $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'work_id' => 'required|exists:works,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            // 'reason_end' ahora no es obligatorio si no hay fecha de fin
            'reason_end' => 'nullable|string|in:Obra finalizada,Otra causa,Parada técnica',
            'km_start' => [
                'nullable',
                'required_if:reason_end,Obra finalizada',
                'numeric',
                'min:0',
            ],
            'km_end' => [
                'nullable',
                'required_if:reason_end,Obra finalizada',
                'numeric',
                'min:0',
                'gte:km_start',
            ],
        ]);




    // Validar asignaciones activas antes de actualizar
    $existeAsignacionActiva = MachineWork::where('machine_id', $request->machine_id)
        ->where('id', '!=', $machinework->id) // excluir la actual
        ->where(function ($query) use ($request) {
            $query->whereNull('end_date')
                ->orWhere('end_date', '>=', $request->start_date);
        })
        ->exists();

    if ($existeAsignacionActiva) {
        return redirect()->back()
            ->withInput()
            ->withErrors(['machine_id' => 'La máquina ya está asignada a otra obra en esa fecha.']);
    }

    // Actualizar asignación
    $machinework->update([
        'machine_id' => $request->machine_id,
        'work_id' => $request->work_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'km_start' => $request->km_start,
        'km_end' => $request->km_end,
        'reason_end' => $request->reason_end,
    ]);

    // Calcular kilómetros recorridos si aplica
        if (
        $machinework->reason_end === 'Obra finalizada' &&
        $machinework->km_start !== null &&
        $machinework->km_end !== null

    ) {
        $kmRecorridos = $machinework->km_end - $machinework->km_start;

        $machine = $machinework->machine;
        $machine->km = ($machine->km ?? 0) + $kmRecorridos;
        $machine->save();
    }

    return redirect()->route('machinework.index')->with('success', 'Asignación actualizada correctamente.');
}


    // Eliminar asignación
    public function destroy(MachineWork $machinework)
    {
        $machinework->delete();

        return redirect()->route('machinework.index')->with('success', 'Asignación eliminada correctamente.');
    }
}
