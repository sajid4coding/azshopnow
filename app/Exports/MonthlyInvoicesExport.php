<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyInvoicesExport implements FromView
{
    public $year;
    public $month;
    public function __construct($year,$month)
    {
        $this->year=$year;
        $this->month=$month;
    }
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoice::where('created_at','LIKE',"{$this->year}-{$this->month}%")->get(),
        ]);
    }
}
