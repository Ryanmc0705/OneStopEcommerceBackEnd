<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("sub_category_id");
            $table->unsignedBigInteger("brand_id");

            $table->foreign("category_id")->references("id")->on("categories");
            $table->foreign("sub_category_id")->references("id")->on("sub_categories");
            $table->foreign("brand_id")->references("id")->on("brands");

            $table->string("product_name",100)->nullable();
            $table->text("description");

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
