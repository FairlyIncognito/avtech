<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;

class CreateJob extends Component
{
    public $title;
    public $category = 1;
    public $description;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer',
        'description' => 'required|min:4',
    ];
    
    public function createJob() {
        $this->validate();
        
        if(auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        
        Job::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('success_message', 'Job was added succcessfully.');
        $this->reset();
        return redirect()->route('job.index');
    }
    
    public function render()
    {
        return view('livewire.create-job', [
            'categories' => Category::all(),
        ]);
    }
}