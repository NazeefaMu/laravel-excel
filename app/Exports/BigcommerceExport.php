<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BigcommerceExport implements FromCollection,WithHeadings,WithMapping
{
    private $domain_id;

    function __construct($domain_id) {
        $this->domain_id = $domain_id;
    }
    public  function  headings():array{
        return [
            'Item Type','Product ID','Product Name','Product Type','Product Code/SKU','Bin Picking Number','Brand Name',
            'Option Set','Option Set Align','Product Description','Price','Cost Price','Retail Price','Sale Price','Fixed Shipping Cost',
            'Free Shipping','Product Warranty','Product Weight','Product Width','Product Height','Product Depth','Allow Purchases?',
            'Product Visible?','Product Availability','Track Inventory','Current Stock Level','Low Stock Level','Category',
            'Product Image ID - 1','Product Image File - 1','Product Image Description - 1','Product Image Is Thumbnail - 1',
            'Product Image Sort - 1','Product Image ID - 2','Product Image File - 2','Product Image Description - 2',
            'Product Image Is Thumbnail - 2','Product Image Sort - 2','Search Keywords','Page Title','Meta Keywords',
            'Meta Description','MYOB Asset Acct','MYOB Income Acct','MYOB Expense Acct','Product Condition','Show Product Condition?',
            'Event Date Required?','Event Date Name','Event Date Is Limited?','Event Date Start Date','Event Date End Date','Sort Order',
           'Product Tax Class','Product UPC/EAN','Stop Processing Rules','Product URL','Redirect Old URL?','GPS Global Trade Item Number',
            'GPS Manufacturer Part Number','GPS Gender','GPS Age Group','GPS Color','GPS Size','GPS Material','GPS Pattern','GPS Item Group ID',
            'GPS Category','GPS Enabled'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collection=collect(Product::getProducts($this->domain_id));
        return  $collection;
    }
    public function map($row): array
    {
        return [
            $row->null_column,
            $row->null_column,
            $row->group_name,
            $row->product_type,
            $row->sku,
            $row->null_column,
            $row->brand,
            $row->null_column,
            $row->null_column,
            $row->description,
            $row->price,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->categories,


        ];
    }
}
