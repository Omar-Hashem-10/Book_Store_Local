<?php

namespace App\Imports;

use App\Models\FlashSale;
use Maatwebsite\Excel\Concerns\ToModel;

class FlashSaleImport implements ToModel
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

        return new FlashSale([
            'name' => [
                'en' => $row[0],
                'ar' => $row[1]
            ],
            'description' => [
                'en' => $row[2],
                'ar' => $row[3]
            ],
            'date' => $row[4],
            'time' => $row[5],
            'is_active' => $row[6]
        ]);
    }
}
