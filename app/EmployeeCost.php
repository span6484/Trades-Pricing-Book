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
            'employee_vehiclecost',
            'employee_otherweeklycost',
            'employee_phone',
            'employee_workercomp',
            'employee_cash',
            'employee_type'
        ];

    protected $attributes = [
        'employee_cash' => 0,
        'employee_archived' => 0
        ];
}
