<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "employees";
    protected $primaryKey = "EmployeeId";
    public $timestamps = false;

    //Tratamiento de fechas
    protected $dates =[
        'BirthDate' , 'HireDate'
    ];

    //Relacion jefe - sus empleados
    public function subalternos(){
        return $this->hasMany('App\Empleado' , 'ReportsTo');
    }

    //Relacion empleado - jefe
    public function jefe_directo(){
        return $this->belongsTo('App\Empleado' , 'ReportsTo');
    }

    //Relacion empleado-clientes
    public function clientes(){
        return $this->hasMany('App\Customer' , 'SupportRepId');
    }


}
