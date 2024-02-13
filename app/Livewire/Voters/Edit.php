<?php

namespace App\Livewire\Voters;

use App\Models\Voter;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Voter $voter;
    public $block = "", $serial_number = "", $family_number = "", $name = "", $father_name = "", $cnic = "", $gender = "Male", $confirmed = false;

    public function mount()
    {
        $this->block = $this->voter->block;
        $this->serial_number = $this->voter->serial_number;
        $this->family_number = $this->voter->family_number;
        $this->name = $this->voter->name;
        $this->father_name = $this->voter->father_name;
        $this->cnic = $this->voter->cnic;
        $this->gender = $this->voter->gender;
        $this->confirmed = $this->voter->confirmed;
    }

    public function render()
    {
        return view('livewire.voters.edit');
    }

    public function update()
    {
        $this->validate([
            'block' => ['required'],
            'serial_number' => ['required'],
            'family_number' => ['required'],
            'name' => ['required'],
            'father_name' => ['required'],
            'cnic' => ['required', Rule::unique('voters', 'cnic')->ignore($this->voter->id)],
        ]);

        $this->voter->update([
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
        return $this->redirect('/voters');
    }
}
