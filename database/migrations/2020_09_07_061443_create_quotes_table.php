<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id('pk_quote_id');
            $table->foreignId('pk_businessdetail_id')->constrained();
            $table->foreignId('pk_customer_id')->constrained();
            $table->foreignId('pk_quoteitem_id')->constrained();
            $table->foreignId('pk_user_id')->constrained();
            $table->foreignId('pk_status_id')->constrained();
            $table->int('quote_number');
            $table->int('quote_revisionnumber');
            $table->string('quote_comment');
            $table->double('quote_discountrate');
            $table->string('quote_termbody');
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
        Schema::dropIfExists('quotes');
    }
}
