<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WoocommerceExport implements FromCollection,WithHeadings,WithMapping
{
    private $domain_id;

    function __construct($domain_id) {
        $this->domain_id = $domain_id;
    }
    public  function  headings():array{
        return [
            'ID','Type','SKU','Name','Published','Is featured?','Visibility in catalog','Short description','Description',
        'Date sale price starts','Date sale price ends','Tax status','Tax class','In stock?','Stock','Low stock amount',
       ' Backorders allowed?','Sold individually?','Weight (g)','Length (cm)','Width (cm)','Height (cm)','Allow customer reviews?',
        'Purchase note','Sale price','Regular price','Categories','Tags','Shipping class','Images','Download limit','Download expiry days',
        'Parent','Grouped products','Upsells','Cross-sells','External URL','Button text','Position','LaStudio: Enable 360 Viewer',
        'LaStudio: Swatch Type','LaStudio: Swatch Data','Google product feed: Adult content',
        'Google product feed: Adwords grouping filter','Google product feed: Adwords labels','Google product feed: Age Group',
        'Google product feed: Availability','Google product feed: Availability date','Google product feed: Bing Category',
        'Google product feed: Bing shipping info (country and price)',
        '"Google product feed: Bing shipping info (country, service and price)"',
       'Google product feed: Bing shipping info (price only)','Google product feed: Brand',
        'Google product feed: Bundle indicator (is_bundle)','Google product feed: Colour','Google product feed: Condition',
        'Google product feed: Consumer datasheet','Google product feed: Consumer notice(s)',
        'Google product feed: Cost of goods sold','Google product feed: Custom label 0',
        'Google product feed: Custom label 1','Google product feed: Custom label 2',
        'Google product feed: Custom label 3','Google product feed: Custom label 4','Google product feed: Delivery label',
        'Google product feed: Energy efficiency class','Google product feed: Energy label image link',
        'Google product feed: Excluded destination','Google product feed: Gender',
        'Google product feed: Global Trade Item Number (GTIN)','Google product feed: Google Product Category',
        'Google product feed: Google-funded promotion eligibility','Google product feed: Hide product from feed (Y/N)',
       ' Google product feed: Identifier exists flag','Google product feed: Included destination',
        'Google product feed: Instalment','Google product feed: Manufacturer Part Number (MPN)',
        'Google product feed: Material','Google product feed: Maximum energy efficiency class',
        'Google product feed: Maximum handling time','Google product feed: Minimum energy efficiency class',
        'Google product feed: Minimum handling time','Google product feed: Multipack','Google product feed: Pattern',
        'Google product feed: Pickup SLA','Google product feed: Pickup method','Google product feed: Product Type',
        'Google product feed: Product detail(s)','Google product feed: Product fee','Google product feed: Product highlight(s)',
       ' Google product feed: Promotion ID','Google product feed: Purchase quantity limit',
        'Google product feed: Return address label','Google product feed: Return policy label',
        'Google product feed: Sell On Google Quantity','Google product feed: Size','Google product feed: Size system',
        'Google product feed: Size type','Google product feed: Tax Category (US stores only)',
        'Google product feed: Title','Google product feed: Transit time label','Google product feed: Unit pricing base measure',
        'Google product feed: Unit pricing measure','Attribute 1 name','Attribute 1 value(s)','Attribute 1 visible',
       ' Attribute 1 global','Meta: rs_page_bg_color','Meta: _yoast_wpseo_primary_product_cat','Meta: berocket_post_order',
        'Meta: _yoast_wpseo_content_score'
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
            $row->product_type,
            $row->sku,
            $row->name,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->short_description,
            $row->description,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->is_in_stock,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->weight,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->price,
            $row->categories,
            $row->tags,
            $row->image1,
          //rest fields are null
        ];
    }
}
