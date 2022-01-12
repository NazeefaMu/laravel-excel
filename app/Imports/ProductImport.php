<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

//using upsert working but with heading row not working
class ProductImport implements ToCollection, WithHeadingRow
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
                $products=Product::updateOrCreate(
                    [
                        'sku' => $value['sku'],

                    ],
                    [
                        'name' => $value['name'],
                        'description' => $value['description'],
                        'colour' => $value['colour'],
                        'size' => $value['size'],
                        'group_name' => $value['group_name'],
                        'bar_code' => $value['bar_code'],
                        'in_stock' => $value['in_stock'],
                        'b2c' => $value['b2c'],
                        'brand' => $value['brand'],
                        'product_type' => $value['product_type'],
                        'categories' => $value['categories'],
                        'hort_description' => $value['hort_description'],
                        'weight' => $value['weight'],
                        'price' => $value['price'],
                        'special_price' => $value['special_price'],
                        'meta_title' => $value['meta_title'],
                        'meta_keywords' => $value['meta_keywords'],
                        'meta_description' => $value['meta_description'],
                        'new_to_date' => $value['new_to_date'],
                        'display_product_options_in' => $value['display_product_options_in'],
                        'country_of_manufacture' => $value['country_of_manufacture'],
                        'qty' => $value['qty'],
                        'vendor' => $value['vendor'],
                        'tags' => $value['tags'],
                        'option1_name' => $value['option1_name'],
                        'option1_value' => $value['option1_value'],
                        'option2_name' => $value['option2_name'],
                        'option2_value' => $value['option2_value'],
                        'option3_name' => $value['option3_name'],
                        'option3_value' => $value['option3_value'],
                        'barcode' => $value['barcode'],
                        'image1' => $value['image1'],
                        'image2' => $value['image2'],
                        'image3' => $value['image3'],
                        'image4' => $value['image4'],
                        'image5' => $value['image5'],
                        'image6' => $value['image6'],
                        'image7' => $value['image7'],
                        'image8' => $value['image8'],
                        'image9' => $value['image9'],
                        'image10' => $value['image10'],
                    ]
                );

            }

        }

    }

    public function uniqueBy()
    {
        // TODO: Implement uniqueBy() method.
        return 'item_no';
    }
}

//    /**
//    * @param array $row
//    *
//    * @return \Illuminate\Database\Eloquent\Model|null
//    */
//    public function model(array $row)
//    {
//        return new Dartxtest([
//            //
//            'item_no' => $row['item_no'],
//            'description' => $row['description'],
//            'colour' => $row['colour'],
//            'size' => $row['size'],
//            'group_name' => $row['group_name'],
//            'bar_code' => $row['bar_code'],
//            'in_stock' => $row['in_stock'],
//            'b2c' => $row['b2c'],
////            'sale' => $row['sale'],
//            'brand' => $row['brand'],
//
//        ]);
//    }
//}
