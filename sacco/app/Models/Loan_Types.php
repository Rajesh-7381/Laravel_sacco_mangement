<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan_Types extends Model
{
    use HasFactory;
    protected $table='loan_type';
    public static function getAllRecord(){
        return self::get();
    }

    public static function getSingle($id){
        return self::find($id);
    }
}
