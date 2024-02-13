<?php

namespace App\Livewire;

use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class Voters extends Component
{
    use WithPagination;

    public $search = '';
    public $is_casted = false;
    public bool $family = false;

    public function mount()
    {
        if (request()->has('type') && request()->type === "casted") {
            $this->is_casted = true;
        }
    }

    public function render()
    {
        return view('livewire.voters', [
            'voters' => Voter::when($this->search, fn ($q) => $this->family ? $q->where('family_number', $this->search) : $q->whereLike(['block', 'serial_number', 'family_number', 'name', 'father_name', 'cnic'], $this->search), fn ($q) => $this->is_casted ? $q->where('casted', true) : $q->where('casted', false))->paginate(20),
        ]);
    }

    public function casted(Voter $voter)
    {
        $voter->update(['casted' => true]);
        $this->dispatch('vote-casted', gender: strtolower($voter->gender));
    }
}
