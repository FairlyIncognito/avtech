<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{
    public $idea;
    public $hasVoted;
    
    public function mount(Idea $idea) {
        $this->idea = $idea;
    }
    
    public function render()
    {
        return view('livewire.idea-index');
    }
}