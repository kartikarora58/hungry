<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vendor_id');
            $table->string('company_name');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->text('address');
            $table->integer('pincode');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->string('off_days')->nullable();
            $table->integer('veg')->nullable();
            $table->integer('non_veg')->nullable();
            $table->text('about_us');
            $table->string('contact_person');
            $table->string('website')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('vendor_details');
    }
}
