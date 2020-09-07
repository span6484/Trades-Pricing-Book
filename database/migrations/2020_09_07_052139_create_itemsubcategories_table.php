<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemsubcategories', function (Blueprint $table) {
            $table->id('pk_subcategory_id');
            $table->foreignId('pk_category_id')->constrained();
            $table->string('subcategory_name');
            $table->tinyInteger('subcategory_archived');
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
        Schema::dropIfExists('itemsubcategories');
    }
}
