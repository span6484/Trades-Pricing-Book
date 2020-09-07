<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeecostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeecosts', function (Blueprint $table) {
            $table->id('pk_employee_id');
            $table->string('employee_name');
            $table->string('employee_type');
            $table->double('employee_basehourly');
            $table->double('employee_vehiclecost');
            $table->double('employee_otherweeklycost');
            $table->double('employee_cash');
            $table->double('employee_phone');
            $table->double('employee_workercomp');
            $table->tinyInteger('employee_archived');
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
        Schema::dropIfExists('employeecosts');
    }
}
