<?php

namespace App\Exports;

use App\Models\FlashSale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FlashSaleExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FlashSale::all();
    }

    public function map($flash_sale) :array
    {
        return [
            $flash_sale->id,
            $flash_sale->getTranslation('name', 'en'),
            $flash_sale->getTranslation('name', 'ar'),
            $flash_sale->getTranslation('description', 'en'),
            $flash_sale->getTranslation('description', 'ar'),
            $flash_sale->date,
            $flash_sale->time,
            $flash_sale->is_active,
        ];
    }

        /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return ['Flash Sale ID', 'Name (English)', 'Name (Arabic)', 'Description (English)', 'Description (Arabic)', 'Date', 'Time', 'Is Active'];
    }
}
