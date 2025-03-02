<?php

namespace App\Exports;

use App\Models\Discount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DiscountExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Discount::all();
    }

    public function map($discount) : array
    {
        return [
            $discount->id,
            $discount->code,
            $discount->quantity,
            $discount->percentage,
            $discount->expiry_date
        ];
    }

        /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return ['Discount ID', 'Code','Quantity', 'Percentage', 'Expiry Date'];
    }
}
