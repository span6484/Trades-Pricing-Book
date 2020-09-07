<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quoteitems', function (Blueprint $table) {
            $table->id('pk_quoteitem_id');
            $table->foreignId('pk_item_id')->constrained();
            $table->foreignId('pk_quoteitemmaterial_id')->constrained();
            $table->string('quoteitem_number');
            $table->string('quoteitem_jobtype');
            $table->int('quoteitem_category_id');
            $table->int('quoteitem_subcategory_id');
            $table->string('quoteitem_description');
            $table->double('quoteitem_labourcost');
            $table->double('quoteitem_estimatedtime');
            $table->double('quoteitem_servicecall');
            $table->double('quoteitem_wholediscount');
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
        Schema::dropIfExists('quoteitems');
    }
}
