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
            $table->string('description')->nullable();
            $table->string('colour')->nullable();
            $table->string('size')->nullable();
            $table->string('group_name')->nullable();
            $table->string('bar_code')->nullable();
            $table->integer('is_in_stock')->nullable();
            $table->text('tax_class_name')->nullable();
            $table->string('b2c')->nullable();
            $table->string('product_type')->nullable();
            $table->string('categories')->nullable();
            $table->string('short_description')->nullable();
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
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('image6')->nullable();
            $table->string('image7')->nullable();
            $table->string('image8')->nullable();
            $table->string('image9')->nullable();
            $table->string('image10')->nullable();
            $table->string('brand')->nullable();
            $table->string('null_column')->nullable();
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
