<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessdetails', function (Blueprint $table) {
            $table->id('pk_businessdetail_id');
            $table->string('businessdetail_name');
            $table->string('businessdetail_addressline1');
            $table->string('businessdetail_addressline2');
            $table->string('businessdetail_phone');
            $table->string('businessdetail_fax')->nullable();
            $table->string('businessdetail_email');
            $table->string('businessdetail_website');
            $table->tinyInteger('businessdetail_archived');
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
        Schema::dropIfExists('businessdetails');
    }
}
