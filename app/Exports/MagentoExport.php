<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithMapping;

class MagentoExport implements FromCollection,WithHeadings,WithMapping
{

    private $domain_id;

    function __construct($domain_id) {
        $this->domain_id = $domain_id;
    }
    public  function  headings():array{
        return [
            'sku','store_view_code','attribute_set_code','product_type','categories','product_websites','name','description','short_description',
            'weight','product_online','tax_class_name','visibility','price','special_price','special_price_from_date','special_price_to_date',
            'url_key','meta_title','meta_keywords','meta_description','base_image','base_image_label','small_image','small_image_label',
            'thumbnail_image','thumbnail_image_label','swatch_image','swatch_image_label','created_at','updated_at','new_from_date','new_to_date',
            'display_product_options_in','map_price','msrp_price','map_enabled','gift_message_available','custom_design',
            'custom_design_from','custom_design_to','custom_layout_update','page_layout','product_options_container',
            'msrp_display_actual_price_type','country_of_manufacture','additional_attributes','qty','out_of_stock_qty',
            'use_config_min_qty','is_qty_decimal','allow_backorders','use_config_backorders','min_cart_qty','use_config_min_sale_qty',
            'max_cart_qty','use_config_max_sale_qty','is_in_stock','notify_on_stock_below','use_config_notify_stock_qty','manage_stock',
            'use_config_manage_stock','use_config_qty_increments','qty_increments','use_config_enable_qty_inc','enable_qty_increments',
            'is_decimal_divided','website_id','related_skus','related_position','crosssell_skus','crosssell_position','upsell_skus',
            'upsell_position','additional_images','additional_image_labels','hide_from_product_page','custom_options','bundle_price_type',
            'bundle_sku_type','bundle_price_view','bundle_weight_type','bundle_values','bundle_shipment_type','associated_skus',
            'downloadable_links','downloadable_samples','configurable_variations','configurable_variation_labels'
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
            $row->sku,
            $row->null_column,
            $row->null_column,
            $row->product_type,
            $row->categories,
            $row->null_column,
            $row->name,
            $row->description,
            $row->short_description,
            $row->weight,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->price,
            $row->special_price,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->meta_title,
            $row->meta_keywords,
            $row->meta_description,
            $row->image1,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->image2,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->created_at,
            $row->updated_at,
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
            $row->qty,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->null_column,
            $row->is_in_stock,
            //The other columns are null,therefore no need to specify

        ];
    }
}
