<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    
    protected $table = "oficinas";
    protected $primaryKey = "idoficina";
    public $timestamps = false;
    
    protected $fillable = [
        'idoficina', 
        'CmpOficina',
        'CmpObs',
        'CmpCnpj',
        'CmpEndereco',             
        'CmpTelFixo',
        'CmpCelular',
        'CmpEmail',
        'CmpStatus',
        'CmpDataInclusao'
    ];
   
  
}
