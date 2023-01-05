<?php

namespace App\Exports;

use App\Models\Newsletter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportNewslettter implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.newsletter', [
            'newsletters'=>Newsletter::all(),
        ]);
    }
}
