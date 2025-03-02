<?php

namespace App\Imports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\ToModel;

class AuthorImport implements ToModel
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

        return new Author([
            'name' => $row[0]
        ]);
    }
}
