<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductPricesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     *
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $value){

            {
                $products = Product::updateOrCreate(
                    [
                        'sku' => $value['sku'],
                    ],
                    [
                        'price' => $value['price'],
                        'special_price' => $value['special_price'],
                        'qty' => $value['qty'],
                    ]
                );
            }

        }

    }

    public function uniqueBy()
    {
        // TODO: Implement uniqueBy() method.
        return 'id';
    }
}

