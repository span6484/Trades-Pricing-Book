<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCost extends Model
{
    protected $table = 'employeecosts';
    protected $primaryKey = 'pk_employee_id';
    protected $fillable = [
            'employee_name', 
            'employee_basehourly',
            'employee_hoursperweek',
            'employee_weeksperyear',
            'employee_vehiclecost',
            'employee_otherweeklycost',
            'employee_phone',
            'employee_workercomp',
            'employee_cash'
        ];

    protected $attributes = [
        'employee_type' => 'Employee',
        // 'employee_vehiclecost' => 0,
        // 'employee_otherweeklycost' => 0,
        // 'employee_phone' => 0,
        // 'employee_workercomp' => 0,
        'employee_cash' => 0,
        'employee_archived' => 0
        ];
}
