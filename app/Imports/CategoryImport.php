<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $rowIndex = 0;
    public function model(array $row)
    {
        $this->rowIndex++;

        if ($this->rowIndex === 1) {
            return null;
        }

        return new Category([
            'name' => [
                'en' => $row[0],
                'ar' => $row[1]
            ]
        ]);
    }
}
