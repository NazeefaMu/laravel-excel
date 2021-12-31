<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class productExport implements FromCollection,WithHeadings
{
    public  function  headings():array{
        return [
            'id',
            'sku',
            'description',
            'colour',
            'size',
            'group_name',
            'bar_code',
            'in_stock',
            'b2c',
            'brand',

        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Dartxtest::all();
        return  collect(Product::getDartxtest());
    }
}
