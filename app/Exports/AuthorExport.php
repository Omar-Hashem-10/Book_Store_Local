<?php

namespace App\Exports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AuthorExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Author::all();
    }

    public function map($author) :array
    {
        return [
            $author->id,
            $author->name
        ];
    }

        /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return ['Author ID', 'Name'];
    }
}
