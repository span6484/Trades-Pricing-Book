<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('pk_discount_id');
            $table->string('discount_name');
            $table->double('discount_rate');
            $table->tinyInteger('discount_archived')->default(0);
            $table->timestamps();
        });

        $discount = new App\Discount();
        $discount->discount_name = 'NORMAL PRICING - NO DISCOUNT';
        $discount->discount_rate = '0.00';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'MATES RATES CATEGORY 1';
        $discount->discount_rate = '0.95';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'MATES RATES CATEGORY 2';
        $discount->discount_rate = '0.90';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'MATES RATES CATEGORY 3';
        $discount->discount_rate = '0.80';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'REAL ESTATE / STRATA CATERGORY - 1';
        $discount->discount_rate = '0.95';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'REAL ESTATE / STRATA CATEGORY - 2';
        $discount->discount_rate = '0.90';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'REAL ESTATE / STRATA CATEGORY - 3';
        $discount->discount_rate = '0.85';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'REAL ESTATE / STRATA CATEGORY - 4';
        $discount->discount_rate = '0.80';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'LOYAL CUSTOMER';
        $discount->discount_rate = '0.90';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'GENERAL CUSTOMER DISCOUNT';
        $discount->discount_rate = '0.90';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'PROMOTIONAL DISCOUNT - 1';
        $discount->discount_rate = '0.95';
        $discount->save();
        
        $discount = new App\Discount();
        $discount->discount_name = 'PROMOTIONAL DISCOUNT - 2';
        $discount->discount_rate = '0.90';
        $discount->save();

        $discount = new App\Discount();
        $discount->discount_name = 'PROMOTIONAL DISCOUNT - 3';
        $discount->discount_rate = '0.85';
        $discount->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
