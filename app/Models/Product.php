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
    protected $fillable = ['id','sku','description','colour','size','group_name','bar_code','in_stock','b2c','brand','product_type'
    ,'categories','hort_description','weight','price','special_price','meta_title','meta_keywords','meta_description','new_to_date',
        'display_product_options_in','country_of_manufacture','qty','vendor','tags','option1_name','option1_value','option2_name',
        'option2_value','option3_name','option3_value','barcode','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10'];

    public static function getDartxtest(){
        $records= DB::table('product')->select('id','sku','description','colour','size','group_name','bar_code','in_stock','b2c','brand','product_type'
            ,'categories','hort_description','weight','price','special_price','meta_title','meta_keywords','meta_description','new_to_date',
            'display_product_options_in','country_of_manufacture','qty','vendor','tags','option1_name','option1_value','option2_name',
            'option2_value','option3_name','option3_value','barcode','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10')->get()->toArray();
        return $records;
    }

}
