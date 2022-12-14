<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class Product extends Model
{
    use HasFactory;

    public function Domain(){
        return $this->belongsTo(Domain::class);
    }

    protected $table ="product";
    protected $fillable = ['sku','name','store_view_code','colour','size','bar_code','b2c','brand','attribute_set_code','product_type','categories','product_websites','group_name',
            'description','short_description','weight','product_online','tax_class_name','visibility','price','special_price','special_price_from_date','special_price_to_date',
            'url_key','meta_title','meta_keywords','meta_description','image1','image2','image3','image4','image5','base_image','base_image_label','small_image','small_image_label',
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
            'downloadable_links','downloadable_samples','configurable_variations','configurable_variation_labels','domain_id','null_column'];

    public static function getProducts($domain_id){
        $records= DB::table('product')->select('sku','name','description','colour','size','group_name','bar_code','is_in_stock','b2c','brand','product_type'
            ,'categories','short_description','weight','price','special_price','meta_title','meta_keywords','meta_description','new_to_date',
            'display_product_options_in','country_of_manufacture','qty','vendor','tags','option1_name','option1_value','option2_name',
            'option2_value','option3_name','option3_value','image1','image2','image3','image4','image5','image6','tax_class_name','barcode','null_column','created_at','updated_at','domain_id')->where('domain_id','=',$domain_id)->get()->toArray();
        return $records;
    }

}
