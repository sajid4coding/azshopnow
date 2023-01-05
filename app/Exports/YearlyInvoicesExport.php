<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class YearlyInvoicesExport implements FromView
{
    public $year;
    public function __construct($year)
    {
        $this->year=$year;
    }
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoice::where('created_at','LIKE',"{$this->year}%")->get(),
        ]);
    }
}
