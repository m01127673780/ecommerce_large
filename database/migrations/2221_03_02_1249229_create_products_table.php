<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('product_name_ar')->nullable();
            $table->text('product_name_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->text('photo')->nullable();
            $table->text('add_by_ar')->nullable();
            $table->text('add_by_en')->nullable();
            $table->string('add_by_photo')->nullable();
            $table->text('discount')->nullable();
            $table->decimal('price_old',5,2)->default(0);
//-------------------------start virgin two
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->integer('trade_id')->unsigned()->nullable();
            $table->foreign('trade_id')->references('id')->on('trade_marks')->onDelete('cascade');


            $table->integer('manu_id')->unsigned()->nullable();
            $table->foreign('manu_id')->references('id')->on('manufacts')->onDelete('cascade');
            /*
                $table->integer('mall_id')->unsigned()->nullable();
                $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');
            */
            $table->string('color')->nullable();
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->string('flavor')->nullable();
            $table->integer('flavor_id')->unsigned()->nullable();
            $table->foreign('flavor_id')->references('id')->on('flavors')->onDelete('cascade');


            $table->string('size')->nullable();
            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');


            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('countreis')->onDelete('cascade');


            $table->decimal('price', 5, 2)->default(0);

            $table->integer('stock')->default(0);

            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();

            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();
            $table->decimal('price_offer',5,2)->default(0);

            $table->longtext('other_data')->nullable();


            $table->text('weight')->nullable();
            $table->integer('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');

            $table->enum('status',['pending','refused','active'])->default('pending');
            $table->longtext('reason')->nullable();



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
