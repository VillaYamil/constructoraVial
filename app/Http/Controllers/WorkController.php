<?php

namespace App\Http\Controllers;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Work $work)
    {
        //
    }

    public function edit(Work $work)
    {
        //
    }

    public function update(Request $request, Work $work)
    {
        //
    }


    public function destroy(Work $work)
    {
        //
    }
}
