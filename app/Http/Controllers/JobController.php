<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('job.index');
    }

    public function create()
    {
        return view('job.create');
    }

    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job,
            'backUrl' => url()->previous() !== url()->full() ? url()->previous() : route('job.index'),
        ]);
    }
}