<?php

namespace App\Exports;

use App\Models\Voter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VotersExport implements FromView
{
    public function view(): View
    {
        return view('exports.voters', [
            'voters' => Voter::get()
        ]);
    }
}
