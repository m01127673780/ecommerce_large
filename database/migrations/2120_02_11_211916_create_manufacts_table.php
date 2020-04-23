<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name_ar')->nullable();
            $table->text('name_en')->nullable();
            $table->text('mob')->nullable();
            $table->text('code')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('website')->nullable();
            $table->text('insta')->nullable();
            $table->text('email')->nullable();
            $table->text('contact_name')->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->text('logo')->nullable();
            $table->longText('address')->nullable();

 
            $table->rememberToken();
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
        Schema::dropIfExists('manufacts');
    }
}