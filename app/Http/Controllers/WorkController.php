<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    public function index()
    {   

        $works = Work::with('province')->get()->groupBy(function ($work) {
        return $work->province->name;
        });

        return view('work.index', ['ByProvince' => $works]);
    }

    public function create()
    {
        $provinces = Province::all();

        return view('work.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'province_id' => 'required|exists:provinces,id',
        ], [
            'end_date.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
            'end_date.required' => 'La fecha de fin es obligatoria.',
            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'name.required' => 'El nombre es obligatorio.',
            'province_id.required' => 'La provincia es obligatoria.',
            'province_id.exists' => 'La provincia seleccionada no es válida.',
        ]);

        $data = $request->all();
    
        $work = new Work();
        $work->name = $data['name'];
        $work->start_date = $data['start_date'];
        $work->end_date = $data['end_date'];
        $work->province_id = $data['province_id'];

        $work->save();

        return redirect('/work')->with('success', 'Obra guardada correctamente.');
    }

    public function edit(Work $work)
    {
        $provinces = Province::all();

        return view('work.edit', compact('provinces', 'work'));
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'province_id' => 'required|exists:provinces,id',
        ], [
            'end_date.after' => 'La fecha de fin debe ser posterior a la fecha de inicio.',
            'end_date.required' => 'La fecha de fin es obligatoria.',
            'start_date.required' => 'La fecha de inicio es obligatoria.',
            'name.required' => 'El nombre es obligatorio.',
            'province_id.required' => 'La provincia es obligatoria.',
            'province_id.exists' => 'La provincia seleccionada no es válida.',
        ]);


        $work->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'province_id' => $request->province_id,
        ]);

        return redirect()->route('work.index')->with('success', 'Obra actualizada correctamente.');
    }



    public function destroy(Work $work)
    {
        $work->delete();

        return redirect('/work')->with('success', 'Obra eliminada correctamente.');
    }
}
