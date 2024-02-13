<?php

namespace App\Livewire;

use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class ConfirmedVoters extends Component
{
    use WithPagination;

    public $search = '';
    public bool $casted = false;
    public bool $not_casted = false;
    public bool $family = false;

    public function render()
    {
        return view('livewire.confirmed-voters', [
            'voters' => Voter::query()
                ->where('confirmed', true)
                ->when($this->casted, fn ($q) => $q->where('casted', true))
                ->when($this->not_casted, fn ($q) => $q->where('casted', false))
                ->when($this->search, fn ($q) => $this->family ? $q->where('family_number', $this->search) : $q->whereLike(['block', 'serial_number', 'family_number', 'name', 'father_name', 'cnic'], $this->search))->paginate(20)
        ]);
    }

    function updatedCasted()
    {
        if ($this->casted && $this->not_casted) {
            $this->not_casted = false;
        }
    }
    function updatedNotCasted()
    {
        if ($this->casted && $this->not_casted) {
            $this->casted = false;
        }
    }
}
