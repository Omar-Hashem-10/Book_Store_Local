<?php

namespace App\Imports;

use App\Models\Publisher;
use Maatwebsite\Excel\Concerns\ToModel;

class PublisherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Publisher([
            'name' => $row[0]
        ]);
    }
}
