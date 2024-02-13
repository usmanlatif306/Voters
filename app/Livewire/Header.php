<?php

namespace App\Livewire;

use App\Models\Voter;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public $total_voters = 0, $male_voters = 0, $female_voters = 0;
    public $votes_casted = 0, $male_vote_casted = 0, $female_vote_casted = 0;

    public function mount()
    {
        $confirm_voters = request()->routeIs('confirmed');

        $this->total_voters = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->count();
        $this->male_voters = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->where('gender', 'Male')->count();
        $this->female_voters = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->where('gender', 'Female')->count();
        $this->votes_casted = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->where('casted', true)->count();
        $this->male_vote_casted = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->where('gender', 'Male')->where('casted', true)->count();
        $this->female_vote_casted = Voter::when($confirm_voters, fn ($q) => $q->where('confirmed', true))->where('gender', 'Female')->where('casted', true)->count();
    }

    public function render()
    {
        return view('livewire.header');
    }

    #[On('vote-casted')]
    public function voteCasted($gender)
    {
        $this->votes_casted += 1;
        if ($gender === 'male') {
            $this->male_vote_casted += 1;
        } else {
            $this->female_vote_casted += 1;
        }
    }
}
