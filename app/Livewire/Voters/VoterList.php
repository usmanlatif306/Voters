<?php

namespace App\Livewire\Voters;

use App\Models\Voter;
use Livewire\Component;
use Livewire\WithPagination;

class VoterList extends Component
{
    use WithPagination;
    public string $search = "";
    public bool $family = false, $confirmed = false;

    public function render()
    {
        return view('livewire.voters.voter-list', [
            'voters' => Voter::query()
                ->when($this->confirmed, fn ($q) => $q->where('confirmed', true))
                ->when($this->search, fn ($q) => $this->family ? $q->where('family_number', $this->search) : $q->whereLike(['block', 'serial_number', 'family_number', 'name', 'father_name', 'cnic'], $this->search))
                ->latest()
                ->paginate(20)
        ]);
    }

    public function toggleConfirm(Voter $voter)
    {
        $voter->update(['confirmed' => !$voter->confirmed]);
    }
}
