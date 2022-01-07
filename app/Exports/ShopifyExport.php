<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ShopifyExport implements FromCollection,WithHeadings,WithMapping
{
    private $domain_id;

    function __construct($domain_id) {
        $this->domain_id = $domain_id;
    }
    public  function  headings():array{
        return [
        'Handle','Title','Body (HTML)','Vendor','Tags','Published','Option1 Name','Option1 Value','Option2 Name','Option2 Value',
        'Option3 Name','Option3 Value','Variant SKU','Variant Grams','Variant Inventory Tracker','Variant Inventory Qty',
        'Variant Inventory Policy','Variant Fulfillment Service','Variant Price','Variant Compare At Price','Variant Requires Shipping',
        'Variant Taxable','Variant Barcode','Image Src','Image Position','Image Alt Text','Gift Card','SEO Title','SEO Description',
        'Google Shopping / Google Product Category','Google Shopping / Gender','Google Shopping / Age Group',
        'Google Shopping / MPN','Google Shopping / AdWords Grouping','Google Shopping / AdWords Labels',
        'Google Shopping / Condition','Google Shopping / Custom Product','Google Shopping / Custom Label 0',
        'Google Shopping / Custom Label 1','Google Shopping / Custom Label 2','Google Shopping / Custom Label 3',
        'Google Shopping / Custom Label 4','Variant Image','Variant Weight Unit','Variant Tax Code','Cost per item,Status',
        'Standard Product Type','Custom Product Type'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function map($row): array
    {
        return [
            $row->group_name,
            $row->product_type,
            $row->product_type,
            $row->vendor,
            $row->tags,
            $row->product_type,
            $row->option1_name,
            $row->option2_name,
            $row->option2_value,
            $row->option3_name,
            $row->option3_value,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->product_type,
            $row->meta_title,
            $row->meta_description,


        ];
    }
}
