<?php

namespace App\Imports;

use App\CheckWarranty;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\withHeadings;

class CheckCodeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CheckWarranty([
            'check_code' => $row[0],
            'used' => $row[1]
        ]);
    }    
}
