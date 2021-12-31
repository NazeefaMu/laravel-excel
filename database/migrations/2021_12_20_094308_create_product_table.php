<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDartxtestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('description')->nullable();
            $table->string('colour')->nullable();
            $table->string('size')->nullable();
            $table->string('group_name');
            $table->string('bar_code')->nullable();
            $table->string('in_stock')->nullable();
            $table->string('b2c')->nullable();
            $table->string('product_type')->nullable();
            $table->string('categories')->nullable();
            $table->string('hort_description')->nullable();
            $table->integer('weight')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('special_price',10,2)->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('new_to_date')->nullable();
            $table->string('display_product_options_in')->nullable();
            $table->string('country_of_manufacture')->nullable();
            $table->integer('qty')->nullable();
            $table->string('vendor')->nullable();
            $table->string('tags')->nullable();
            $table->string('option1_name')->nullable();
            $table->string('option1_value')->nullable();
            $table->string('option2_name')->nullable();
            $table->string('option2_value')->nullable();
            $table->string('option3_name')->nullable();
            $table->string('option3_value')->nullable();
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
//            $table->string('sale');
            $table->string('brand');
            $table->timestamps();
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
