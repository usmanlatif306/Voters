<?php

namespace App\Livewire\Voters;

use App\Models\Voter;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public $block = "160060501", $serial_number = "", $family_number = "", $name = "", $father_name = "", $cnic = "33303", $gender = "Male", $confirmed = false;


    public function render()
    {
        return view('livewire.voters.create');
    }

    public function store()
    {
        $this->validate([
            'block' => ['required'],
            'serial_number' => ['required'],
            'family_number' => ['required'],
            'name' => ['required'],
            'father_name' => ['required'],
            'cnic' => ['required', 'min:13', 'max:13', Rule::unique('voters', 'cnic')],
        ]);

        $voter = Voter::create([
            'block' => $this->block,
            'serial_number' => $this->serial_number,
            'family_number' => $this->family_number,
            'name' => $this->name,
            'father_name' => $this->father_name,
            'cnic' => $this->cnic,
            'gender' => $this->gender,
            'confirmed' => $this->confirmed,
        ]);
        $this->reset();

        $this->dispatch('voter-saved');
        $this->serial_number = (int)$voter->serial_number + 1;
        $this->family_number = substr($voter->family_number, 0, -1);
        $this->dispatch('voter-created');
    }
}
