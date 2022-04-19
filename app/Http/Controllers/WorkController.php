<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        return view('work.index');
    }

    public function create()
    {
        return view('work.create');
    }

    public function show(Work $work)
    {
        return view('work.show', [
            'work' => $work,
            'backUrl' => url()->previous() !== url()->full() ? url()->previous() : route('work.index'),
        ]);
    }
}