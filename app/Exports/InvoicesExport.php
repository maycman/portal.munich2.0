<?
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class InvoicesExport implements FromCollection
{
    public function collection()
    {
        return Invoice::all();
    }
}