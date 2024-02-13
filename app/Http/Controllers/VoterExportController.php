<?php

namespace App\Http\Controllers;

use App\Exports\VotersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VoterExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($type)
    {
        if ($type === 'excel') {
            $name = 'Voters List 306GB.xlsx';
            $format = \Maatwebsite\Excel\Excel::XLSX;
        } elseif ($type === 'csv') {
            $name = 'Voters List 306GB.csv';
            $format = \Maatwebsite\Excel\Excel::CSV;
        } elseif ($type === 'pdf') {
            $name = 'Voters List 306GB.pdf';
            $format = \Maatwebsite\Excel\Excel::DOMPDF;
        }

        return Excel::download(new VotersExport, $name, $format);
    }
}
