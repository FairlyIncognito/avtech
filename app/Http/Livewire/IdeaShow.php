<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;

    protected $listeners = ['statusWasUpdated'];
    
    public function mount(Idea $idea) {
        $this->idea = $idea;
    }

    public function statusWasUpdated() {
        $this->idea->refresh();
    }
    
    public function render()
    {
        return view('livewire.idea-show');
    }
}