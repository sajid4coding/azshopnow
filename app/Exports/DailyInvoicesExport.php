<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DailyInvoicesExport implements FromView
{
    public $year;
    public $month;
    public $day;
    public function __construct($year,$month,$day)
    {
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
    }
    public function view(): View
    {
        return view('exports.invoices', [
            'invoices' => Invoice::where('created_at','LIKE',"{$this->year}-{$this->month}-{$this->day}%")->get(),
        ]);
    }
}
