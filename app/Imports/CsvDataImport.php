<?php

namespace App\Imports;
use App\CustomerModel;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvDataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return new CustomerModel([
            'name'  => $row['name'],
            'phoneno' => $row['phoneno'],
            'email'   => $row['email'],
            'type'    => $row['type']
       
        ]);
    }

}