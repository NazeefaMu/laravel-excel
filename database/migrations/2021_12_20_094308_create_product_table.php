<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {

            //common
            $table->id();
            $table->string('sku');
            $table->integer('domain_id')->nullable();

            //spcific to magento
            $table->string('store_view_code')->nullable();
            $table->text('attribute_set_code')->nullable();
            $table->text('product_websites')->nullable();
            $table->integer('product_online')->nullable();
            $table->text('tax_class_name')->nullable();
            $table->text('visibility')->nullable();
            $table->text('special_price_from_date')->nullable();
            $table->text('special_price_to_date')->nullable();
            $table->string('url_key')->nullable();
            $table->string('base_image')->nullable();
            $table->string('base_image_label')->nullable();
            $table->string('small_image')->nullable();
            $table->string('small_image_label')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('thumbnail_image_label')->nullable();
            $table->string('swatch_image')->nullable();
            $table->string('swatch_image_label')->nullable();
            $table->string('new_from_date')->nullable();
            $table->string('map_price')->nullable();
            $table->string('msrp_price')->nullable();
            $table->string('map_enabled')->nullable();
            $table->string('gift_message_available')->nullable();
            $table->string('custom_design')->nullable();
            $table->string('custom_design_from')->nullable();
            $table->string('custom_design_to')->nullable();
            $table->string('custom_layout_update')->nullable();
            $table->string('page_layout')->nullable();
            $table->string('product_options_container')->nullable();
            $table->string('msrp_display_actual_price_type')->nullable();
            $table->string('additional_attributes')->nullable();
            $table->integer('out_of_stock_qty')->nullable();
            $table->integer('use_config_min_qty')->nullable();
            $table->integer('is_qty_decimal')->nullable();
            $table->integer('allow_backorders')->nullable();
            $table->integer('use_config_backorders')->nullable();
            $table->integer('min_cart_qty')->nullable();
            $table->integer('use_config_min_sale_qty')->nullable();
            $table->integer('max_cart_qty')->nullable();
            $table->integer('use_config_max_sale_qty')->nullable();
            $table->string('config_max_sale_qty')->nullable();
            $table->integer('notify_on_stock_below')->nullable();
            $table->integer('use_config_notify_stock_qty')->nullable();
            $table->string('manage_stock')->nullable();
            $table->string('use_config_manage_stock')->nullable();
            $table->integer('use_config_qty_increments')->nullable();
            $table->integer('qty_increments')->nullable();
            $table->integer('use_config_enable_qty_inc')->nullable();
            $table->integer('enable_qty_increments')->nullable();
            $table->string('is_decimal_divided')->nullable();
            $table->string('website_id')->nullable();
            $table->string('related_skus')->nullable();
            $table->string('related_position')->nullable();
            $table->string('crosssell_skus')->nullable();
            $table->string('crosssell_position')->nullable();
            $table->string('upsell_skus')->nullable();
            $table->string('upsell_position')->nullable();
            $table->string('additional_images')->nullable();
            $table->string('additional_image_labels')->nullable();
            $table->string('hide_from_product_page')->nullable();
            $table->string('custom_options')->nullable();
            $table->string('bundle_price_type')->nullable();
            $table->integer('bundle_sku_type')->nullable();
            $table->string('bundle_price_view')->nullable();
            $table->text('bundle_weight_type')->nullable();
            $table->text('bundle_values')->nullable();
            $table->text('bundle_shipment_type')->nullable();
            $table->integer('associated_skus')->nullable();
            $table->string('downloadable_links')->nullable();
            $table->string('downloadable_samples')->nullable();
            $table->string('configurable_variations')->nullable();
            $table->text('configurable_variation_labels')->nullable();

            $table->string('description')->nullable();
            $table->string('colour')->nullable();
            $table->string('size')->nullable();
            $table->string('group_name')->nullable();
            $table->string('bar_code')->nullable();
            $table->integer('in_stock')->nullable();
            $table->string('b2c')->nullable();
            $table->string('product_type')->nullable();
            $table->string('categories')->nullable();
            $table->string('hort_description')->nullable();
            $table->integer('weight')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('special_price',10,2)->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('new_to_date')->nullable();
            $table->string('display_product_options_in')->nullable();
            $table->string('country_of_manufacture')->nullable();
            $table->integer('qty')->nullable();
            $table->string('vendor')->nullable();
            $table->string('tags')->nullable();
            $table->text('option1_name')->nullable();
            $table->text('option1_value')->nullable();
            $table->text('option2_name')->nullable();
            $table->text('option2_value')->nullable();
            $table->text('option3_name')->nullable();
            $table->text('option3_value')->nullable();
            $table->string('barcode')->nullable();
            //not necessary for now bcz columns too large
//            $table->string('image1')->nullable();
//            $table->string('image2')->nullable();
//            $table->string('image3')->nullable();
//            $table->string('image4')->nullable();
//            $table->string('image5')->nullable();
//            $table->string('image6')->nullable();
//            $table->string('image7')->nullable();
//            $table->string('image8')->nullable();
//            $table->string('image9')->nullable();
//            $table->string('image10')->nullable();
            $table->string('brand')->nullable();
            $table->timestamps();
//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }


}
